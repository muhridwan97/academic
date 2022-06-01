<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Class Migration_Create_table_ref_studies
 * @property CI_DB_forge $dbforge
 */
class Migration_Create_table_ref_studies extends CI_Migration
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
        $this->dbforge->create_table('ref_studies');
        $this->db->insert_batch('prv_permissions', [

            [
                'module' => 'study', 'submodule' => 'study', 'permission' => PERMISSION_STUDY_VIEW,
                'description' => 'View study data'
            ],
            [
                'module' => 'study', 'submodule' => 'study', 'permission' => PERMISSION_STUDY_CREATE,
                'description' => 'Create new study'
            ],
            [
                'module' => 'study', 'submodule' => 'study', 'permission' => PERMISSION_STUDY_EDIT,
                'description' => 'Edit study'
            ],
            [
                'module' => 'study', 'submodule' => 'study', 'permission' => PERMISSION_STUDY_DELETE,
                'description' => 'Delete study'
            ],
        ]);

        $this->db->insert_batch('ref_studies', [

            [
                'name' => 'RPS Semester 1', 'slug' => 'rps-semester-satu', 'is_link' => 0,
                'description' => 'RPS Semester 1'
            ],
            [
                'name' => 'RPS Semester 2', 'slug' => 'rps-semester-dua', 'is_link' => 0,
                'description' => 'RPS Semester 2'
            ],
            [
                'name' => 'RPS Semester 3', 'slug' => 'rps-semester-tiga', 'is_link' => 0,
                'description' => 'RPS Semester 3'
            ],
            [
                'name' => 'RPS Semester 4', 'slug' => 'rps-semester-empat', 'is_link' => 0,
                'description' => 'RPS Semester 4'
            ],
            [
                'name' => 'RPS Semester 5', 'slug' => 'rps-semester-lima', 'is_link' => 0,
                'description' => 'RPS Semester 5'
            ],
            [
                'name' => 'RPS Semester 6', 'slug' => 'rps-semester-enam', 'is_link' => 0,
                'description' => 'RPS Semester 6'
            ],
            [
                'name' => 'RPS Semester 7', 'slug' => 'rps-semester-tujuh', 'is_link' => 0,
                'description' => 'RPS Semester 7'
            ],
            [
                'name' => 'RPS Semester 8', 'slug' => 'rps-semester-delapan', 'is_link' => 0,
                'description' => 'RPS Semester 8'
            ],
            [
                'name' => 'RPS Mata Kuliah Pilihan', 'slug' => 'rps-pilihan', 'is_link' => 0,
                'description' => 'RPS Mata Kuliah Pilihan'
            ],
            
            [
                'name' => 'Modul PPM', 'slug' => '', 'is_link' => 1,
                'description' => 'https://drive.google.com/file/d/1Y5fvPC-zaL4Wy5rrPsBmdmjD_lr3j9oV/view'
            ],
            [
                'name' => 'Video PPM Kelas X', 'slug' => 'ppm-kelas-x', 'is_link' => 0,
                'description' => 'Video PPM Kelas X'
            ],
            [
                'name' => 'Video PPM Kelas XI', 'slug' => 'ppm-kelas-xi', 'is_link' => 0,
                'description' => 'Video PPM Kelas XI'
            ],
            [
                'name' => 'Video PPM Kelas XII', 'slug' => 'ppm-kelas-xii', 'is_link' => 0,
                'description' => 'Video PPM Kelas XII'
            ],
            [
                'name' => 'Modul PLP', 'slug' => '', 'is_link' => 1,
                'description' => 'https://drive.google.com/file/d/1Y5fvPC-zaL4Wy5rrPsBmdmjD_lr3j9oV/view'
            ],
            [
                'name' => 'Kurikulum', 'slug' => '', 'is_link' => 1,
                'description' => 'http://pfis.uin-suka.ac.id/id/page/kurikulum'
            ],
            [
                'name' => 'Jadwal Kuliah', 'slug' => '', 'is_link' => 1,
                'description' => 'http://pfis.uin-suka.ac.id/id/page/jadwal_kuliah'
            ],
            [
                'name' => 'Jadwal Ujian', 'slug' => '', 'is_link' => 1,
                'description' => 'http://pfis.uin-suka.ac.id/id/page/jadwal_ujian'
            ],
            [
                'name' => 'Kalendar Akademik', 'slug' => '', 'is_link' => 1,
                'description' => 'http://pfis.uin-suka.ac.id/id/page/kalender'
            ],
            [
                'name' => 'Pedoman Akademik', 'slug' => '', 'is_link' => 1,
                'description' => 'http://pfis.uin-suka.ac.id/id/page/pedoman_akademik/1'
            ],
        ]);
        echo 'Migrate Migration_Create_table_ref_studies' . PHP_EOL;
    }

    public function down()
    {
        $this->dbforge->drop_table('ref_studies');
        $this->db->delete('prv_permissions', ['module' => 'study', 'submodule' => 'study']);
        echo 'Rollback Migration_Create_table_ref_studies' . PHP_EOL;
    }
}
