<?php

namespace App\Common;

use Webmozart\Assert\Assert;
use Whoops\Exception\ErrorException;

/**
 * Class ItemDto
 * @package App\Common\Client
 */
class ItemDto
{
    /**
     * @var
     */
    public $location;

    /**
     * @var
     */
    public $resource;

    /**
     * @var
     */
    public $typeView;

    /**
     * @var
     */
    public $typeGraph;

    /**
     * @var array
     */
    public $period = [];

    /**
     * @param $params
     * @return ItemDto
     * @throws ErrorException
     */
    public static function createByParams($params)
    {
        $self = new self();

        $fields = ['location', 'resource', 'typeView', 'typeGraph', 'period'];
        foreach ($fields as $field){
            $value = data_get($params, $field, null);

            Assert::notEmpty($value, 'Отсутсвует обязательное поле ' . $field);

            $self->$field = $value;
        }

        return $self;
    }
}