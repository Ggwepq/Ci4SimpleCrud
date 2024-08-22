<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TblStudents extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'auto_increment' => true,
                'null' => false,
                'constraint' => 11,
            ],
            'student_name' => [
                'type' => 'TEXT',
                'null' => false
            ],
            'student_id' => [
                'type' => 'TEXT',
                'null' => false
            ],
            'student_course' => [
                'type' => 'TEXT',
                'null' => false
            ],
            'student_section' => [
                'type' => 'TEXT',
                'null' => false
            ],
            'student_batch' => [
                'type' => 'TEXT',
                'null' => false
            ],
            'student_year' => [
                'type' => 'TEXT',
                'null' => false
            ],
            'student_profile' => [
                'type' => 'TEXT',
                'null' => true
            ],
            'is_deleted' => [
                'type' => 'INT',
                'null' => false
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('tbl_students');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_students');
    }
}
