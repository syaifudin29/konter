<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TransaksiModel extends Model
{
    use HasFactory;
    protected $table = 'transaksi';
    protected $primaryKey = 'id';
    protected $fillable = ['produk_id','nama_produk','beli','jual','payment_id','lunas','aktif','keterangan','deskripsi'];

    public function payment(): BelongsTo
    {
        return $this->belongsTo(SaldoModel::class, 'payment_id');
    }
}
