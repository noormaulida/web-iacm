<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_posts extends CI_Migration {
        /*
        id
        user_id
        title
        content
        slug
        type (0=news, 1=agenda)
        published_at
        created_at
        updated_at
        updated_with
        deleted_at (soft delete)
        deleted_with

         */
        public function up()
        {
            $this->dbforge->add_field('id');
            $this->dbforge->add_field(array(
                'user_id' => array(
                    'type' => 'INT',
                    'constraint' => '9',
                ),
                'title' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '255',
                ),
                'content' => array(
                    'type' => 'TEXT',
                ),
                'slug' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '255',
                ),
                'type' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '50',
                ),
                'published_at' => array(
                    'type' => 'TIMESTAMP',
                ),
                'created_at' => array(
                    'type' => 'TIMESTAMP',
                ),
                'updated_at' => array(
                    'type' => 'TIMESTAMP',
                ),
                'updated_with' => array(
                    'type' => 'INT',
                    'constraint' => '9',
                    'null' => TRUE,
                ),
                'deleted_at' => array(
                    'type' => 'TIMESTAMP',
                    'null' => TRUE,
                ),
                'deleted_with' => array(
                    'type' => 'INT',
                    'constraint' => '9',
                    'null'=> TRUE,
                ),
            ));
            $this->dbforge->create_table('posts');
        }

        public function down()
        {
            $this->dbforge->drop_table('posts');
        }
}