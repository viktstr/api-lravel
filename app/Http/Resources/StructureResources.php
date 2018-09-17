<?php
namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\JsonResource;
/**
 * @property int $id
 * @property string $name
 */
class StructureResource extends JsonResource
{
    public function toArray($request)
    {
        return $this->dataAsArray();
    }
}