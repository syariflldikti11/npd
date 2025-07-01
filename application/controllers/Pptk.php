<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pptk extends CI_Controller {
function __construct(){
    parent::__construct();
    $this->load->database();
       $this->load->library('uuid'); // Memuat library UUID
    if($this->session->userdata('akses') <> 6){
        redirect(base_url('login'));
        }
  }
     function ganti_password()
    {
        $id_pegawai = $this->input->post('id_pegawai');
        $password = $this->input->post('password');
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
    $this->db->query("UPDATE pegawai SET password=? WHERE id_pegawai=?", array($password_hash, $id_pegawai));
            $notif = "Ganti Password Berhasil";
            $this->session->set_flashdata('update', $notif);
            redirect('pptk/index');
        
    }
  function index()
    {
        $data = array(
            'judul' => 'Dashboard',
           
            

        );
         
        $this->template->load('pptk/template', 'pptk/home', $data);
    }
     function cetak_npd($id)
    {
        $data = array(
            'judul' => 'Data NPD',
           'dt_rincian_npd' => $this->m_umum->get_rincian_npd($id),
            'y' => $this->m_umum->get_npd_cetak($id),
            't' => $this->m_umum->get_ttd_kpa(),
            'r' => $this->m_umum->get_ttd_pptk(),
      
            

        );
        $this->load->view('laporan/cetak_npd', $data);
    }
 function permintaan_anggaran()
    {
        $data = array(
            'judul' => 'Data permintaan_anggaran',
            'dt_permintaan_anggaran' => $this->m_umum->get_permintaan_anggaran_pptk(),
      
            

        );
        $this->template->load('pptk/template', 'pptk/permintaan_anggaran', $data);
    }

        function npd()
    {
        $data = array(
            'judul' => 'Data NPD',
            'dt_npd' => $this->m_umum->get_npd_pptk(),
      
            

        );
        $this->template->load('pptk/template', 'pptk/npd', $data);
    }
    function kirim_npd($id)
    {
$sql11 = "update permintaan_anggaran set status_npd=1, status_pptk=1 where id_permintaan_anggaran='$id'";
    $this->db->query($sql11);
                        
            $notif = "NPD berhasil terkirim";
            $this->session->set_flashdata('update', $notif);
            redirect('pptk/npd');
        }
          function validasi_npd()
    {
         $id_permintaan_anggaran=$this->input->post('id_permintaan_anggaran');
         $status=$this->input->post('status');
         $tgl=date('Y-m-d');
         $catatan_npd=$this->input->post('catatan_npd');
         if($status==1){
         $sql11 = "update permintaan_anggaran set status_pptk=2, status_kpa=1, tgl_persetujuan_pptk='$tgl' where id_permintaan_anggaran='$id_permintaan_anggaran'";
         $this->db->query($sql11);        }
         else{
              $sql11 = "update permintaan_anggaran set status_pptk=3, status_npd=0, catatan_npd='$catatan_npd' where id_permintaan_anggaran='$id_permintaan_anggaran'";
         $this->db->query($sql11); 
         }       
            $notif = "NPD berhasil divalidasi";
            $this->session->set_flashdata('update', $notif);
            redirect('pptk/npd');
        }
               function validasi_permintaan_anggaran()
    {
         $id_permintaan_anggaran=$this->input->post('id_permintaan_anggaran');
         $status=$this->input->post('status');
         $catatan=$this->input->post('catatan');
         
         $sql11 = "update permintaan_anggaran set status_permintaan=$status, catatan='$catatan' where id_permintaan_anggaran='$id_permintaan_anggaran'";
         $this->db->query($sql11);       
        
        
             
            $notif = "Permintaan Anggaran berhasil divalidasi";
            $this->session->set_flashdata('update', $notif);
            redirect('pptk/permintaan_anggaran');
        }
     function rincian_npd($id)
    {

        $data = array(
            'judul' => 'Data Rincian NPD',
            'id' => $id,
            'dt_rincian_npd' => $this->m_umum->get_rincian_npd($id),
            'y' => $this->m_umum->get_npd_cetak($id),
        );
        $this->template->load('pptk/template', 'pptk/rincian_npd', $data);
    }
  



  }