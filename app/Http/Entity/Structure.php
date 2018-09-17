<?php

namespace App\Entity;

use App\Common\StructureDto;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Expression;

/**
 * @property int $id
 * @property integer $name
 * @property integer $data
 * @property integer $source_id
 * @property string $created_at
 *
 * @property Source $source
 */
class Structure extends Model
{
    protected $table = 'structure';

    public $timestamps = false;

    protected $fillable = ['name', 'data', 'created_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function source()
    {
        return $this->hasOne(Source::class, 'source_id', 'id');
    }

    public function dataAsArray()
    {
        return json_decode($this->data, true);
    }

    /**
     * @param StructureDto $structureDto
     * @param $sourceId
     * @return Structure
     */
    public static function create(StructureDto $structureDto, $sourceId)
    {
        $self = new self();
        $self->name =  $structureDto->name;
        $self->source_id =$sourceId;
        $self->data = json_encode($structureDto);
        $self->created_at = new Expression('NOW()');

        return $self;
    }
}