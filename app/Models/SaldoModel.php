<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SaldoModel extends Model
{
    use HasFactory;
    protected $table = 'saldo';
    protected $primaryKey = 'id';
    protected $fillable = ['nama','saldo','aktif'];
    
    public function payment(): HasMany
    {
        return $this->hasMany(TransaksiModel::class, 'payment_id');
    }
}
