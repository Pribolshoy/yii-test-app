<?php

class m201204_200727_create_user_to_comment_table extends CDbMigration
{
	public function up()
	{
        $this->createTable('user_to_comment', array(
            'id' => 'integer(5) NOT NULL PRIMARY KEY AUTO_INCREMENT',
            'user_id' => 'integer(5) NOT NULL',
            'author_id' => 'integer(5) NOT NULL',
            'content' => 'text NOT NULL',
            'date_added' => 'DATETIME NOT NULL',
        ));

        $this->addForeignKey(
            'fk_user_id_user_to_comment_to_user',
            'user_to_comment',
            'user_id',
            'user',
            'id'
        );

        $this->addForeignKey(
            'fk_author_id_user_to_comment_to_user',
            'user_to_comment',
            'author_id',
            'user',
            'id'
        );
	}

	public function down()
	{
        $this->dropTable('user_to_comment');
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}