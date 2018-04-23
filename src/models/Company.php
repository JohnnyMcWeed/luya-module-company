<?php

namespace johnnymcweed\company\models;

use johnnymcweed\company\admin\Module;
use johnnymcweed\person\models\Person;
use johnnymcweed\place\models\Place;
use Yii;
use luya\admin\ngrest\base\NgRestModel;
use luya\admin\ngrest\plugins\CheckboxRelationActiveQuery;

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
    public $companyPeople = [];
    public $companyPlaces = [];

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
    public function init()
    {
        parent::init();
        $this->on(self::EVENT_BEFORE_INSERT, [$this, 'eventBeforeInsert']);
        $this->on(self::EVENT_BEFORE_UPDATE, [$this, 'eventBeforeUpdate']);
    }

    /**
     * Event triggers before update
     */
    public function eventBeforeUpdate()
    {
        $this->update_user_id = Yii::$app->adminuser->getId();
        $this->timestamp_update = time();
    }

    /**
     * Event triggers before insert
     */
    public function eventBeforeInsert()
    {
        $this->create_user_id = Yii::$app->adminuser->getId();
        $this->update_user_id = Yii::$app->adminuser->getId();
        $this->timestamp_update = time();
        if (empty($this->timestamp_create)) {
            $this->timestamp_create = time();
        }
        if (empty($this->timestamp_display_from)) {
            $this->timestamp_display_from = time();
        }
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Module::t('ID'),
            'title' => Module::t('Title'),
            'logo_id' => Module::t('Logo'),
            'file_list' => Module::t('File List'),
            'timestamp_create' => Module::t('Timestamp Create'),
            'timestamp_update' => Module::t('Timestamp Update'),
            'timestamp_display_from' => Module::t('Timestamp Display From'),
            'timestamp_display_until' => Module::t('Timestamp Display Until'),
            'is_deleted' => Module::t('Is Deleted'),
            'is_display_limit' => Module::t('Is Display Limit'),
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
            [['companyPlaces', 'companyPeople'], 'safe']
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
            'companyPlaces' => [
                'class' => CheckboxRelationActiveQuery::class,
                'query' => $this->getCompanyPlaces(),
                'labelField' => ['title']
            ],
            'companyPeople' => [
                'class' => CheckboxRelationActiveQuery::class,
                'query' => $this->getCompanyPeople(),
                'labelField' => ['title']
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public function ngRestScopes()
    {
        return [
            ['list', ['title']],
            [['create', 'update'], ['title', 'logo_id', 'file_list', 'is_deleted', 'companyPeople', 'companyPlaces']],
            ['delete', false],
        ];
    }

    public function getCompanyPeople() {
        return $this->hasMany(Person::class, ['id' => 'person_id'])->viaTable('company_people', ['company_id' => 'id']);
    }

    public function getCompanyPlaces() {
        return $this->hasMany(Place::class, ['id' => 'place_id'])->viaTable('company_companyplace', ['company_id' => 'id']);
    }
}