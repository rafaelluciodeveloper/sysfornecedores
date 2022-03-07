<?php

namespace App\Controllers;

use App\Models\BankAccountModel;
use CodeIgniter\Controller;
use Config\Database;
use Mpdf\Mpdf;

class Report extends Controller
{

    public function index()
    {
        $result = array();
        $db = Database::connect();
        $builder = $db->table('suppliers_users');
        $builder->select('* , suppliers_users.id sid ');
        $builder->join('suppliers', 'suppliers.id = suppliers_users.supplier_id');
        $suppliers = $builder->get()->getResultArray();
        $data = "";
        $bankAccounts = new BankAccountModel();

        foreach ($suppliers as $supplier){
            $supplier['accounts'] = $bankAccounts->join('banks', 'banks.id = bank_accounts.bank_id')->where('supplier_id', $supplier["id"])->get()->getResultArray();
            array_push($result ,$supplier );
        }

        $mpdf = new Mpdf;
        $mpdf->SetHeader('SysFornecedores|Suppliers Report|{PAGENO}');
        $mpdf->SetFooter('SysFornecedores');
        $mpdf->SetTitle("Suppliers Report");
        foreach ($result as $r){
            $data.= "<p style='border: 1px solid black; text-align: center'> <b>Supplier : </b>" . $r["document"] . "-" . $r["name"] . "</p>";

            foreach ($r["accounts"] as $c){
                $data .= "<p><b>Agency :</b>" . $c["agency"]. "</p></br>"
                   . "<p><b>Account :</b>" . $c["account"] . "</p></br>"
                   . "<p><b>Bank :</b>" . $c["description"] . "</p></br></br>";
            }

        }

        $mpdf->WriteHTML($data);

        header("Content-Type: application/pdf");
        
        $mpdf->Output("report.pdf", "I");

    }
}
