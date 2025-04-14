<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Elte extends Model
{
    use HasFactory, HasUuids;
    protected $keyType = 'string';

    public $incrementing = false;

    protected $primaryKey = 'id';
    
    protected $fillable = [
        'serie',
        'entite_id',
        'model_elte_id',
        'numero_appel',
    ];

    public function entite()
    {
        return $this->belongsTo(Entite::class);
    }

    public function modelElte()
    {
        return $this->belongsTo(ModelElte::class);
    }

    protected static function booted()
    {
        static::creating(function ($elte) {
            $elte->id = Str::uuid();
        });
    }
}
