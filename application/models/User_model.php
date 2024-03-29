<?php 

    class User_model extends CI_Model{
        public function register($enc_password){
            // Create data array
            $data = array(
                'name'      => $this->input->post('name'),
                'email'     => $this->input->post('email'),
                'username'  => $this->input->post('username'),
                'password'  => $enc_password,
                'zipcode'   => $this->input->post('zipcode'),
            );

            // Insert user to the table
            return $this->db->insert('users', $data);
        }

        // Check if username exists
        public function check_username_exists($username){
            $query = $this->db->get_where('users', array('username' => $username));

            if(empty($query->row_array())){
                return true;
            } else {
                return false;
            }
        }

        // Check if email exists
        public function check_email_exists($email){
            $query = $this->db->get_where('users', array('email' => $email));

            if(empty($query->row_array())){
                return true;
            } else {
                return false;
            }
        }

        public function login($username, $password){
            // Validate
            $this->db->where('username', $username);
            $this->db->where('password', $password);

            $result = $this->db->get('users');

            if($result->num_rows() == 1){
                return $result->row(0)->id;
            } else {
                return false;
            }
        }
    }