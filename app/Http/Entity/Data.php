<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Expression;

/**
 * @property int $id
 * @property integer $value
 * @property integer $source_id
 * @property string $created_at
 *
 * @property Source $source
 */
class Data extends Model
{
    protected $table = 'data';

    public $timestamps = false;

    protected $fillable = ['value'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function source()
    {
        return $this->hasOne(Source::class, 'source_id', 'id');
    }

    /**
     * @param $value
     * @param $sourceId
     * @return $this
     */
    public static function create($value, $sourceId)
    {
        $self = new self();
        $self->value = $value;
        $self->source_id = $sourceId;
        $self->created_at = new Expression('NOW()');

        return $self;
    }
}