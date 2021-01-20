<?php
class Customer
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function all()
    {
        return $this->db->query("SELECT * FROM customers");
    }

    public function find($id)
    {
        return $this->db->query("SELECT * FROM customers WHERE customer_id = '$id'");
    }

    public function store($data)
    {
    
    }

    public function update($id, $data)
    {
    
    }

    public function delete($id)
    {
    
    }
}
