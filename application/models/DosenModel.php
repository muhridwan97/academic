<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DosenModel extends App_Model
{
    protected $table = 'ref_dosens';

    public function __construct()
    {
        if ($this->config->item('sso_enable')) {
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
        ]);

        $baseQuery = $this->db->select([
            $this->table . '.*',
        ])
            ->from($this->table)
            ->order_by($this->id, 'desc');

        return $baseQuery;
    }
}
