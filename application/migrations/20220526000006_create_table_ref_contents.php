<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Class Migration_Create_table_ref_contents
 * @property CI_DB_forge $dbforge
 */
class Migration_Create_table_ref_contents extends CI_Migration
{
    public function up()
    {
        $this->dbforge->add_field([
            'id' => ['type' => 'INT', 'unsigned' => TRUE, 'constraint' => 11, 'auto_increment' => TRUE],
            'name' => ['type' => 'VARCHAR', 'constraint' => '500'],
            'slug' => ['type' => 'VARCHAR', 'constraint' => '500'],
            'type' => ['type' => 'VARCHAR', 'constraint' => '500'],
            'is_link' => ['type' => 'INT', 'constraint' => 1, 'default' => 0],
            'description' => ['type' => 'TEXT', 'null' => TRUE],
            'created_at' => ['type' => 'TIMESTAMP DEFAULT CURRENT_TIMESTAMP'],
            'created_by' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => TRUE],
            'updated_at' => ['type' => 'TIMESTAMP ON UPDATE CURRENT_TIMESTAMP', 'null' => TRUE],
            'updated_by' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => TRUE, 'null' => TRUE],
        ]);
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('ref_contents');
        $this->db->insert_batch('prv_permissions', [

            [
                'module' => 'content', 'submodule' => 'content', 'permission' => PERMISSION_CONTENT_VIEW,
                'description' => 'View content data'
            ],
            [
                'module' => 'content', 'submodule' => 'content', 'permission' => PERMISSION_CONTENT_CREATE,
                'description' => 'Create new content'
            ],
            [
                'module' => 'content', 'submodule' => 'content', 'permission' => PERMISSION_CONTENT_EDIT,
                'description' => 'Edit content'
            ],
            [
                'module' => 'content', 'submodule' => 'content', 'permission' => PERMISSION_CONTENT_DELETE,
                'description' => 'Delete content'
            ],
        ]);

        $this->db->insert_batch('ref_contents', [

            [
                'name' => 'Jurnal Difabel', 'slug' => 'disabled-journal','type' => 'journal', 'is_link' => 0,
                'description' => 'Jurnal Difabel'
            ],
            [
                'name' => 'Jurnal Pendidikan Fisika', 'slug' => 'pfis-journal','type' => 'journal', 'is_link' => 0,
                'description' => 'Jurnal Pendidikan Fisika'
            ],
            [
                'name' => 'Jurnal Prodi', 'slug' => '','type' => 'journal', 'is_link' => 1,
                'description' => 'http://ejournal.uin-suka.ac.id/tarbiyah/jtcre/index'
            ],
            [
                'name' => 'Jurnal International', 'slug' => 'international-journal','type' => 'journal', 'is_link' => 0,
                'description' => 'Jurnal International'
            ],
            [
                'name' => 'Modul Praktikum Gasal', 'slug' => 'gasal-modul','type' => 'laboratory', 'is_link' => 0,
                'description' => 'Modul Praktikum Gasal'
            ],
            [
                'name' => 'Modul Praktikum Genap', 'slug' => 'genap-modul','type' => 'laboratory', 'is_link' => 0,
                'description' => 'Modul Praktikum Genap'
            ],
            [
                'name' => 'Aduan Mahasiswa', 'slug' => '','type' => 'tracer-study', 'is_link' => 1,
                'description' => 'https://docs.google.com/forms/d/1uqgUJ-paOflhjInvuZJiouEJMAcl5KpV3jCBwrwiN2E/edit?usp=sharing'
            ],
            [
                'name' => 'Survei Kepuasan Mahasiswa', 'slug' => '','type' => 'tracer-study', 'is_link' => 1,
                'description' => 'https://docs.google.com/forms/d/e/1FAIpQLSc6scoYeuzxO45lCDbja42GkZB0N7pnbAgpCF-hd3tTT2h2fQ/viewform?usp=sf_link'
            ],
            [
                'name' => 'Tracer Pengguna Alumni', 'slug' => '','type' => 'tracer-study', 'is_link' => 1,
                'description' => 'https://docs.google.com/forms/d/e/1FAIpQLSdp5vBnyF5NZ-864FWBflIBgS1Zs2ddOAtV0hxY_xA-fnOKug/viewform'
            ],
            [
                'name' => 'Tracer Alumni', 'slug' => '','type' => 'tracer-study', 'is_link' => 1,
                'description' => 'https://docs.google.com/forms/d/e/1FAIpQLSfpca7aHdnyzafc2QrAZe4oJYUOIDtUYxU8q2AYNwFfLJY0dA/viewform'
            ],
            [
                'name' => 'Dokumen Perkuliahan', 'slug' => 'study-doc','type' => 'document', 'is_link' => 0,
                'description' => 'Dokumen Perkuliahan'
            ],
        ]);
        echo 'Migrate Migration_Create_table_ref_contents' . PHP_EOL;
    }

    public function down()
    {
        $this->dbforge->drop_table('ref_contents');
        $this->db->delete('prv_permissions', ['module' => 'content', 'submodule' => 'content']);
        echo 'Rollback Migration_Create_table_ref_contents' . PHP_EOL;
    }
}
