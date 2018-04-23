<?php

use yii\db\Migration;

/**
 * Class m180105_235146_company_company
 */
class m180105_235146_company_basetables extends Migration
{
    public function safeUp()
    {
        $this->createTable('company_company', [
            'id' => $this->primaryKey(),
            'title' => $this->text(),
            'logo_id' => $this->integer(11)->defaultValue(0),
            'file_list' => $this->text(),
            'create_user_id' => $this->integer(11)->defaultValue(0),
            'update_user_id' => $this->integer(11)->defaultValue(0),
            'timestamp_create' => $this->integer(11)->defaultValue(0),
            'timestamp_update' => $this->integer(11)->defaultValue(0),
            'timestamp_display_from' => $this->integer(11)->defaultValue(0),
            'timestamp_display_until' => $this->integer(11)->defaultValue(0),
            'is_deleted' => $this->boolean()->defaultValue(false),
            'is_display_limit' => $this->boolean()->defaultValue(false),
        ]);

        $this->createTable('company_companyplace', [
            'id' => $this->primaryKey(),
            'company_id' => $this->integer(11)->notNull(),
            'place_id' => $this->integer(11)->notNull(),
            'status' => $this->integer(11)->defaultValue(0),
        ]);

        $this->createTable('company_people', [
            'id' => $this->primaryKey(),
            'company_id' => $this->integer(),
            'person_id' => $this->integer()->notNull(),
            'type' => $this->integer(),
            'create_user_id' => $this->integer(11)->defaultValue(0),
            'update_user_id' => $this->integer(11)->defaultValue(0),
            'timestamp_create' => $this->integer(11)->defaultValue(0),
            'timestamp_update' => $this->integer(11)->defaultValue(0),
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('company_people');
        $this->dropTable('company_companyplace');
        $this->dropTable('company_company');
    }
}
