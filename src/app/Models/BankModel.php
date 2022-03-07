<?php 
namespace App\Models;  
use CodeIgniter\Model;
  
class BankModel extends Model{

    protected $table = 'banks';

    protected $allowedFields = [
        'code',
        'description',
    ];


}