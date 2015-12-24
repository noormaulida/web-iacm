<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_users extends CI_Migration {
        /*
        id
        full_name
        nick_name
        cm_generation
        email
        password
        address
        phone
        date_of_birth
        company
        occupation
        institution
        avatar
        login_count
        is_admin
        validated_with
        validated_at
        created_at
        updated_at
         */
        public function up()
        {
            $this->dbforge->add_field('id');
            $this->dbforge->add_field(array(
                'full_name' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '255',
                ),
                'nick_name' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '255',
                ),
                'cm_generation' => array(
                    'type' => 'INT',
                ),
                'email' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '255',
                ),
                'password' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '255',
                ),
                'address' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '255',
                ),
                'phone' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '20',
                ),
                'date_of_birth' => array(
                    'type' => 'DATE',
                ),
                'company' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '255',
                    'null' => TRUE,
                ),
                'occupation' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '255',
                    'null' => TRUE,
                ),
                'department' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '255',
                    'null' => TRUE,
                ),
                'faculty' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '255',
                    'null'=> TRUE,
                ),
                'institution' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '255',
                    'null' => TRUE,
                ),
                'avatar' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '255',
                    'null'=> TRUE,
                ),
                'login_count' => array(
                    'type' => 'INT',
                ),
                'is_admin' => array(
                    'type' => 'TINYINT',
                    'default' => FALSE
                ),
                'validated_with' => array(
                    'type' => 'INT',
                    'constraint' => '9',
                    'null' => TRUE,
                ),
                'validated_at' => array(
                    'type' => 'TIMESTAMP',
                    'null' => TRUE
                ),
                'created_at' => array(
                    'type' => 'TIMESTAMP',
                ),
                'updated_at' => array(
                    'type' => 'TIMESTAMP',
                ),
            ));
            $this->dbforge->create_table('users');
        }

        public function down()
        {
            $this->dbforge->drop_table('users');
        }
}