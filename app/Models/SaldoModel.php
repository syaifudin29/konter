<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaldoModel extends Model
{
    use HasFactory;
    protected $table = 'saldo';
    protected $primaryKey = 'id';
    protected $fillable = ['nama','saldo','aktif'];
}
