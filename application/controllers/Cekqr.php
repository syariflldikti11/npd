 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cekqr extends CI_Controller {
function kpa($id)
    {
        $data = array(
            'judul' => 'Data NPD',
           'dt_rincian_npd' => $this->m_umum->get_rincian_npd($id),
            'y' => $this->m_umum->get_npd_cetak($id),
            't' => $this->m_umum->get_ttd_kpa(),
       
      
            

        );
        $this->load->view('qr/qr_kpa', $data);
    }
    function pptk($id)
    {
        $data = array(
            'judul' => 'Data NPD',
           'dt_rincian_npd' => $this->m_umum->get_rincian_npd($id),
            'y' => $this->m_umum->get_npd_cetak($id),
          
            'r' => $this->m_umum->get_ttd_pptk(),
      
            

        );
              $this->load->view('qr/qr_pptk', $data);
    }
}