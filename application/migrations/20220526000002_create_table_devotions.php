<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Class Migration_Create_table_devotions
 * @property CI_DB_forge $dbforge
 */
class Migration_Create_table_devotions extends CI_Migration
{
    public function up()
    {
        $this->dbforge->add_field([
            'id' => ['type' => 'INT', 'unsigned' => TRUE, 'constraint' => 11, 'auto_increment' => TRUE],
            'id_lecturer' => ['type' => 'INT', 'unsigned' => TRUE, 'constraint' => 11, 'null' => TRUE],
            'activity' => ['type' => 'VARCHAR', 'constraint' => '500'],
            'location' => ['type' => 'VARCHAR', 'constraint' => '500', 'null' => TRUE],
            'source_of_funds' => ['type' => 'VARCHAR', 'constraint' => '200', 'null' => TRUE],
            'year' => ['type' => 'YEAR', 'null' => TRUE],
            'proof_link' => ['type' => 'TEXT', 'null' => TRUE],
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
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('devotions');
        $this->db->insert_batch('prv_permissions', [

            [
                'module' => 'devotion', 'submodule' => 'devotion', 'permission' => PERMISSION_DEVOTION_VIEW,
                'description' => 'View devotion data'
            ],
            [
                'module' => 'devotion', 'submodule' => 'devotion', 'permission' => PERMISSION_DEVOTION_CREATE,
                'description' => 'Create new devotion'
            ],
            [
                'module' => 'devotion', 'submodule' => 'devotion', 'permission' => PERMISSION_DEVOTION_EDIT,
                'description' => 'Edit devotion'
            ],
            [
                'module' => 'devotion', 'submodule' => 'devotion', 'permission' => PERMISSION_DEVOTION_DELETE,
                'description' => 'Delete devotion'
            ],
        ]);
        echo 'Migrate Migration_Create_table_devotions' . PHP_EOL;
    }

    public function down()
    {
        $this->dbforge->drop_table('devotions');
        $this->db->delete('prv_permissions', ['module' => 'devotion', 'submodule' => 'devotion']);
        echo 'Rollback Migration_Create_table_devotions' . PHP_EOL;
    }
}
