<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProdukModel extends Model
{
    use HasFactory;
    protected $table = 'produk';
    protected $primaryKey = 'id';
    protected $fillable = ['nama','label_id','status','beli','jual','keterangan','aktif'];

    public function label(): BelongsTo
    {
        return $this->belongsTo(LabelModel::class, 'label_id');
    }

}
