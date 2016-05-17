<?php

use yii\db\Migration;

class m160517_073156_init extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }
        $this->createTable('account', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->unique(),
            'status' => $this->smallInteger()->defaultValue(10),
            'isRegistered' => $this->boolean()->defaultValue(false),
            'isEnabled' => $this->boolean()->defaultValue(false),
            'isLdapDeleted' => $this->boolean()->defaultValue(false),
            'registered_at' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'employee_id' => $this->smallInteger(),
        ], $tableOptions);
        
        $this->createTable('employee', [
            'id' => $this->primaryKey(),
            'email_official' => $this->string(),
            'email_personal' => $this->string(),
            'firstname_th' => $this->string(),
            'firstname_en' => $this->string(),
            'midname_th' => $this->string(),
            'midname_en' => $this->string(),
            'lastname_th' => $this->string(),
            'lastname_en' => $this->string(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'title_id' => $this->integer(),
            'title_academic_id' => $this->integer(),
        ], $tableOptions);

        $this->createTable('title', [
            'id' => $this->primaryKey(),
            'short_th' => $this->string(45),
            'full_th' => $this->string(80),
            'short_en' => $this->string(45),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ], $tableOptions);

        $this->createTable('title_academic', [
            'id' => $this->primaryKey(),
            'short_th' => $this->string(45),
            'full_th' => $this->string(80),
            'short_en' => $this->string(45),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ], $tableOptions);
        
        $this->createIndex(
            'idx-account-employee_id',
            'account',
            'employee_id'
        );
        $this->addForeignKey(
            'fk-account-employee_id',
            'account',
            'employee_id',
            'employee',
            'id',
            'SET NULL',
            'CASCADE'
        );
        $this->createIndex(
            'idx-employee-title_id',
            'employee',
            'title_id'
        );
        $this->addForeignKey(
            'fk-employee-title_id',
            'employee',
            'title_id',
            'title',
            'id',
            'NO ACTION',
            'CASCADE'
        );
        $this->createIndex(
            'idx-employee-title_academic_id',
            'employee',
            'title_academic_id'
        );
        $this->addForeignKey(
            'fk-employee-title_academic_id',
            'employee',
            'title_academic_id',
            'title_academic',
            'id',
            'NO ACTION',
            'CASCADE'
        );
    }

    public function safeDown()
    {
        $this->dropForeignKey(
            'fk-account-employee_id',
            'account'
        );
        $this->dropIndex(
            'idx-account-employee_id',
            'account'
        );
        $this->dropForeignKey(
            'fk-employee-title_id',
            'employee'
        );
        $this->dropIndex(
            'idx-employee-title_id',
            'employee'
        );
        $this->dropForeignKey(
            'fk-employee-title_academic_id',
            'employee'
        );
        $this->dropIndex(
            'idx-employee-title_academic_id',
            'employee'
        );
        $this->dropTable('account');
        $this->dropTable('employee');
        $this->dropTable('title');
        $this->dropTable('title_academic');

        echo "m160517_073156_init cannot be reverted.\n";

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
