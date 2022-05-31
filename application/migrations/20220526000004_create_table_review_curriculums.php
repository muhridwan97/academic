<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Class Migration_Create_table_review_curriculums
 * @property CI_DB_forge $dbforge
 */
class Migration_Create_table_review_curriculums extends CI_Migration
{
    public function up()
    {
        $this->dbforge->add_field([
            'id' => ['type' => 'INT', 'unsigned' => TRUE, 'constraint' => 11, 'auto_increment' => TRUE],
            'title' => ['type' => 'VARCHAR', 'constraint' => '500'],
            'body' => ['type' => 'TEXT', 'null' => TRUE],
            'writed_by' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => TRUE],
            'date' => ['type' => 'DATE', 'null' => TRUE],
            'attachment' => ['type' => 'VARCHAR', 'constraint' => '500'],
            'count_view' => ['type' => 'INT', 'constraint' => 11, 'default' => 0],
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
        $this->dbforge->create_table('review_curriculums');
        $this->db->insert_batch('prv_permissions', [

            [
                'module' => 'review curriculum', 'submodule' => 'review curriculum', 'permission' => PERMISSION_REVIEW_CURRICULUM_VIEW,
                'description' => 'View review curriculum data'
            ],
            [
                'module' => 'review curriculum', 'submodule' => 'review curriculum', 'permission' => PERMISSION_REVIEW_CURRICULUM_CREATE,
                'description' => 'Create new review curriculum'
            ],
            [
                'module' => 'review curriculum', 'submodule' => 'review curriculum', 'permission' => PERMISSION_REVIEW_CURRICULUM_EDIT,
                'description' => 'Edit review curriculum'
            ],
            [
                'module' => 'review curriculum', 'submodule' => 'review curriculum', 'permission' => PERMISSION_REVIEW_CURRICULUM_DELETE,
                'description' => 'Delete review curriculum'
            ],
        ]);
        echo 'Migrate Migration_Create_table_review_curriculums' . PHP_EOL;
    }

    public function down()
    {
        $this->dbforge->drop_table('review_curriculums');
        $this->db->delete('prv_permissions', ['module' => 'review curriculum', 'submodule' => 'review curriculum']);
        echo 'Rollback Migration_Create_table_review_curriculums' . PHP_EOL;
    }
}
