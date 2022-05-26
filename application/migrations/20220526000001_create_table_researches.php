<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Class Migration_Create_table_researches
 * @property CI_DB_forge $dbforge
 */
class Migration_Create_table_researches extends CI_Migration
{
    public function up()
    {
        $this->dbforge->add_field([
            'id' => ['type' => 'INT', 'unsigned' => TRUE, 'constraint' => 11, 'auto_increment' => TRUE],
            'id_lecturer' => ['type' => 'INT', 'unsigned' => TRUE, 'constraint' => 11, 'null' => TRUE],
            'research_title' => ['type' => 'VARCHAR', 'constraint' => '500'],
            'research_type' => ['type' => 'VARCHAR', 'constraint' => '100', 'null' => TRUE],
            'source_of_funds' => ['type' => 'VARCHAR', 'constraint' => '200', 'null' => TRUE],
            'year' => ['type' => 'YEAR', 'null' => TRUE],
            'journal_accreditation' => ['type' => 'VARCHAR', 'constraint' => '200', 'null' => TRUE],
            'journal_link' => ['type' => 'TEXT', 'null' => TRUE],
            'description' => ['type' => 'TEXT', 'null' => TRUE],
            'is_deleted' => ['type' => 'INT', 'constraint' => 1, 'default' => 0],
            'created_at' => ['type' => 'TIMESTAMP DEFAULT CURRENT_TIMESTAMP'],
            'created_by' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => TRUE],
            'updated_at' => ['type' => 'TIMESTAMP ON UPDATE CURRENT_TIMESTAMP', 'null' => TRUE],
            'updated_by' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => TRUE, 'null' => TRUE],
            'deleted_at' => ['type' => 'TIMESTAMP', 'null' => true],
            'deleted_by' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => TRUE, 'null' => TRUE]
        ]);
        //->add_field('CONSTRAINT fk_curriculum_department FOREIGN KEY (id_department) REFERENCES ref_departments(id) ON DELETE CASCADE ON UPDATE CASCADE');
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('researches');
        echo 'Migrate Migration_Create_table_researches' . PHP_EOL;
    }

    public function down()
    {
        $this->dbforge->drop_table('curriculums');
        echo 'Rollback Migration_Create_table_researches' . PHP_EOL;
    }
}
