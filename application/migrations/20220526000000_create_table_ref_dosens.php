<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Class Migration_Create_table_ref_dosens
 * @property CI_DB_forge $dbforge
 */
class Migration_Create_table_ref_dosens extends CI_Migration
{
    public function up()
    {
        $this->dbforge->add_field([
            'id' => ['type' => 'INT', 'unsigned' => TRUE, 'constraint' => 11, 'auto_increment' => TRUE],
            'name' => ['type' => 'VARCHAR', 'constraint' => '500'],
            'slug' => ['type' => 'VARCHAR', 'constraint' => '500'],
            'is_link' => ['type' => 'INT', 'constraint' => 1, 'default' => 0],
            'description' => ['type' => 'TEXT', 'null' => TRUE],
            'created_at' => ['type' => 'TIMESTAMP DEFAULT CURRENT_TIMESTAMP'],
            'created_by' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => TRUE],
            'updated_at' => ['type' => 'TIMESTAMP ON UPDATE CURRENT_TIMESTAMP', 'null' => TRUE],
            'updated_by' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => TRUE, 'null' => TRUE],
        ]);
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('ref_dosens');
        $this->db->insert_batch('prv_permissions', [

            [
                'module' => 'dosen', 'submodule' => 'dosen', 'permission' => PERMISSION_DOSEN_VIEW,
                'description' => 'View dosen data'
            ],
            [
                'module' => 'dosen', 'submodule' => 'dosen', 'permission' => PERMISSION_DOSEN_CREATE,
                'description' => 'Create new dosen'
            ],
            [
                'module' => 'dosen', 'submodule' => 'dosen', 'permission' => PERMISSION_DOSEN_EDIT,
                'description' => 'Edit dosen'
            ],
            [
                'module' => 'dosen', 'submodule' => 'dosen', 'permission' => PERMISSION_DOSEN_DELETE,
                'description' => 'Delete dosen'
            ],
        ]);

        $this->db->insert_batch('ref_dosens', [

            [
                'name' => 'Review Kurikulum', 'slug' => 'review-kurikulum', 'is_link' => 0,
                'description' => 'Review Kurikulum'
            ],
        ]);
        echo 'Migrate Migration_Create_table_ref_dosens' . PHP_EOL;
    }

    public function down()
    {
        $this->dbforge->drop_table('ref_dosens');
        $this->db->delete('prv_permissions', ['module' => 'dosen', 'submodule' => 'dosen']);
        echo 'Rollback Migration_Create_table_ref_dosens' . PHP_EOL;
    }
}
