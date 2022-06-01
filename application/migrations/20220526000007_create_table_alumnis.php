<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Class Migration_Create_table_alumnis
 * @property CI_DB_forge $dbforge
 */
class Migration_Create_table_alumnis extends CI_Migration
{
    public function up()
    {
        $this->dbforge->add_field([
            'id' => ['type' => 'INT', 'unsigned' => TRUE, 'constraint' => 11, 'auto_increment' => TRUE],
            'name' => ['type' => 'VARCHAR', 'constraint' => '500'],
            'address' => ['type' => 'TEXT', 'null' => TRUE],
            'job' => ['type' => 'VARCHAR', 'constraint' => '500'],
            'office_address' => ['type' => 'TEXT', 'null' => TRUE],
            'description' => ['type' => 'TEXT', 'null' => TRUE],
            'is_deleted' => ['type' => 'INT', 'constraint' => 1, 'default' => 0],
            'created_at' => ['type' => 'TIMESTAMP DEFAULT CURRENT_TIMESTAMP'],
            'created_by' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => TRUE],
            'updated_at' => ['type' => 'TIMESTAMP ON UPDATE CURRENT_TIMESTAMP', 'null' => TRUE],
            'updated_by' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => TRUE, 'null' => TRUE],
            'deleted_at' => ['type' => 'TIMESTAMP', 'null' => true],
            'deleted_by' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => TRUE, 'null' => TRUE]
        ]);
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('alumnis');
        $this->db->insert_batch('prv_permissions', [

            [
                'module' => 'alumni', 'submodule' => 'alumni', 'permission' => PERMISSION_ALUMNI_VIEW,
                'description' => 'View alumni data'
            ],
            [
                'module' => 'alumni', 'submodule' => 'alumni', 'permission' => PERMISSION_ALUMNI_CREATE,
                'description' => 'Create new alumni'
            ],
            [
                'module' => 'alumni', 'submodule' => 'alumni', 'permission' => PERMISSION_ALUMNI_EDIT,
                'description' => 'Edit alumni'
            ],
            [
                'module' => 'alumni', 'submodule' => 'alumni', 'permission' => PERMISSION_ALUMNI_DELETE,
                'description' => 'Delete alumni'
            ],
        ]);
        echo 'Migrate Migration_Create_table_alumnis' . PHP_EOL;
    }

    public function down()
    {
        $this->dbforge->drop_table('alumnis');
        $this->db->delete('prv_permissions', ['module' => 'alumni', 'submodule' => 'alumni']);
        echo 'Rollback Migration_Create_table_alumnis' . PHP_EOL;
    }
}
