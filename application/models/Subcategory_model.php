<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Subcategory_model extends CI_Model
{

    public function get_all_subcategories()
    {
        $this->db->select('subcategories.*, categories.name as category_name');
        $this->db->from('subcategories');
        $this->db->join('categories', 'categories.id = subcategories.category_id');
        $query = $this->db->get();
        return $query->result();
    }

    public function create_subcategory($category_id, $name)
    {
        $data = array('category_id' => $category_id, 'name' => $name);
        return $this->db->insert('subcategories', $data);
    }

    public function get_subcategory_by_id($subcategory_id)
    {
        $query = $this->db->get_where('subcategories', array('id' => $subcategory_id));
        return $query->row();
    }

    public function update_subcategory($subcategory_id, $name, $category_id)
    {
        $data = array('name' => $name, 'category_id' => $category_id);
        $this->db->where('id', $subcategory_id);
        return $this->db->update('subcategories', $data);
    }

    public function delete_subcategory($subcategory_id)
    {
        return $this->db->delete('subcategories', array('id' => $subcategory_id));
    }
}
