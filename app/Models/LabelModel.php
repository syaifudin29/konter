<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LabelModel extends Model
{
    use HasFactory;
    protected $table = 'label';
    protected $primaryKey = 'id';
    protected $fillable = ['nama','keterangan','jenis_id'];

    public function jenis(): BelongsTo
    {
        return $this->belongsTo(JenisModel::class, 'jenis_id');
    }

    public function produk(): HasMany
    {
        return $this->hasMany(ProdukModel::class, 'label_id');
    }
}
