<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ModelTetra extends Model
{
    use HasFactory,HasUuids;
    protected $keyType = 'string';

    public $incrementing = false;

    protected $primaryKey = 'id';

    protected $fillable = ['name'];

    protected static function booted()
    {
        static::creating(function ($modelTetra) {
            $modelTetra->id = Str::uuid();
        });
    }
}
