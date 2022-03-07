<?php 
namespace App\Models;  
use CodeIgniter\Model;
  
class SupplierUserModel extends Model{
    
    protected $table = 'suppliers_users';
    
    protected $allowedFields = [
        'user_id',
        'supplier_id',
    ];
}