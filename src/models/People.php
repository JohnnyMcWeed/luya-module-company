<?php

namespace johnnymcweed\company\models;

use Yii;
use luya\admin\ngrest\base\NgRestModel;

/**
 * People.
 * 
 * File has been created with `crud/create` command. 
 *
 * @property integer $id
 * @property integer $company_id
 * @property integer $person_id
 * @property integer $type
 * @property integer $create_user_id
 * @property integer $update_user_id
 * @property integer $timestamp_create
 * @property integer $timestamp_update
 */
class People extends NgRestModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'company_people';
    }

    /**
     * @inheritdoc
     */
    public static function ngRestApiEndpoint()
    {
        return 'api-company-people';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'company_id' => Yii::t('app', 'Company ID'),
            'person_id' => Yii::t('app', 'Person ID'),
            'type' => Yii::t('app', 'Type'),
            'create_user_id' => Yii::t('app', 'Create User ID'),
            'update_user_id' => Yii::t('app', 'Update User ID'),
            'timestamp_create' => Yii::t('app', 'Timestamp Create'),
            'timestamp_update' => Yii::t('app', 'Timestamp Update'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['company_id', 'person_id', 'type', 'create_user_id', 'update_user_id', 'timestamp_create', 'timestamp_update'], 'integer'],
            [['person_id'], 'required'],
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
            'person_id' => 'number',
            'type' => 'number',
            'create_user_id' => 'number',
            'update_user_id' => 'number',
            'timestamp_create' => 'number',
            'timestamp_update' => 'number',
        ];
    }

    /**
     * @inheritdoc
     */
    public function ngRestScopes()
    {
        return [
            ['list', ['company_id', 'person_id', 'type', 'create_user_id', 'update_user_id', 'timestamp_create', 'timestamp_update']],
            [['create', 'update'], ['company_id', 'person_id', 'type', 'create_user_id', 'update_user_id', 'timestamp_create', 'timestamp_update']],
            ['delete', false],
        ];
    }
}