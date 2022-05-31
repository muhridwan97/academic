<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ReviewCurriculumModel extends App_Model
{
    protected $table = 'review_curriculums';
    protected $tableUser = 'prv_users';

    const STATUS_ACTIVE = 'ACTIVE';
    const STATUS_INACTIVE = 'INACTIVE';

    public function __construct()
    {
        if ($this->config->item('sso_enable')) {
            $this->tableUser = env('DB_SSO_DATABASE') . '.prv_users';
        }
    }
    /**
     * Get base query of table.
     *
     * @return CI_DB_query_builder
     */
    public function getBaseQuery()
    {
        $this->addFilteredField([
            'user.name'
        ]);

        $baseQuery = $this->db->select([
            $this->table . '.*',
            'user.name AS writer_name',
        ])
            ->from($this->table)
            ->join($this->tableUser . ' as user', 'user.id = ' . $this->table . '.writed_by', 'left')
            ->order_by($this->table. '.id', 'desc');

        return $baseQuery;
    }

    //ambil data mahasiswa dari database
    function get_review_curriculum_list($limit, $start)
    {
        $query = $this->getBaseQuery()
                ->where($this->table . '.is_deleted', false)
                ->limit($limit, $start)->get()->result_array();
        return $query;
    }
}
