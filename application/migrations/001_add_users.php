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
        last_login_ip
        validated_with
        validated_at
        created_at
        updated_at
         */
        public function up()
        {
            $this->load->model('user');
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
                    'default' => 0,
                ),
                'last_login_ip' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '20',
                    'null'=> TRUE,
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
            $data = array(
                    "full_name" => "Super Admin",
                    "nick_name" => "Super Admin",
                    "cm_generation" => 1,
                    "email" => "momo@suitmedia.com", // ubah data ini
                    "password" => $this->user->_hash('superadmin098'), // dan ini
                    "address" => "default",
                    "phone" => "default",
                    "date_of_birth" => "",
                    "company" => "",
                    "occupation" => "",
                    "institution" => "",
                    "avatar" => "assets/uploads/avatar/default.png",
                    "login_count" => 0,
                    "is_admin" => 1,
                    "created_at" => date('Y-m-d H:i:s'),
                    "updated_at" => date('Y-m-d H:i:s'),
                    "validated_at" => date('Y-m-d H:i:s'),
                    "validated_with" => 1
            );
            $this->user->store($data);
        }

        public function down()
        {
            $this->dbforge->drop_table('users');
        }
}