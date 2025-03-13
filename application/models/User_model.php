<?php
class User_model extends CI_Model
{

    public function login($email, $password)
    {
        $this->db->where('email', $email);
        $query = $this->db->get('users');

        if ($query->num_rows() == 1) {
            $user = $query->row();
            if ($password == $user->password) {
                return $user;
            }
        }

        return false;
    }

    public function get_user_by_id($user_id)
    {
        $this->db->where('id', $user_id);
        $query = $this->db->get('users');

        if ($query->num_rows() == 1) {
            return $query->row();
        }

        return null;
    }

    public function update_profile($user_id, $update_data)
    {
        $this->db->where('id', $user_id);
        return $this->db->update('users', $update_data);
    }

    public function get_all_users()
    {
        $query = $this->db->get('users');
        return $query->result();
    }

    public function register_user($data)
    {
        return $this->db->insert('users', $data);
    }
}
