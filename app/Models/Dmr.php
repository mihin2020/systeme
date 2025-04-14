<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dmr extends Model
{
    use HasFactory,HasUuids;
    protected $keyType = 'string';

    public $incrementing = false;

    protected $primaryKey = 'id';


    protected $fillable = [
        'serie',
        'type_dmr_id',
        'entite_id',
        'model_dmr_id',
    ];

    public function typeDmr()
    {
        return $this->belongsTo(TypeDmr::class, 'type_dmr_id');
    }

    public function entite()
    {
        return $this->belongsTo(Entite::class, 'entite_id');
    }

    public function modelDmr()
    {
        return $this->belongsTo(ModelDmr::class, 'model_dmr_id');
    }
    

}
