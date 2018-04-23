<?php

namespace johnnymcweed\company\admin\apis;

/**
 * People Controller.
 * 
 * File has been created with `crud/create` command. 
 */
class PeopleController extends \luya\admin\ngrest\base\Api
{
    /**
     * @var string The path to the model which is the provider for the rules and fields.
     */
    public $modelClass = 'johnnymcweed\company\models\People';
}