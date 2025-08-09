<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ppkeu extends CI_Controller {
function __construct(){
    parent::__construct();
    $this->load->database();
       $this->load->library('uuid'); // Memuat library UUID
    if($this->session->userdata('akses') <> 5){
        redirect(base_url('login'));
        }
  }
       function laporan_program_kegiatan_sub()
    {
        $data = array(
            'judul' => 'Data NPD',
           'program' => $this->m_umum->get_laporan_program()
      
            

        );
        $this->load->view('laporan/program_kegiatan_sub', $data);
    }
      function laporan_permintaan_anggaran()
    {
$id_bagian = $this->input->post('id_bagian');
$status_permintaan = $this->input->post('status_permintaan');
$id_jenis_npd = $this->input->post('id_jenis_npd');
$dari = $this->input->post('dari');
$sampai = $this->input->post('sampai');
 $data = array(
           'dt_permintaan_anggaran' => $this->m_umum->laporan_permintaan_anggaran($id_bagian,$id_jenis_npd,$status_permintaan,$dari,$sampai)

        );
 $this->load->view('laporan/permintaan_anggaran', $data);
    }

    function laporan_npd()
    {
$id_bagian = $this->input->post('id_bagian');
$id_jenis_npd = $this->input->post('id_jenis_npd');
$dari = $this->input->post('dari');
$sampai = $this->input->post('sampai');
 $data = array(
           'dt_permintaan_anggaran' => $this->m_umum->laporan_npd($id_bagian,$id_jenis_npd,$dari,$sampai)

        );
 $this->load->view('laporan/npd', $data);
    }
      function laporan_rekening()
    {
        $data = array(
            'judul' => 'Data NPD',
           'rekening' => $this->m_umum->get_laporan_rekening()
      
            

        );
        $this->load->view('laporan/rekening', $data);
    }
         function laporan_rincian_npd()
    {
$id_bagian = $this->input->post('id_bagian');
$id_jenis_npd = $this->input->post('id_jenis_npd');
$dari = $this->input->post('dari');
$sampai = $this->input->post('sampai');
 $data = array(
           'rincian_npd' => $this->m_umum->get_laporan_rincian_npd($id_bagian,$id_jenis_npd,$dari,$sampai)

        );
 $this->load->view('laporan/rincian_npd', $data);
    }
     function laporan_pencairan_program()
    {
$id_bagian = $this->input->post('id_bagian');
$id_program = $this->input->post('id_program');
$id_jenis_npd = $this->input->post('id_jenis_npd');
$dari = $this->input->post('dari');
$sampai = $this->input->post('sampai');

 $this->load->view('laporan/pencairan_program');
    }
     function laporan_pencairan_bagian()
    {
$id_program = $this->input->post('id_program');
$id_jenis_npd = $this->input->post('id_jenis_npd');
$dari = $this->input->post('dari');
$sampai = $this->input->post('sampai');

 $this->load->view('laporan/pencairan_bagian');
    }
      function laporan_pencairan_rekening()
    {
        $id_bagian = $this->input->post('id_bagian');
$id_program = $this->input->post('id_program');
$id_jenis_npd = $this->input->post('id_jenis_npd');
$dari = $this->input->post('dari');
$sampai = $this->input->post('sampai');
        $data = array(
            'judul' => 'Data NPD',
           'rekening' => $this->m_umum->get_laporan_rekening()
      
            

        );
        $this->load->view('laporan/pencairan_rekening', $data);
    }
    function laporan_pencairan_kegiatan()
    {
        $id_bagian = $this->input->post('id_bagian');
$id_program = $this->input->post('id_program');
$id_jenis_npd = $this->input->post('id_jenis_npd');
$dari = $this->input->post('dari');
$sampai = $this->input->post('sampai');
        $data = array(
            'judul' => 'Data NPD',
           'rekening' => $this->m_umum->get_laporan_kegiatan()
      
            

        );
        $this->load->view('laporan/pencairan_kegiatan', $data);
    }
     function ganti_password()
    {
        $id_pegawai = $this->input->post('id_pegawai');
        $password = $this->input->post('password');
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
    $this->db->query("UPDATE pegawai SET password=? WHERE id_pegawai=?", array($password_hash, $id_pegawai));
            $notif = "Ganti Password Berhasil";
            $this->session->set_flashdata('update', $notif);
            redirect('ppkeu/index');
        
    }
  function index()
    {
        $data = array(
            'judul' => 'Dashboard',
             'npd' => $this->m_umum->hitung_npd_ppkeu(),
          'pc_jenis' => $this->m_umum->grafik_pencairan_jenis(),
           'pc_bagian' => $this->m_umum->grafik_pencairan_bagian(),

            

        );
          foreach($this->m_umum->grafik_transaksi()->result_array() as $row)
        {
         $data['grafik_transaksi'][]=(float)$row['Januari'];
         $data['grafik_transaksi'][]=(float)$row['Februari'];
         $data['grafik_transaksi'][]=(float)$row['Maret'];
         $data['grafik_transaksi'][]=(float)$row['April'];
         $data['grafik_transaksi'][]=(float)$row['Mei'];
         $data['grafik_transaksi'][]=(float)$row['Juni'];
         $data['grafik_transaksi'][]=(float)$row['Juli'];
         $data['grafik_transaksi'][]=(float)$row['Agustus'];
         $data['grafik_transaksi'][]=(float)$row['September'];
         $data['grafik_transaksi'][]=(float)$row['Oktober'];
         $data['grafik_transaksi'][]=(float)$row['November'];
         $data['grafik_transaksi'][]=(float)$row['Desember'];
        }
         
        $this->template->load('ppkeu/template', 'ppkeu/home', $data);
    }

        function npd()
    {
        $data = array(
            'judul' => 'Data NPD',
            'dt_npd' => $this->m_umum->get_npd_ppkeu(),
      
            

        );
        $this->template->load('ppkeu/template', 'ppkeu/npd', $data);
    }
    function kirim_npd($id)
    {
$sql11 = "update permintaan_anggaran set status_npd=1, status_pptk=1 where id_permintaan_anggaran='$id'";
    $this->db->query($sql11);
                        
            $notif = "NPD berhasil terkirim";
            $this->session->set_flashdata('update', $notif);
            redirect('ppkeu/npd');
        }
          function validasi_npd()
    {
         $id_permintaan_anggaran=$this->input->post('id_permintaan_anggaran');
         $status=$this->input->post('status');
                $catatan_npd=$this->input->post('catatan_npd');
         if($status==1){
         $sql11 = "update permintaan_anggaran set status_ppkeu=2, status_bend=1 where id_permintaan_anggaran='$id_permintaan_anggaran'";
         $this->db->query($sql11);        }
         else{
              $sql11 = "update permintaan_anggaran set status_kpa=3, status_npd=0,status_pptk=0,status_ppkeu=0, catatan_npd='$catatan_npd' where id_permintaan_anggaran='$id_permintaan_anggaran'";
         $this->db->query($sql11); 
         }       
            $notif = "NPD berhasil divalidasi";
            $this->session->set_flashdata('update', $notif);
            redirect('ppkeu/npd');
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
            redirect('ppkeu/permintaan_anggaran');
        }
     function rincian_npd($id)
    {

        $data = array(
            'judul' => 'Data Rincian NPD',
            'id' => $id,
            'dt_rincian_npd' => $this->m_umum->get_rincian_npd($id),
            'y' => $this->m_umum->get_npd_cetak($id),
        );
        $this->template->load('ppkeu/template', 'ppkeu/rincian_npd', $data);
    }
  



  }