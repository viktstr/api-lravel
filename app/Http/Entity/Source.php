<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $created_at
 */
class Source extends Model
{
    protected $table = 'source';

    public $timestamps = false;

    protected $fillable = ['name', 'created_at'];
}