<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suppliers extends Model
{
    use HasFactory;
    protected $table = 'suppliers';
    protected $fillable = ['user_id','company_name','bank_name','company_adress','contact_person'];
}
