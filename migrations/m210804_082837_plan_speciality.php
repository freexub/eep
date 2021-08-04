<?php

use yii\db\Schema;
use yii\db\Migration;

class m210804_082837_plan_speciality extends Migration
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
            '{{%plan_speciality}}',
            [
                'id'=> $this->primaryKey(11),
                'name'=> $this->string(250)->notNull()->comment('Специальность'),
                'code'=> $this->string(10)->notNull()->comment('Шифр'),
            ],$tableOptions
        );

    }

    public function safeDown()
    {
        $this->dropTable('{{%plan_speciality}}');
    }
}
