<?php
class M_login extends CI_Model{

	function auth($username,$id_role,$tahun){
		$this->db->select('*,c.id_bagian as id_bag');
		$this->db->from('akun a');
		$this->db->join('role b', 'a.id_role = b.id_role');
		$this->db->join('pegawai c', 'a.id_pegawai = c.id_pegawai');
		$this->db->join('bagian d', 'c.id_bagian = d.id_bagian');
		$this->db->where('c.nip',$username);
		$this->db->where('a.id_role',$id_role);
		$this->db->where('a.tahun_akun',$tahun);
		$this->db->limit(1);
		$query = $this->db->get();
		return $query;
		}
		

 
 
}