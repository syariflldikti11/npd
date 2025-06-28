<?php

class Login extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->model('m_login');
    }
 
    function index(){
         $akses = $this->session->userdata('akses');
        if ($akses == 1) {
            redirect(site_url('admin'));
        }
           if ($akses == 2) {
            redirect(site_url('kasubbag'));
        }
      
         else {
        $data = array(
            'judul' => 'Halaman Login',
            'menu'=> 'login',
              'dt_role' => $this->m_umum->get_data('role'),
          
        
        );  
         $this->load->view('login/index', $data);
        }
    }

    function auth(){
        $username=htmlspecialchars($this->input->post('username',TRUE),ENT_QUOTES);
        $password=htmlspecialchars($this->input->post('password',TRUE),ENT_QUOTES);
        $tahun=htmlspecialchars($this->input->post('tahun',TRUE),ENT_QUOTES);
        $id_role=htmlspecialchars($this->input->post('id_role',TRUE),ENT_QUOTES);

         $this->form_validation->set_rules('username','username','required');
         $this->form_validation->set_rules('password','password','required');
         $this->form_validation->set_rules('id_role','id_role','required');
         $this->form_validation->set_rules('tahun','tahun','required');
     
        $cek=$this->m_login->auth($username,$id_role,$tahun);
       
       if($this->form_validation->run() === FALSE){
               $notif = "Tidak boleh kosong";
            $this->session->set_flashdata('delete', $notif);
            redirect('login');
         }
         else {
        if($cek->num_rows() > 0){ 
                        $data=$cek->row_array();
               
   if($data['id_role']=='1' && password_verify($password, $data['password'])){ 
                    $this->session->set_userdata('akses','1');
                       $this->session->set_userdata('ses_nama',$data['nama_pegawai']);
                         $this->session->set_userdata('tahun',$tahun);
                    redirect('admin/index');
                 }
                  if($data['id_role']=='2' && password_verify($password, $data['password'])){ 
                    $this->session->set_userdata('akses','2');
                       $this->session->set_userdata('ses_id',$data['id_akun']);
                       $this->session->set_userdata('ses_nama',$data['nama_pegawai']);
                       $this->session->set_userdata('ses_bag',$data['nama_bagian']);
                         $this->session->set_userdata('tahun',$tahun);
                    redirect('kasubbag/index');
                 }
                 
             
        
     else {
            $notif = "username/Password Salah";
            $this->session->set_flashdata('delete', $notif);
            redirect('login');
        }
     
         }
              else {
            $notif = "username/Password Salah";
            $this->session->set_flashdata('delete', $notif);
            redirect('login');
        }
    }

     }
    

    function logout(){
        $this->session->sess_destroy();
        redirect(base_url('login'));
    }
 
}

 