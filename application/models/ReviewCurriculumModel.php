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
            ->join($this->tableUser . ' as user', 'user.id = ' . $this->table . '.writed_by', 'left');

        return $baseQuery;
    }

    //ambil data mahasiswa dari database
    function get_review_curriculum_list($filters)
    {
        $limit = $filters['limit'];
        $start = $filters['start'];   
		// print_debug($filters);
        $baseQuery = $this->getBaseQuery();
        if (key_exists('search', $filters) && !empty($filters['search'])) {
            foreach ($this->filteredFields as $filteredField) {
                if ($filteredField == '*') {
                    $fields = $this->db->list_fields($this->table);
                    foreach ($fields as $field) {
                        $baseQuery->or_having($this->table . '.' . $field . ' LIKE', '%' . trim($filters['search']) . '%');
                    }
                } else {
                    $baseQuery->or_having($filteredField . ' LIKE', '%' . trim($filters['search']) . '%');
                }
            }
        }
        $baseQuery->where($this->table . '.is_deleted', false);
        $data = $baseQuery->limit($limit, $start)->get()->result_array();
        return $data;
    }

    /**
     * Update model.
     *
     * @param $data
     * @param $id
     * @return bool
     */
    public function updating($data, $id)
    {
        $condition = is_null($id) ? null : [$this->id => $id];
        if (is_array($id)) {
            $condition = $id;
        }

        return $this->db->update($this->table, $data, $condition);
    }
}
