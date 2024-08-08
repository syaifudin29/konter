<?php

namespace App\Models;

use App\Models\TransaksiModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PaymentModel extends Model
{
    use HasFactory;
    protected $table = 'payment';
    protected $primaryKey = 'id';
    protected $fillable = ['nama','keterangan','aktif'];

    public function payment(): HasMany
    {
        return $this->hasMany(TransaksiModel::class, 'payment_id');
    }
}
