<?php

    class Users extends CI_Controller{
        public function register(){
            $this->load->model('user_model');
            $data['title']  =   'Sign Up';

            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('username', 'Username', 'required|callback_check_username_exists');
            $this->form_validation->set_rules('email', 'Email', 'required|callback_check_email_exists');
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules('password2', 'Confirm Password', 'matches[password]');

            if($this->form_validation->run() === FALSE){
                $this->load->view('templates/header');
                $this->load->view('users/register', $data);
                $this->load->view('templates/footer');
            } else {
                // Encrypt the Password Here
                $enc_password = md5($this->input->post('password'));

                $this->user_model->register($enc_password);

                // Set Message Here
                $this->session->set_flashdata('user_registered', 'You are now registered and can login!');

                redirect('posts');
            }
        }

        public function check_username_exists($username){
            $this->form_validation->set_message('check_username_exists','That username is already taken. Please choose a different one.');

            if($this->user_model->check_username_exists($username)){
                return true;
            } else {
                return false;
            }
        }

        public function check_email_exists($email){
            $this->form_validation->set_message('check_email_exists','That email address is already taken. Please choose a different one.');

            if($this->user_model->check_email_exists($email)){
                return true;
            } else {
                return false;
            }
        }

        public function login(){
            // $this->load->model('user_model');
            $data['title']  =   'User Login';

            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');

            if($this->form_validation->run() === FALSE){
                $this->load->view('templates/header');
                $this->load->view('users/login', $data);
                $this->load->view('templates/footer');
            } else {
                // Get username
                $username = $this->input->post('username');

                // Get and encrypt the password
                $password = md5($this->input->post('password'));

                // Login User
                $user_id = $this->user_model->login($username,$password);

                if($user_id){
                    // Create session
                    $user_data = array(
                        'user_id'   =>  $user_id,
                        'username'  =>  $username,
                        'loggedin' =>  true
                    );

                    $this->session->set_userdata($user_data);

                    // Set Message Here
                    $this->session->set_flashdata('user_loggedin', 'Welcome ');
                    redirect('posts');
                }  else {
                    // Set Message Here
                    $this->session->set_flashdata('login_failed', 'Incorrect Username or Password!');

                    redirect('users/login');
                }
                
                redirect('posts');
            }
        }

        public function logout(){
            // Unset user data
            $this->session->unset_userdata('loggedin');
            $this->session->unset_userdata('user_id');
            $this->session->unset_userdata('username');

            // Set Message Here
            $this->session->set_flashdata('user_loggedout', 'You are now logged out!');
            redirect('users/login');
        }
    }