<?php

namespace App\Models;

use CodeIgniter\Model;

class SupplierModel extends Model
{
    protected $table = 'suppliers';
    protected $allowedFields = [
        'document',
        'name',
        'name',
        'zipcode',
        'address',
        'number',
        'district',
        'complement',
        'city',
        'state',
        'im',
        'ie',
        'phone',
        'cell_phone',
        'email',
    ];
}