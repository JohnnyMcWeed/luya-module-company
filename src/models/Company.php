<?php

namespace johnnymcweed\company\models;

use Yii;
use luya\admin\ngrest\base\NgRestModel;

/**
 * Company.
 * 
 * File has been created with `crud/create` command. 
 *
 * @property integer $id
 * @property text $title
 * @property integer $logo_id
 * @property text $file_list
 * @property integer $create_user_id
 * @property integer $update_user_id
 * @property integer $timestamp_create
 * @property integer $timestamp_update
 * @property integer $timestamp_display_from
 * @property integer $timestamp_display_until
 * @property tinyint $is_deleted
 * @property tinyint $is_display_limit
 */
class Company extends NgRestModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'company_company';
    }

    /**
     * @inheritdoc
     */
    public static function ngRestApiEndpoint()
    {
        return 'api-company-company';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'logo_id' => Yii::t('app', 'Logo ID'),
            'file_list' => Yii::t('app', 'File List'),
            'create_user_id' => Yii::t('app', 'Create User ID'),
            'update_user_id' => Yii::t('app', 'Update User ID'),
            'timestamp_create' => Yii::t('app', 'Timestamp Create'),
            'timestamp_update' => Yii::t('app', 'Timestamp Update'),
            'timestamp_display_from' => Yii::t('app', 'Timestamp Display From'),
            'timestamp_display_until' => Yii::t('app', 'Timestamp Display Until'),
            'is_deleted' => Yii::t('app', 'Is Deleted'),
            'is_display_limit' => Yii::t('app', 'Is Display Limit'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'file_list'], 'string'],
            [['logo_id', 'create_user_id', 'update_user_id', 'timestamp_create', 'timestamp_update', 'timestamp_display_from', 'timestamp_display_until'], 'integer'],
            [['is_deleted', 'is_display_limit'], 'string', 'max' => 1],
        ];
    }

    /**
     * @inheritdoc
     */
    public function genericSearchFields()
    {
        return ['title', 'file_list'];
    }

    /**
     * @inheritdoc
     */
    public function ngRestAttributeTypes()
    {
        return [
            'title' => 'textarea',
            'logo_id' => 'number',
            'file_list' => 'textarea',
            'create_user_id' => 'number',
            'update_user_id' => 'number',
            'timestamp_create' => 'number',
            'timestamp_update' => 'number',
            'timestamp_display_from' => 'number',
            'timestamp_display_until' => 'number',
            'is_deleted' => 'number',
            'is_display_limit' => 'number',
        ];
    }

    /**
     * @inheritdoc
     */
    public function ngRestScopes()
    {
        return [
            ['list', ['title', 'logo_id', 'file_list', 'create_user_id', 'update_user_id', 'timestamp_create', 'timestamp_update', 'timestamp_display_from', 'timestamp_display_until', 'is_deleted', 'is_display_limit']],
            [['create', 'update'], ['title', 'logo_id', 'file_list', 'create_user_id', 'update_user_id', 'timestamp_create', 'timestamp_update', 'timestamp_display_from', 'timestamp_display_until', 'is_deleted', 'is_display_limit']],
            ['delete', false],
        ];
    }
}