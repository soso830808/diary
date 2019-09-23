<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Initial_table extends CI_Migration
{

    public function up()
    {
        $this->dbforge->add_field(array(
            'application' => array(
                'type'       => 'varchar',
                'constraint' => '50',
                'comment'    => '用途',
            ),
            'value'       => array(
                'type'    => 'text',
                'comment' => '值',
            ),
            'memo'        => array(
                'type'       => 'varchar',
                'constraint' => '255',
                'comment'    => '備註',
            ),
        ));
        $this->dbforge->add_key('application', true);
        // $this->dbforge->add_key('value', true);
        $this->dbforge->create_table('userdata');
        $data = array(
            'application' => 'checklogin',
            'value'       => '123',
            'memo'        => '',
        );

        $this->db->insert('userdata', $data);
    }

    public function down()
    {
        $this->dbforge->drop_table('userdata');
    }
}
