<?php

namespace johnnymcweed\company\admin\controllers;

/**
 * Company Controller.
 * 
 * File has been created with `crud/create` command. 
 */
class CompanyController extends \luya\admin\ngrest\base\Controller
{
    /**
     * @var string The path to the model which is the provider for the rules and fields.
     */
    public $modelClass = 'johnnymcweed\company\models\Company';
}