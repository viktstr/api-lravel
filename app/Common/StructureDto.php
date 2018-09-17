<?php

namespace App\Common;

use Webmozart\Assert\Assert;

/**
 * Class StructureDto
 * @package App\Common
 */
class StructureDto
{
    /**
     * @var
     */
    public $name;

    /**
     * @var
     */
    public $items = [];

    /**
     * @param $params
     * @return StructureDto
     */
    public static function createByParams($params)
    {
        $name = data_get($params, 'name', null);
        Assert::notEmpty($name, 'Отсутсвует обязательное поле name');

        $items = data_get($params, 'items', []);
        Assert::notEmpty($items, 'Отсутсвует обязательное поле items');

        $self = new self();
        $self->name = $name;

        foreach ($items as $item) {
            $self->items[] = ItemDto::createByParams($item);
        }

        return $self;
    }
}