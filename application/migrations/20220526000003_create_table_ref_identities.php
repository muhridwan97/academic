<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Class Migration_Create_table_ref_identities
 * @property CI_DB_forge $dbforge
 */
class Migration_Create_table_ref_identities extends CI_Migration
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
        $this->dbforge->create_table('ref_identities');
        $this->db->insert_batch('prv_permissions', [

            [
                'module' => 'identity', 'submodule' => 'identity', 'permission' => PERMISSION_IDENTITY_VIEW,
                'description' => 'View identity data'
            ],
            [
                'module' => 'identity', 'submodule' => 'identity', 'permission' => PERMISSION_IDENTITY_CREATE,
                'description' => 'Create new identity'
            ],
            [
                'module' => 'identity', 'submodule' => 'identity', 'permission' => PERMISSION_IDENTITY_EDIT,
                'description' => 'Edit identity'
            ],
            [
                'module' => 'identity', 'submodule' => 'identity', 'permission' => PERMISSION_IDENTITY_DELETE,
                'description' => 'Delete identity'
            ],
        ]);

        $this->db->insert_batch('ref_identities', [

            [
                'name' => 'Leafet', 'slug' => '', 'is_link' => 1,
                'description' => 'Link leafet'
            ],
            [
                'name' => 'Brosur Versi Inggris', 'slug' => '', 'is_link' => 1,
                'description' => 'Link Brosur Versi Inggris'
            ],
            [
                'name' => 'Brosur Versi Indonesia', 'slug' => '', 'is_link' => 1,
                'description' => 'Link Brosur Versi Indonesia'
            ],
            [
                'name' => 'Profil Lulusan', 'slug' => 'graduate-profile', 'is_link' => 0,
                'description' => 'Profil Lulusan Pendidikan Fisika UIN Sunan Kalijaga:

                1. Pendidik bidang studi fisika
                2. Pengelola lembaga pendidikan formal dan nonformal
                3. Penulis/editor buku sekolah bidang fisika/IPA atau sains populer
                4. Sains komunikator'
            ],
            [
                'name' => 'Learning Outcome', 'slug' => 'learning-outcome', 'is_link' => 0,
                'description' => 'Learning Outcomes Pendidikan Fisika UIN Sunan Kalijaga

                1. Menunjukkan karakteristik insan kamil
                2. Bertanggung jawab pada tugas yang diberikan secara mandiri
                3. Mampu beradaptasi dan bekerjasama dalam tim
                4. Memiliki keterampilan problem solving
                5. Mampu berkomunikasi menggunakan bahasa Indonesia, bahasa Inggris dan bahasa Arab dengan baik
                6. Mengaplikasikan bidang pendidikan fisika berbasis Islamic values untuk mengelola pembelajaran fisika di madrasah aliyah dan SMA sederajat
                7. Mengaplikasikan teknologi informasi untuk pembelajaran fisika
                8. Mengimplementasikan keterampilan pembelajaran inklusif untuk mata pelajaran fisika
                9. Mengaplikasikan konsep kepemimpinan FAST (Fathonah, Amanah, Shidiq, Tabligh) untuk mengelola lembaga pendidikan formal dan nonformal
                10. Menguasai keterampilan layouting dan editing buku di bidang fisika/IPA/kependidikan/sains popular
                11. Mampu merasionalisasi konsep-konsep ilmu fisika dan kependidikan untuk memformulasikan pembelajaran fisika yang memuat nilai-nilai keislaman'
            ],
            [
                'name' => 'Visi Misi', 'slug' => 'visi-misi', 'is_link' => 0,
                'description' => 'Visi Prodi Pendidikan Kimia

                “Unggul dan terkemuka dengan reputasi internasional dan menjadi rujukan ditingkat nasional dalam pemaduan dan pengembangan keilmuan Kimia dan kependidikan berbasis kearifan lokal wilayah tropis Indonesia yang terintegrasi dengan wawasan dan nilai-nilai keislaman bagi Peradaban dan Kemanusiaan”
                
                Misi Prodi Pendidikan Kimia
                
                “Menyelenggarakan pendidikan dan pengajaran, penelitian dan publikasi ilmiah serta pengabdian kepada masyarakat dalam bidang pendidikan kimia yang terintegrasi dengan wawasan dan nilai-nilai keislaman, keindonesiaan, dan kearifan lokal wilayah tropis Indonesia dalam rangka turut serta mencerdaskan kehidupan bangsa, mendukung keunggulan kompetitif bangsa, dan berkontribusi bagi kemajuan peradaban umat manusia.”'
            ],
        ]);
        echo 'Migrate Migration_Create_table_ref_identities' . PHP_EOL;
    }

    public function down()
    {
        $this->dbforge->drop_table('ref_identities');
        $this->db->delete('prv_permissions', ['module' => 'identity', 'submodule' => 'identity']);
        echo 'Rollback Migration_Create_table_ref_identities' . PHP_EOL;
    }
}
