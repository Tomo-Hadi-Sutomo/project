<?php

class Voucher_model
{
    private $table = 'voucher';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }


    public function getVoucher()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }
}
