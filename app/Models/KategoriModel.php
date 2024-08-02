<?php

namespace App\Models;

use App\Models\JenisModel;
use App\Models\LabelModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KategoriModel extends Model
{
    use HasFactory;
    protected $table = 'kategori';
    protected $primaryKey = 'id';
    protected $fillable = ['nama','keterangan'];

    public function label(): HasMany
    {
        return $this->hasMany(JenisModel::class, 'kategori_id');
    }
}
