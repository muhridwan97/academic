<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ResearchModel extends App_Model
{
    protected $table = 'researches';
    protected $tableLecturer = 'ref_lecturers';

    const STATUS_ACTIVE = 'ACTIVE';
    const STATUS_INACTIVE = 'INACTIVE';

    public function __construct()
    {
        if ($this->config->item('sso_enable')) {
            $this->tableLecturer = env('DB_LETTER_DATABASE') . '.ref_lecturers';
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
            'ref_lecturers.no_lecturer',
            'ref_lecturers.name'
        ]);

        $baseQuery = $this->db->select([
            $this->table . '.*',
            'ref_lecturers.no_lecturer',
            'ref_lecturers.name AS lecturer_name',
        ])
            ->from($this->table)
            ->join($this->tableLecturer . ' as ref_lecturers', 'ref_lecturers.id = ' . $this->table . '.id_lecturer', 'left')
            ->order_by($this->id, 'desc');

        return $baseQuery;
    }
}
