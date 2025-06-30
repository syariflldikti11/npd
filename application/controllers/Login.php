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
         if ($akses == 6) {
            redirect(site_url('pptk'));
        }
        if ($akses == 3) {
            redirect(site_url('kpa'));
        }
         if ($akses == 4) {
            redirect(site_url('bendahara'));
        }
         if ($akses == 5) {
            redirect(site_url('ppkeu'));
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
     
        $cek=$this->m_login->auth($username,$id_role,$tahun);
       
      
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
                         $this->session->set_userdata('tahun_akun',$data['tahun_akun']);
                    redirect('kasubbag/index');
                 }
                  if($data['id_role']=='6' && password_verify($password, $data['password'])){ 
                    $this->session->set_userdata('akses','6');
                       $this->session->set_userdata('ses_id',$data['id_akun']);
                       $this->session->set_userdata('ses_nama',$data['nama_pegawai']);
                       $this->session->set_userdata('ses_bag',$data['nama_bagian']);
                         $this->session->set_userdata('tahun',$tahun);
                         $this->session->set_userdata('ses_id_bag',$data['id_bag']);
                              $this->session->set_userdata('tahun_akun',$data['tahun_akun']);
                    redirect('pptk/index');
                 }
                  if($data['id_role']=='3' && password_verify($password, $data['password'])){ 
                    $this->session->set_userdata('akses','3');
                       $this->session->set_userdata('ses_id',$data['id_akun']);
                       $this->session->set_userdata('ses_nama',$data['nama_pegawai']);
                       $this->session->set_userdata('ses_bag',$data['nama_bagian']);
                         $this->session->set_userdata('tahun',$tahun);
                         $this->session->set_userdata('ses_id_bag',$data['id_bag']);
                              $this->session->set_userdata('tahun_akun',$data['tahun_akun']);
                    redirect('kpa/index');
                 }
                  if($data['id_role']=='4' && password_verify($password, $data['password'])){ 
                    $this->session->set_userdata('akses','4');
                       $this->session->set_userdata('ses_id',$data['id_akun']);
                       $this->session->set_userdata('ses_nama',$data['nama_pegawai']);
                       $this->session->set_userdata('ses_bag',$data['nama_bagian']);
                         $this->session->set_userdata('tahun',$tahun);
                         $this->session->set_userdata('ses_id_bag',$data['id_bag']);
                              $this->session->set_userdata('tahun_akun',$data['tahun_akun']);
                    redirect('bendahara/index');
                 }
                  if($data['id_role']=='5' && password_verify($password, $data['password'])){ 
                    $this->session->set_userdata('akses','5');
                       $this->session->set_userdata('ses_id',$data['id_akun']);
                       $this->session->set_userdata('ses_nama',$data['nama_pegawai']);
                       $this->session->set_userdata('ses_bag',$data['nama_bagian']);
                         $this->session->set_userdata('tahun',$tahun);
                         $this->session->set_userdata('ses_id_bag',$data['id_bag']);
                              $this->session->set_userdata('tahun_akun',$data['tahun_akun']);
                    redirect('ppkeu/index');
                 }
                 
             
        
     else {
       $this->session->unset_userdata('akses');
       $this->session->set_flashdata('error', 'User /Password yang Anda masukkan salah.');
            redirect('login');
        }
     
         }
              else {
              $this->session->unset_userdata('akses');
    $this->session->set_flashdata('error', 'User /Password yang Anda masukkan salah.');
            redirect('login');
        }
    

     }
    

    function logout(){
        $this->session->sess_destroy();
        redirect(base_url('login'));
    }
 
}

 