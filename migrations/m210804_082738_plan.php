<?php

use yii\db\Schema;
use yii\db\Migration;

class m210804_082738_plan extends Migration
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
            '{{%plan}}',
            [
                'id'=> $this->primaryKey(11),
                'discipline'=> $this->string(250)->notNull()->comment('Дисциплина'),
                'type_id'=> $this->integer(11)->notNull()->comment('Тип ЭУИ'),
                'url'=> $this->text()->notNull()->comment('Ссылка'),
                'deadline'=> $this->date()->notNull()->comment('Срок сдачи'),
                'name'=> $this->string(250)->notNull()->comment('Название ЭУИ'),
                'language'=> $this->string(10)->notNull()->comment('Язык разработки'),
                'cathedra_id'=> $this->integer(11)->notNull()->comment('Кафедра'),
                'status_id'=> $this->integer(11)->notNull()->comment('Статус'),
                'note'=> $this->text()->notNull()->comment('Замечание'),
            ],$tableOptions
        );
        $this->createIndex('type_id','{{%plan}}',['type_id','cathedra_id','status_id'],false);
        $this->createIndex('cathedra_id','{{%plan}}',['cathedra_id'],false);
        $this->createIndex('status_id','{{%plan}}',['status_id'],false);

    }

    public function safeDown()
    {
        $this->dropIndex('type_id', '{{%plan}}');
        $this->dropIndex('cathedra_id', '{{%plan}}');
        $this->dropIndex('status_id', '{{%plan}}');
        $this->dropTable('{{%plan}}');
    }
}
