<?php

use yii\db\Schema;
use yii\db\Migration;

class m210804_082827_plan_cathedra extends Migration
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
            '{{%plan_cathedra}}',
            [
                'id'=> $this->primaryKey(11),
                'name'=> $this->string(150)->notNull(),
                'short_name'=> $this->integer(10)->notNull(),
            ],$tableOptions
        );

    }

    public function safeDown()
    {
        $this->dropTable('{{%plan_cathedra}}');
    }
}
