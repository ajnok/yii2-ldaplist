<?php

use yii\db\Migration;

class m160517_094745_reset extends Migration
{
    public function safeUp()
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
    }

    public function down()
    {
        echo "m160517_094745_reset cannot be reverted.\n";

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
