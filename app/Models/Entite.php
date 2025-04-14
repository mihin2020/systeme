<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entite extends Model
{
    use HasFactory, HasUuids;
    protected $keyType = 'string';

    public $incrementing = false;

    protected $primaryKey = 'id';

    protected $fillable = ['name'];

    public function tetras()
    {
        return $this->hasMany(Tetra::class);
    }

    public function dmrs()
    {
        return $this->hasMany(Dmr::class);
    }

    public function eltes()
    {
        return $this->hasMany(Elte::class);
    }

    
}
