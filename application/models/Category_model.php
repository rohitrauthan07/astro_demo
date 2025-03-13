<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_all_categories()
    {
        $query = $this->db->get('categories');
        return $query->result();
    }

    public function create_category($name)
    {
        $data = array('name' => $name);
        return $this->db->insert('categories', $data);
    }

    public function get_category_by_id($category_id)
    {
        $this->db->where('id', $category_id);
        $query = $this->db->get('categories');
        return $query->row();
    }

    public function update_category($category_id, $name)
    {
        $data = array('name' => $name);
        $this->db->where('id', $category_id);
        return $this->db->update('categories', $data);
    }

    public function delete_category($category_id)
    {
        return $this->db->delete('categories', array('id' => $category_id));
    }
}
