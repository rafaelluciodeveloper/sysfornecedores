<?php 
namespace App\Models;  
use CodeIgniter\Model;
  
class BankAccountModel extends Model{
    
    protected $table = 'bank_accounts';
    
    protected $allowedFields = [
        'agency',
        'account',
        'bank_id',
        'supplier_id',
    ];
    
}