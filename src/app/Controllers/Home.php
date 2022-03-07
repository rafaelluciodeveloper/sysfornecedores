<?php

namespace App\Controllers;

use App\Models\BankAccountModel;
use CodeIgniter\Controller;
use App\Models\UsuarioModel;
use Config\Database;

class Home extends Controller
{
    public function index()
    {
        $data['path'] = 'dashboard';

        $db = Database::connect();
        $builder = $db->table('suppliers_users');
        $builder->select('* , suppliers_users.id sid ');
        $builder->join('suppliers', 'suppliers.id = suppliers_users.supplier_id');
        $data['count_suppliers'] = $builder->countAll();

        $bankAccountModel = new BankAccountModel();
        $data['count_banks'] = $bankAccountModel->where("");


        echo view('layout/header', $data);
        echo view('dashboard');
        echo view('layout/footer');
    }
}
