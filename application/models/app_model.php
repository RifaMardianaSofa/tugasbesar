<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class App_Model extends CI_Model {

	
	
	public function getAllData($table)
	{
		return $this->db->get($table);
	}
	
	public function getAllDataLimited($table,$limit,$offset)
	{
		return $this->db->get($table, $limit, $offset);
	}
	
	public function getSelectedDataLimited($table,$data,$limit,$offset)
	{
		return $this->db->get_where($table, $data, $limit, $offset);
	}
		
	//select table
	public function getSelectedData($table,$data)
	{
		return $this->db->get_where($table, $data);
	}
	//update table
	function updateData($table,$data,$field_key)
	{
		$this->db->update($table,$data,$field_key);
	}
	function deleteData($table,$data)
	{
		$this->db->delete($table,$data);
	}
	
	function insertData($table,$data)
	{
		$this->db->insert($table,$data);
	}
	//Query manual
	function manualQuery($q)
	{
		return $this->db->query($q);
	}

	//cari nama users
	public function Nama_User($id){
		$q = $this->db->query("SELECT * FROM users WHERE username='$id'");
		foreach ($q->result() as $t) {
			$hasil = $t->nama_lengkap;
		}
		return $hasil;
	}
	//cari nama layanan
	public function CariNamaLayanan($id){
		$q = $this->db->query("SELECT * FROM jenis_layanan WHERE id_jenis='$id'");
		if($q->num_rows()>0){
			foreach($q->result() as $k){
				$hasil = $k -> jenis_layanan;
			}
		}else{
			$hasil ='Tabs Kosong';
		}
		return $hasil;
	}
	
	//cari nama kategori
	public function Nama_Kategori($id){
		$q = $this->db->query("SELECT * FROM kategori WHERE id_kategori='$id'");
		foreach ($q->result() as $t) {
			$hasil = $t->nama_kategori;
		}
		return $hasil;
	}
	
	//Hubungi Kami belum dibaca
	public function hubungi_kami(){
		$hasil = $this->db->query("SELECT * FROM hubungi WHERE balas='N' ORDER BY id_hubungi");
		return $hasil;
	}
	
	
	//total pengunjung
	public function totalPengunjung($bln,$th){
		$q = $this->db->query("SELECT month(tanggal) as bulan, year(tanggal) as th, count(*) as total 
							FROM statistik 
							WHERE month(tanggal)='$bln' AND year(tanggal)='$th'
							GROUP BY month(tanggal),year(tanggal)");
		if($q->num_rows()>0){
			foreach($q->result() as $k){
				$hasil = $k -> total;
			}
		}else{
			$hasil = 0;
		}
		return $hasil;
	}
	
	//data gambar
	function getDataGambar() 
	{
		$query=$this->db->query("select * from tbl_gambar");
		return $query;
	}
	
	function getJmlFoto($id) 
	{
		$query =$this->db->query("select * from gallery WHERE id_album='$id'");
		$hasil = $query->num_rows(); 
		return $hasil;
	}
	
	//query login
	public function getLoginData($usr,$psw)
	{
		$u = mysql_real_escape_string($usr);
		$p = md5(mysql_real_escape_string($psw));
		$q_cek_login = $this->db->get_where('users', array('username' => $u, 'password' => $p));
		if(count($q_cek_login->result())>0)
		{
			foreach($q_cek_login->result() as $qck)
			{
					foreach($q_cek_login->result() as $qad)
					{
						$sess_data['logged_in'] = 'aingLoginWebYeuh';
						$sess_data['username'] = $qad->username;
						$sess_data['nama_lengkap'] = $qad->nama_lengkap;
						$this->session->set_userdata($sess_data);
					}
					header('location:'.base_url().'index.php/administrator/home');
			}
		}
		else
		{
			$this->session->set_flashdata('result_login', '<br>Username atau Password yang anda masukkan salah.');
			header('location:'.base_url().'index.php/administrator/login');
		}
	}
	
	public function hari_ini($hari){
		date_default_timezone_set('Asia/Jakarta'); // PHP 6 mengharuskan penyebutan timezone.
		$seminggu = array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
		//$hari = date("w");
		$hari_ini = $seminggu[$hari];
		return $hari_ini;
	}
	
	
	//Konversi tanggal
	public function tgl_sql($date){
		$exp = explode('-',$date);
		if(count($exp) == 3) {
			$date = $exp[2].'-'.$exp[1].'-'.$exp[0];
		}
		return $date;
	}
	public function tgl_str($date){
		$exp = explode('-',$date);
		if(count($exp) == 3) {
			$date = $exp[2].'-'.$exp[1].'-'.$exp[0];
		}
		return $date;
	}

	
	/* Tanggal dan Jam */
	public function Jam_Now(){
		date_default_timezone_set("Asia/Jakarta");
   		$jam = date("H:i:s"); 
   		
		return $jam;
		//echo "$jam WIB";
	}
	
	public function Hari_Bulan_Indo(){
		date_default_timezone_set('Asia/Jakarta'); // PHP 6 mengharuskan penyebutan timezone.
		$seminggu = array("Minggu","Senin","Selasa","Rabu","Kamis","Jum\'at","Sabtu");
		$hari = date("w");
		$hari_ini = $seminggu[$hari];
		
		return $hari_ini;
	}
	
	public function tgl_indo($tanggal){
			date_default_timezone_set('Asia/Jakarta'); // PHP 6 mengharuskan penyebutan timezone.
			$tgl = $tanggal; //date("Y m d");
			$tanggal = substr($tgl,8,2);
			$bulan = $this->app_model->getBulan(substr($tgl,5,2));
			$tahun = substr($tgl,0,4);
			return $tanggal.' '.$bulan.' '.$tahun;		 
	}
	
	public function tgl_now_indo(){
			date_default_timezone_set('Asia/Jakarta'); // PHP 6 mengharuskan penyebutan timezone.
			$tgl = date("Y m d");
			$tanggal = substr($tgl,8,2);
			$bulan = $this->app_model->getBulan(substr($tgl,5,2));
			$tahun = substr($tgl,0,4);
			return $tanggal.' '.$bulan.' '.$tahun;		 
	}	

	public function getBulan($bln){
		switch ($bln){
			case 1: 
				return "Januari";
				break;
			case 2:
				return "Februari";
				break;
			case 3:
				return "Maret";
				break;
			case 4:
				return "April";
				break;
			case 5:
				return "Mei";
				break;
			case 6:
				return "Juni";
				break;
			case 7:
				return "Juli";
				break;
			case 8:
				return "Agustus";
				break;
			case 9:
				return "September";
				break;
			case 10:
				return "Oktober";
				break;
			case 11:
				return "November";
				break;
			case 12:
				return "Desember";
				break;
		}
	} 
	
	/*fungsi terbilang*/
	public function bilang($x) {
		$x = abs($x);
		$angka = array("", "satu", "dua", "tiga", "empat", "lima",
		"enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
		$result = "";
		if ($x <12) {
			$result = " ". $angka[$x];
		} else if ($x <20) {
			$result = $this->app_model->bilang($x - 10). " belas";
		} else if ($x <100) {
			$result = $this->app_model->bilang($x/10)." puluh". $this->app_model->bilang($x % 10);
		} else if ($x <200) {
			$result = " seratus" . $this->app_model->bilang($x - 100);
		} else if ($x <1000) {
			$result = $this->app_model->bilang($x/100) . " ratus" . $this->app_model->bilang($x % 100);
		} else if ($x <2000) {
			$result = " seribu" . $this->app_model->bilang($x - 1000);
		} else if ($x <1000000) {
			$result = $this->app_model->bilang($x/1000) . " ribu" . $this->app_model->bilang($x % 1000);
		} else if ($x <1000000000) {
			$result = $this->app_model->bilang($x/1000000) . " juta" . $this->app_model->bilang($x % 1000000);
		} else if ($x <1000000000000) {
			$result = $this->app_model->bilang($x/1000000000) . " milyar" . $this->app_model->bilang(fmod($x,1000000000));
		} else if ($x <1000000000000000) {
			$result = $this->app_model->bilang($x/1000000000000) . " trilyun" . $this->app_model->bilang(fmod($x,1000000000000));
		}      
			return $result;
	}
	public function terbilang($x, $style=4) {
		if($x<0) {
			$hasil = "minus ". trim($this->app_model->bilang($x));
		} else {
			$hasil = trim($this->app_model->bilang($x));
		}      
		switch ($style) {
			case 1:
				$hasil = strtoupper($hasil);
				break;
			case 2:
				$hasil = strtolower($hasil);
				break;
			case 3:
				$hasil = ucwords($hasil);
				break;
			default:
				$hasil = ucfirst($hasil);
				break;
		}      
		return $hasil;
	}
}
	
/* End of file app_model.php */
/* Location: ./application/models/app_model.php */