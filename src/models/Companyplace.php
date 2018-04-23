<?php

namespace johnnymcweed\company\models;

use Yii;
use luya\admin\ngrest\base\NgRestModel;

/**
 * Companyplace.
 * 
 * File has been created with `crud/create` command. 
 *
 * @property integer $id
 * @property integer $company_id
 * @property integer $place_id
 * @property integer $status
 */
class Companyplace extends NgRestModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'company_companyplace';
    }

    /**
     * @inheritdoc
     */
    public static function ngRestApiEndpoint()
    {
        return 'api-company-companyplace';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'company_id' => Yii::t('app', 'Company ID'),
            'place_id' => Yii::t('app', 'Place ID'),
            'status' => Yii::t('app', 'Status'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['company_id', 'place_id'], 'required'],
            [['company_id', 'place_id', 'status'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function genericSearchFields()
    {
        return [''];
    }

    /**
     * @inheritdoc
     */
    public function ngRestAttributeTypes()
    {
        return [
            'company_id' => 'number',
            'place_id' => 'number',
            'status' => 'number',
        ];
    }

    /**
     * @inheritdoc
     */
    public function ngRestScopes()
    {
        return [
            ['list', ['company_id', 'place_id', 'status']],
            [['create', 'update'], ['company_id', 'place_id', 'status']],
            ['delete', false],
        ];
    }
}