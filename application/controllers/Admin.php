<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
function __construct(){
    parent::__construct();
    $this->load->database();
       $this->load->library('uuid'); // Memuat library UUID
    if($this->session->userdata('akses') <> 1){
        redirect(base_url('login'));
        }
  }
  
  function index()
    {
        $data = array(
            'judul' => 'Dashboard',
           
            

        );
         
        $this->template->load('admin/template', 'admin/home', $data);
    }
   function pegawai()
    {
        $data = array(
            'judul' => 'Data Pegawai',
            'dt_pegawai' => $this->m_umum->get_pegawai(),
            'dt_bagian' => $this->m_umum->get_data('bagian'),

        );
        $this->template->load('admin/template', 'admin/pegawai', $data);
    }
    function tambah_pegawai()
     {


        $this->form_validation->set_rules(
        'nip',
        'nip',
        'required|is_unique[pegawai.nip]',
        array('is_unique' => 'NIP sudah ada !!')
    );
        $this->form_validation->set_rules('nama_pegawai', 'nama_pegawai', 'required');

        if ($this->form_validation->run() === FALSE){
             $this->session->set_flashdata('error', validation_errors());
             redirect('admin/pegawai');
         }
        else {
              $nip = $this->input->post('nip', TRUE);
        $password_hash = password_hash($nip, PASSWORD_DEFAULT);
                    $this->db->set('id_pegawai', 'UUID()', FALSE);
 $this->db->set('password', $password_hash);
            $this->m_umum->set_data("pegawai");
            $notif = "Tambah Data  Berhasil";
            $this->session->set_flashdata('success', $notif);
            redirect('admin/pegawai');
        }
    }
     function update_pegawai($id = NULL)
{
    $id_pegawai = $this->input->post('id_pegawai');
    // Cek jika data ada
   $pegawai_lama = $this->db->get_where('pegawai', ['id_pegawai' => $id_pegawai])->row();

    if (!$pegawai_lama) {
        show_404(); // Jika tidak ditemukan
    }

    // Cek apakah nip diganti
    $nip_lama = $pegawai_lama->nip;
    $nip_baru = $this->input->post('nip');
    $rule_nip = 'required';
    if ($nip_baru != $nip_lama) {
        $rule_nip .= '|is_unique[pegawai.nip]';
    }

    // Validasi
    $this->form_validation->set_rules('nip', 'NIP', $rule_nip, [
        'required' => 'NIP wajib diisi!',
        'is_unique' => 'NIP Tidak Boleh Sama !!'
    ]);
    $this->form_validation->set_rules('nama_pegawai', 'Nama Pegawai', 'required', [
        'required' => 'Nama pegawai wajib diisi!'
    ]);

    $data = [
        'judul' => 'Update pegawai',
        'd' => $pegawai
    ];

    if ($this->form_validation->run() === FALSE) {
        $this->session->set_flashdata('error', validation_errors());
       redirect('admin/pegawai');
    } else {

        $this->m_umum->update_data('pegawai');
        $this->session->set_flashdata('update', 'Update data berhasil');
        redirect('admin/pegawai');
    }
}

    function delete_pegawai($id)
    {

        $this->m_umum->hapus('pegawai', 'id_pegawai', $id);
        $notif = "Data berhasil dihapuskan";
        $this->session->set_flashdata('delete', $notif);
        redirect('admin/pegawai');
    }
     function akun()
    {
        $data = array(
            'judul' => 'Data Akun',
            'dt_akun' => $this->m_umum->get_akun(),
            'dt_pegawai' => $this->m_umum->get_pegawai(),
            'dt_role' => $this->m_umum->get_data('role'),

        );
        $this->template->load('admin/template', 'admin/akun', $data);
    }
    function tambah_akun()
     {

        $this->db->set('id_akun', 'UUID()', FALSE);
        $this->form_validation->set_rules('tahun_akun', 'tahun_akun', 'required');

        if ($this->form_validation->run() === FALSE)
            redirect('admin/akun');
        else {

            $this->m_umum->set_data("akun");
            $notif = "Tambah Data  Berhasil";
            $this->session->set_flashdata('success', $notif);
            redirect('admin/akun');
        }
    }
    function update_akun($id=NULL)
    {
         $data = array(
                'judul' => 'Update akun',
            'd' => $this->m_umum->ambil_data('akun','id_akun',$id)

        );
        $this->form_validation->set_rules('id_akun', 'id_akun', 'required');
       
        if ($this->form_validation->run() === FALSE)
            $this->template->load('admin/template', 'admin/update_akun',$data);
             
        else {
            $this->m_umum->update_data("akun");
            $notif = " Update data Berhasil";
            $this->session->set_flashdata('update', $notif);
            redirect('admin/akun');
        }
    }
    function delete_akun($id)
    {

        $this->m_umum->hapus('akun', 'id_akun', $id);
        $notif = "Data berhasil dihapuskan";
        $this->session->set_flashdata('delete', $notif);
        redirect('admin/akun');
    }

 
      function role()
    {
        $data = array(
            'judul' => 'Data Role',
            'dt_role' => $this->m_umum->get_data('role'),

        );
        $this->template->load('admin/template', 'admin/role', $data);
    }
    function tambah_role()
     {

      
        $this->form_validation->set_rules('nama_role', 'nama_role', 'required');

        if ($this->form_validation->run() === FALSE)
            $this->template->load('admin/template', 'admin/tambah_role');
        else {

            $this->m_umum->set_data("role");
            $notif = "Tambah Data  Berhasil";
            $this->session->set_flashdata('success', $notif);
            redirect('admin/role');
        }
    }
    function update_role($id=NULL)
    {
         $data = array(
                'judul' => 'Update role',
            'd' => $this->m_umum->ambil_data('role','id_role',$id)

        );
        $this->form_validation->set_rules('id_role', 'id_role', 'required');
        $this->form_validation->set_rules('nama_role', 'nama_role', 'required');
       
        if ($this->form_validation->run() === FALSE)
            $this->template->load('admin/template', 'admin/update_role',$data);
             
        else {
            $this->m_umum->update_data("role");
            $notif = " Update data Berhasil";
            $this->session->set_flashdata('update', $notif);
            redirect('admin/role');
        }
    }
    function delete_role($id)
    {

        $this->m_umum->hapus('role', 'id_role', $id);
        $notif = "Data berhasil dihapuskan";
        $this->session->set_flashdata('delete', $notif);
        redirect('admin/role');
    }
    function rek_05()
    {
        $data = array(
            'judul' => 'Data Rek 05',
            'dt_rek_05' => $this->m_umum->get_data('rek_05'),

        );
        $this->template->load('admin/template', 'admin/rek_05', $data);
    }
    function tambah_rek_05()
     {

        $this->db->set('id_rek_05', 'UUID()', FALSE);
        $this->form_validation->set_rules('nama_rek_05', 'nama_rek_05', 'required');

        if ($this->form_validation->run() === FALSE)
            $this->template->load('admin/template', 'admin/tambah_rek_05');
        else {

            $this->m_umum->set_data("rek_05");
            $notif = "Tambah Data  Berhasil";
            $this->session->set_flashdata('success', $notif);
            redirect('admin/rek_05');
        }
    }
    function update_rek_05($id=NULL)
    {
         $data = array(
                'judul' => 'Update rek_05',
            'd' => $this->m_umum->ambil_data('rek_05','id_rek_05',$id)

        );
        $this->form_validation->set_rules('id_rek_05', 'id_rek_05', 'required');
        $this->form_validation->set_rules('nama_rek_05', 'nama_rek_05', 'required');
       
        if ($this->form_validation->run() === FALSE)
            $this->template->load('admin/template', 'admin/update_rek_05',$data);
             
        else {
            $this->m_umum->update_data("rek_05");
            $notif = " Update data Berhasil";
            $this->session->set_flashdata('update', $notif);
            redirect('admin/rek_05');
        }
    }
    function delete_rek_05($id)
    {

        $this->m_umum->hapus('rek_05', 'id_rek_05', $id);
        $notif = "Data berhasil dihapuskan";
        $this->session->set_flashdata('delete', $notif);
        redirect('admin/rek_05');
    }
     function rek_06($id)
    {

        $data = array(
            'judul' => 'Data Rek 06',
            'id' => $id,
            'dt_rek_06' => $this->m_umum->get_rek_06($id),
             'a' => $this->m_umum->ambil_data('rek_05','id_rek_05',$id),
        );
        $this->template->load('admin/template', 'admin/rek_06', $data);
    }
    function tambah_rek_06() { 
    
    $this->db->set('id_rek_06', 'UUID()', FALSE);
    $this->form_validation->set_rules('nama_rek_06','nama_rek_06','required');
    $id=$this->input->post('id_rek_05');
    if($this->form_validation->run() === FALSE)
   redirect(base_url()."admin/rek_06/".$id);
    else
    {
        
        $this->m_umum->set_data("rek_06");
        $notif = "Tambah Data Berhasil";
        $this->session->set_flashdata('success', $notif);
        redirect(base_url()."admin/rek_06/".$id);
    }
  
}

function update_rek_06()
  {
        
    $this->form_validation->set_rules('id_rek_06','id_rek_06','required');
        $id=$this->input->post('id_rek_05');
    if($this->form_validation->run() === FALSE)
        redirect(base_url()."admin/rek_06/".$id);
    else
    {
      $this->m_umum->update_data("rek_06");
       $notif = " Data berhasil diupdate";
            $this->session->set_flashdata('update', $notif);
            redirect(base_url()."admin/rek_06/".$id);
    }
    
  }

function delete_rek_06($id=NULL,$id_rek)
{
  
    $this->m_umum->hapus('rek_06','id_rek_06',$id);
     $notif = " Data berhasil dihapuskan";
        $this->session->set_flashdata('delete', $notif);
        redirect(base_url()."admin/rek_06/".$id_rek);
        
}
 
     function bagian()
    {
        $data = array(
            'judul' => 'Data Bagian',
            'dt_bagian' => $this->m_umum->get_data('bagian'),

        );
        $this->template->load('admin/template', 'admin/bagian', $data);
    }
    function tambah_bagian()
     {

        $this->db->set('id_bagian', 'UUID()', FALSE);
        $this->form_validation->set_rules('nama_bagian', 'nama_bagian', 'required');

        if ($this->form_validation->run() === FALSE)
            $this->template->load('admin/template', 'admin/tambah_bagian');
        else {

            $this->m_umum->set_data("bagian");
            $notif = "Tambah Data  Berhasil";
            $this->session->set_flashdata('success', $notif);
            redirect('admin/bagian');
        }
    }
    function update_bagian($id=NULL)
    {
         $data = array(
                'judul' => 'Update bagian',
            'd' => $this->m_umum->ambil_data('bagian','id_bagian',$id)

        );
        $this->form_validation->set_rules('id_bagian', 'id_bagian', 'required');
        $this->form_validation->set_rules('nama_bagian', 'nama_bagian', 'required');
       
        if ($this->form_validation->run() === FALSE)
            $this->template->load('admin/template', 'admin/update_bagian',$data);
             
        else {
            $this->m_umum->update_data("bagian");
            $notif = " Update data Berhasil";
            $this->session->set_flashdata('update', $notif);
            redirect('admin/bagian');
        }
    }
    function delete_bagian($id)
    {

        $this->m_umum->hapus('bagian', 'id_bagian', $id);
        $notif = "Data berhasil dihapuskan";
        $this->session->set_flashdata('delete', $notif);
        redirect('admin/bagian');
    }
    
 
}
