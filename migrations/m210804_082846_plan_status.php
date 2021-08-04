<?php

use yii\db\Schema;
use yii\db\Migration;

class m210804_082846_plan_status extends Migration
{

    public function init()
    {
        $this->db = 'db';
        parent::init();
    }

    public function safeUp()
    {
        $tableOptions = 'ENGINE=InnoDB';

        $this->createTable(
            '{{%plan_status}}',
            [
                'id'=> $this->primaryKey(11),
                'name'=> $this->string(100)->notNull()->comment('Статус'),
            ],$tableOptions
        );

    }

    public function safeDown()
    {
        $this->dropTable('{{%plan_status}}');
    }
}
