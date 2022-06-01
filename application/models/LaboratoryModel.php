<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LaboratoryModel extends App_Model
{
    protected $table = 'ref_contents';

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
            ->where($this->table.'.type', 'laboratory');

        return $baseQuery;
    }
}
