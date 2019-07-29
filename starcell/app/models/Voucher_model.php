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

    public function getVoucherById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function inputDataVoucher($data)
    {
        $query = "INSERT INTO voucher
                    (provider, kuota, harga, stok)
                    VALUES
                    (:provider, :kuota, :harga, :stok)";
        $this->db->query($query);
        $this->db->bind('provider', $data['insert_provider']);
        $this->db->bind('kuota', $data['insert_kuota']);
        $this->db->bind('harga', $data['insert_harga']);
        $this->db->bind('stok', $data['insert_stok']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function dropDataVoucher($id)
    {
        $query = "DELETE FROM voucher WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function editDataVoucher($data)
    {
        $query = "UPDATE voucher SET
                    provider = :provider,
                    kuota = :kuota,
                    harga = :harga,
                    stok = :stok
                WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('provider', $data['insert_provider']);
        $this->db->bind('kuota', $data['insert_kuota']);
        $this->db->bind('harga', $data['insert_harga']);
        $this->db->bind('stok', $data['insert_stok']);
        $this->db->bind('id', $data['insert_id']);

        $this->db->execute();

        return $this->db->rowCount();
    }
}
