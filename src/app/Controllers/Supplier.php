<?php

namespace App\Controllers;

use App\Models\BankAccountModel;
use App\Models\SupplierBankAccountModel;
use App\Models\BankModel;
use App\Models\SupplierUserModel;
use App\Models\TypeSupplier;
use CodeIgniter\Controller;
use App\Models\SupplierModel;
use Config\Database;

class Supplier extends Controller
{
    public function index()
    {
        $db = Database::connect();
        $builder = $db->table('suppliers_users');
        $builder->select('* , suppliers_users.id sid ');
        $builder->join('suppliers', 'suppliers.id = suppliers_users.supplier_id');
        $data['suppliers'] = $builder->get()->getResultArray();

        echo view('layout/header');
        echo view('supplier/list', $data);
        echo view('layout/footer');
    }

    public function create()
    {
        $bank = new BankModel();
        $data['banks'] = $bank->orderBy('code', 'DESC')->findAll();

        echo view('layout/header');
        echo view('supplier/create', $data);
        echo view('layout/footer');
    }

    public function store()
    {
        $supplierModel = new SupplierModel();
        $supplierUserModel = new SupplierUserModel();
        $bankAccountModel = new BankAccountModel();
        $bank = new BankModel();

        $data = [
            'document' => $this->request->getVar('document'),
            'name' => $this->request->getVar('name'),
            'zipcode' => $this->request->getVar('zipcode'),
            'address' => $this->request->getVar('address'),
            'number' => $this->request->getVar('number'),
            'district' => $this->request->getVar('district'),
            'complement' => $this->request->getVar('complement'),
            'city' => $this->request->getVar('city'),
            'state' => $this->request->getVar('state'),
            'im' => $this->request->getVar('im'),
            'ie' => $this->request->getVar('ie'),
            'phone' => $this->request->getVar('phone'),
            'cell_phone' => $this->request->getVar('cell_phone'),
            'email' => $this->request->getVar('email'),
        ];

        $idSupplier = $supplierModel->insert($data, true);

        $dataSuplierUser = [
            "user_id" => session()->id,
            "supplier_id" => $idSupplier,
        ];

        $supplierUserModel->insert($dataSuplierUser);

        $banksAccounts = json_decode($this->request->getVar('bank_accounts'), true);

        foreach ($banksAccounts as $banksAccount) {
            $idBank = $bank->where('code', $banksAccount["Bank"])->first();

            $dataBankAccount = [
                "agency" => $banksAccount["Agency"],
                "account" => $banksAccount["Account"],
                "bank_id" => $idBank["id"],
                "supplier_id" => $idSupplier,
            ];

            $bankAccountModel->insert($dataBankAccount, true);

        }

        return $this->response->redirect(site_url('/supplier/list'));
    }

    public function singleSupplier($id = null)
    {
        $supplierModel = new SupplierModel();
        $data['supplier_obj'] = $supplierModel->where('id', $id)->first();

        echo view('layout/header');
        echo view('supplier/edit', $data);
        echo view('layout/footer');
    }

    public function update()
    {
        $supplierModel = new SupplierModel();
        $id = $this->request->getVar('id');
        $data = [
            'document' => $this->request->getVar('document'),
            'name' => $this->request->getVar('name'),
            'zipcode' => $this->request->getVar('zipcode'),
            'address' => $this->request->getVar('address'),
            'number' => $this->request->getVar('number'),
            'district' => $this->request->getVar('district'),
            'complement' => $this->request->getVar('complement'),
            'city' => $this->request->getVar('city'),
            'state' => $this->request->getVar('state'),
            'im' => $this->request->getVar('im'),
            'ie' => $this->request->getVar('ie'),
            'phone' => $this->request->getVar('phone'),
            'cell_phone' => $this->request->getVar('cell_phone'),
            'email' => $this->request->getVar('email'),
        ];
        $supplierModel->update($id, $data);
        return $this->response->redirect(site_url('/supplier/list'));
    }

    public function delete($id = null)
    {
        $supplierModel = new SupplierModel();
        $data['supplier_obj'] = $supplierModel->where('id', $id)->delete($id);
        return $this->response->redirect(site_url('/supplier/list'));
    }

}
