<?php

use yii\db\Schema;
use yii\db\Migration;

class m210804_082812_plan_autor extends Migration
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
            '{{%plan_autor}}',
            [
                'id'=> $this->primaryKey(11),
                'plan_id'=> $this->integer(11)->notNull()->comment('План'),
                'autor_id'=> $this->integer(11)->notNull()->comment('Автор'),
            ],$tableOptions
        );
        $this->createIndex('plan_id','{{%plan_autor}}',['plan_id'],false);

    }

    public function safeDown()
    {
        $this->dropIndex('plan_id', '{{%plan_autor}}');
        $this->dropTable('{{%plan_autor}}');
    }
}
