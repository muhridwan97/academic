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
            'status' => ['type' => 'ENUM("ACTIVE", "INACTIVE")', 'default' => 'ACTIVE'],
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
        $this->db->insert_batch('prv_permissions', [

            [
                'module' => 'research', 'submodule' => 'research', 'permission' => PERMISSION_RESEARCH_VIEW,
                'description' => 'View research data'
            ],
            [
                'module' => 'research', 'submodule' => 'research', 'permission' => PERMISSION_RESEARCH_CREATE,
                'description' => 'Create new research'
            ],
            [
                'module' => 'research', 'submodule' => 'research', 'permission' => PERMISSION_RESEARCH_EDIT,
                'description' => 'Edit research'
            ],
            [
                'module' => 'research', 'submodule' => 'research', 'permission' => PERMISSION_RESEARCH_DELETE,
                'description' => 'Delete research'
            ],
        ]);
        echo 'Migrate Migration_Create_table_researches' . PHP_EOL;
    }

    public function down()
    {
        $this->dbforge->drop_table('researches');
        $this->db->delete('prv_permissions', ['module' => 'research', 'submodule' => 'research']);
        echo 'Rollback Migration_Create_table_researches' . PHP_EOL;
    }
}
