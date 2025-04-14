<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Tetra extends Model
{
    use HasFactory,HasUuids;
    protected $keyType = 'string';

    public $incrementing = false;

    protected $primaryKey = 'id';

    protected $fillable = [
        'serie',
        // 'type_tetra_id',
        'entite_id',
        'numero_appel',
        'model_tetra_id',
        'security_group',
        'numero_group',
        'talk_group',
    ];

    public function typeTetra()
    {
        return $this->belongsTo(TypeTetra::class, 'type_tetra_id');
    }

    public function entite()
    {
        return $this->belongsTo(Entite::class, 'entite_id');
    }

    public function modelTetra()
    {
        return $this->belongsTo(ModelTetra::class, 'model_tetra_id');
    }

    protected static function booted()
    {
        static::creating(function ($tetra) {
            $tetra->id = Str::uuid();
        });
    }

}
