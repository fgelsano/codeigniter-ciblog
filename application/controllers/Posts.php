<?php
    class Posts extends CI_Controller{
        public function index($offset = 0){
            // Pagination Config
            $config['base_url']         =   base_url() . 'posts/index/';
            $config['total_rows']       =   $this->db->count_all('posts');
            $config['per_page']         =   5;
            $config['uri_segment']      =   3;     
            $config['full_tag_open']    =   '<ul class="pagination">';
            $config['full_tag_close']   =   '</ul>';
            $config['attributes']       =   ['class' => 'page-link'];
            $config['first_link']       =   'First';
            $config['last_link']        =   'Last';
            $config['first_tag_open']   =   '<li class="page-item">';
            $config['first_tag_close']  =   '</li>';
            $config['prev_link']        =   '&laquo';
            $config['prev_tag_open']    =   '<li class="page-item">';
            $config['prev_tag_close']   =   '</li>';
            $config['next_link']        =   '&raquo';
            $config['next_tag_open']    =   '<li class="page-item">';
            $config['next_tag_close']   =   '</li>';
            $config['last_tag_open']    =   '<li class="page-item">';
            $config['last_tag_close']   =   '</li>';
            $config['cur_tag_open']     =   '<li class="page-item active"><a href="#" class="page-link">';
            $config['cur_tag_close']    =   '<span class="sr-only">(current)</span></a></li>';
            $config['num_tag_open']     =   '<li class="page-item">';
            $config['num_tag_close']    =   '</li>';  
            

            $config['attributes']       =   array('class' => 'page-link');

            $this->pagination->initialize($config);

            $this->load->model('post_model');
            $this->load->helper('url');
            $this->load->helper('html');

            $data['title']          =   'Latest Posts';
            $data['posts']          =   $this->post_model->get_posts(FALSE, $config['per_page'], $offset);
            // $data['total_posts']    =   $this->db->count_all('posts');

            $this->load->view('templates/header');
            $this->load->view('posts/index', $data);
            $this->load->view('templates/footer');

        }

        public function view($slug = NULL){
            $this->load->model('post_model');

            $data['post']   =   $this->post_model->get_posts($slug);
            
            $post_id = $data['post']['id'];
            $data['comments'] = $this->comment_model->get_comments($post_id);

            if(empty($data['post'])){
                show_404();
            }

            $data['title']  =   $data['post']['title'];
            $this->load->view('templates/header');
            $this->load->view('posts/view', $data);
            $this->load->view('templates/footer');
        }

        public function create(){
            $this->load->model('post_model');

            // Check if logged in
            if(!$this->session->userdata('loggedin')){
                redirect('users/login');
            }
            $data['title']  =   'Create Post';

            $data['categories'] = $this->post_model->get_categories();

            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('body', 'Body', 'required');

            if($this->form_validation->run() === FALSE){
                $this->load->view('templates/header');
                $this->load->view('posts/create', $data);
                $this->load->view('templates/footer');
            } else {
                // Upload Image
                $config['upload_path']      = './assets/images/posts';
                $config['allowed_types']    = 'gif|jpg|png';
                $config['max_size']         = '2048';
                $config['max_width']        = '3000';
                $config['max_height']       = '3000';

                $this->load->library('upload', $config);

                if(!$this->upload->do_upload()){
                    $errors     = array('error' => $this->upload->display_errors());
                    $post_image = 'noimage.jpg';
                } else {
                    $data = array('upload_data' => $this->upload->data());
                    $post_image = $_FILES['userfile']['name'];
                }

                $this->post_model->create_post($post_image);

                // Set Message Here
                $this->session->set_flashdata('post_created', 'Post created!');

                redirect('posts');
            }

        }
        
        public function delete($id){
            $this->load->model('post_model');

            // Check if logged in
            if(!$this->session->userdata('loggedin') === 1){
                redirect('users/login');
            }

            $this->post_model->delete_post($id);
            
            // Set Message Here
            $this->session->set_flashdata('post_deleted', 'Post deleted!');

            redirect('posts');
        }

        public function edit($slug){
            $this->load->model('post_model');

            // Check if logged in
            if(!$this->session->userdata('loggedin')){
                redirect('users/login');
            }

            $data['post']       =   $this->post_model->get_posts($slug);
            
            // Check user
            if($this->session->userdata('user_id') != $this->post_model->get_posts($slug)['user_id']){
                redirect('posts');
            }

            $data['categories'] =   $this->post_model->get_categories();

            if(empty($data['post'])){
                show_404();
            }

            $data['title']  =   'Edit Post';
            $this->load->view('templates/header');
            $this->load->view('posts/edit', $data);
            $this->load->view('templates/footer');
        }

        public function update(){
            // Check if logged in
            if(!$this->session->userdata('loggedin')){
                redirect('users/login');
            }

            $this->load->model('post_model');
            $this->post_model->update_post();

            // Set Message Here
            $this->session->set_flashdata('post_updated', 'Post updated!');
            redirect('posts');
        }
    }