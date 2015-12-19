<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Home extends CI_Controller {

	public function index()
	{
		$d['isi']= 'isi';
		$this->load->view('home',$d);
	}
	
	public function view_data()
	{
		$result = array();
		$result['total'] = $this->db->query("SELECT * FROM tb_buku")->num_rows();
		$row = array();	
		
		$criteria = $this->db->query("SELECT * FROM tb_buku ORDER BY id DESC");
		$no=1;
		foreach($criteria->result_array() as $data)
		{	
			$row[] = array(
				'no'=>$no++,
				'isbn'=>$data['isbn'],
				'judul'=>$data['judul'],
				'pengarang'=>$data['pengarang'],
				'penerbit'=>$data['penerbit'],
				'tahun'=>'<center>'.$data['tahun'].'</center>',
				'edisi'=>'<center>'.$data['edisi'].'</center>',
				'download'=>'<center><a href="'.base_url().'index.php/home/download/'.$data['gambar'].'"><i class="icon-download-2 on-left"></i></a> '.$data['dibaca'].' Kali </center>'
			);
		}
		//$result=array_merge($result,array('rows'=>$row));
		$result=array('aaData'=>$row);
		echo  json_encode($result);
	}
	
	public function download()
	{
			$this->load->helper('download');
			$file = $this->uri->segment(3);
			if(empty($file)){
				redirect('home','refresh');
			}
			$this->app_model->manualQuery("UPDATE tb_buku SET dibaca=dibaca+1 WHERE gambar='$file'");
			$data = file_get_contents(base_url()."download/".$file); // Read the file's contents
			$name = $file;
			force_download($name, $data);		
	}
	
	public function hubungi_kami()
	{
		/***capcai***/
		$vals = array(
			'img_path' => './assets/captcha/',
			'img_url' => base_url().'assets/captcha/',
			'font_path' => './system/fonts/impact.ttf',
			'img_width' => '155',
			'img_height' => '40',
			'expiration' => 90
		);
		$cap = create_captcha($vals);
	 
		$datamasuk = array(
			'captcha_time' => $cap['time'],
			'ip_address' => $this->input->ip_address(),
			'word' => $cap['word']
		);
		
		$this->app_model->insertData('captcha', $datamasuk);
			
		$d['gbr_captcha'] = $cap['image'];
				
		//$dd['data'] ='';
		$d['isi']= ('hubungi');//$this->load->view('hubungi',$dd,true);
		$this->load->view('home',$d);
	}
	
	public function simpan_hubungi()
	{
		
		$dt['nama'] = mysql_real_escape_string($this->input->post('nama'));
		$dt['email'] = $this->input->post('email');
		$dt['subjek'] = mysql_real_escape_string($this->input->post('subjek'));
		$dt['pesan'] = $this->input->post('pesan');
		$dt['tanggal'] = date('Y-m-d');
		$cap = 	$this->input->post('captcha');
		
		
		$expiration = time()-9000;
		$this->app_model->manualQuery("DELETE FROM captcha WHERE captcha_time < ".$expiration);
		
		$sql = "SELECT COUNT(*) AS count FROM captcha WHERE word = ? AND ip_address = ? AND captcha_time > ?";
		$binds = array($cap, $this->input->ip_address(), $expiration);
		$query = $this->db->query($sql, $binds);
		$row = $query->num_rows();
		if ($row == 0){
			echo "Captcha salah silahkan ulangi lagi.";
		}else{			
			$this->app_model->insertData("hubungi",$dt);
			
			/** variabel **/
			$email = $this->input->post('email');
			$nama = mysql_real_escape_string($this->input->post('nama'));
			$subjek =  mysql_real_escape_string($this->input->post('subjek'));
			$isi = $this->input->post('pesan');
			
			/**config **/
			$config = Array( 
			  'protocol' => 'smtp', 
			 'smtp_host' => 'ssl://smtp.googlemail.com', 
			  'smtp_port' => 465, 
			 'smtp_user' => 'rifamardiana15@gmail.com', 
			 'smtp_pass' => '', );
			 
			$this->email->from($email, $nama);
			$this->email->to('rifamardiana15@gmail.com'); 
			$this->email->cc('rifamardiana15@gmail.com'); 
			//$this->email->bcc('them@their-example.com'); 
			
			$this->email->subject($subjek);
			$this->email->message($isi);	
			
			$this->email->send();
			
			echo "sukses";
		}
		
}

function Welcome()

{

parrent::controllers();



//Menginisialisasi/mengaktifkan class testing

//yang sudah terdapat di dalam framework CodeIgniter

$this->load->library('unit_test');

//Memanggil fungsi Teks

$this->Test();
echo $this->unit->report();
}


//Memanggil fungsi Teks


function Test(){

//tes yang diinginkan

//dapat juga berupa pemanggilan fungsi

$test = simpan_hubungi;

//nilai yang diharapkan

$expected_result = true;

//nama tes

$test_name = 'Adds one plus one';

//melakukan testing sekaligus menampilkan hasilnya

echo $this->unit->run($test, $expected_result, $test_name);


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
}

?>
