<?php

namespace App\Controllers;

use App\Models\BankAccountModel;
use App\Models\BankModel;
use App\Models\SupplierBankAccountModel;
use App\Models\SupplierModel;
use App\Models\TypeSupplier;
use CodeIgniter\Controller;
use Config\Database;

class BankAccount extends Controller
{
    public function index($id = null)
    {
        $db = Database::connect();
        $builder = $db->table('bank_accounts');
        $builder->select('* , suppliers.id sid , bank_accounts.id  as bid  ');
        $builder->join('suppliers', 'suppliers.id = bank_accounts.supplier_id');
        $builder->join('banks', 'banks.id = bank_accounts.bank_id');
        $builder->where("suppliers.id", $id);

        $data['accounts'] = $builder->get()->getResultArray();
        $supplierModel = new SupplierModel();
        $data['supplier'] = $supplierModel->where('id', $id)->first();

        echo view('layout/header');
        echo view('bankaccount/list', $data);
        echo view('layout/footer');
    }

    public function create($id = null)
    {
        $bank = new BankModel();
        $data['banks'] = $bank->orderBy('code', 'DESC')->findAll();
        $supplierModel = new SupplierModel();
        $data['supplier'] = $supplierModel->where('id', $id)->first();

        echo view('layout/header');
        echo view('bankaccount/create', $data);
        echo view('layout/footer');
    }

    public function store()
    {
        $bankAccountModel = new BankAccountModel();

        $dataBankAccount = [
            "agency" => $this->request->getVar('agency'),
            "account" => $this->request->getVar('account'),
            "bank_id" => $this->request->getVar('bank'),
            "supplier_id" => $this->request->getVar('supplier_id'),
        ];

        $bankAccountModel->insert($dataBankAccount);

        return $this->response->redirect(site_url('/bankaccount/list/' . $this->request->getVar('supplier_id')));
    }

    public function singleBankAccount($id = null)
    {
        $bankAccountModel = new BankAccountModel();
        $bank = new BankModel();
        $supplierModel = new SupplierModel();
        $data['bankaccount'] = $bankAccountModel->where('id', $id)->first();
        $data['banks'] = $bank->orderBy('code', 'DESC')->findAll();
        $data['supplier'] = $supplierModel->where('id', $data["bankaccount"]["supplier_id"])->first();

        echo view('layout/header');
        echo view('bankaccount/edit', $data);
        echo view('layout/footer');
    }

    public function update()
    {
        $bankAccountModel = new BankAccountModel();
        $id = $this->request->getVar('id');
        $dataBankAccount = [
            "agency" => $this->request->getVar('agency'),
            "account" => $this->request->getVar('account'),
            "bank_id" => $this->request->getVar('bank'),
            "supplier_id" => $this->request->getVar('supplier_id'),
        ];

        $bankAccountModel->update($id, $dataBankAccount);
        return $this->response->redirect(site_url('/bankaccount/list/' . $this->request->getVar('supplier_id')));
    }

    public function delete($id = null)
    {
        $bankAccountModel = new BankAccountModel();

        $data['supplier_obj'] = $bankAccountModel->where('id', $id)->first();
        $supplierId = $data['supplier_obj']["supplier_id"];
        $bankAccountModel->delete($id);
        return $this->response->redirect(site_url('/bankaccount/list/' . $supplierId));
    }

}
