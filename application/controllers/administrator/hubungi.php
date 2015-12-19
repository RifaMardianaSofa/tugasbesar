<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hubungi extends CI_Controller {

	public function index()
	{
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['judul'] = 'Hubungi Kami';
			
			$page	=$this->uri->segment(4);
			$limit	=10;
			if(!$page):
			$offset = 0;
			else:
			$offset = $page;
			endif;
			
			$d['tot'] = $offset;
			$tot_hal = $this->app_model->getAllData("hubungi");
			$config['base_url'] = site_url() . '/administrator/hubungi/index/';
			$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 4;
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Selanjutnya';
			$config['prev_link'] = 'Sebelumnya';
			$this->pagination->initialize($config);
			$d["paginator"] =$this->pagination->create_links();
			
			$d['data'] = $this->db->query("SELECT * FROM hubungi ORDER BY id_hubungi ASC limit ".$offset.",".$limit."");
			
			$d['content']= $this->load->view('administrator/hubungi/daftar',$d,true);
			$this->load->view('administrator/home',$d);
		}else{
			redirect('administrator/login/logout','refresh');
		}
	}
	
	public function tambah()
	{
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['judul'] = 'Tambah Kategori';
			
			//$d['id'] ='';
			//$d['nama_kategori'] ='';
			//$d['content']= $this->load->view('administrator/kategori/form',$d,true);
			$this->load->view('administrator/home',$d);
		}else{
			redirect('administrator/login/logout','refresh');
		}
	}
	
	public function edit()
	{
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['judul'] = 'Kirim Balasan';
			
			$id = $this->uri->segment(4);
			$data = $this->app_model->manualQuery("SELECT * FROM hubungi WHERE id_hubungi='$id'");
			foreach($data->result() as $t){
				$d['id'] = $t->id_hubungi;
				$d['nama'] = $t->nama;
				$d['email'] = $t->email;
				$d['subjek'] = $t->subjek;
				$d['pesan'] = $t->pesan;
				$d['pesan_balas'] = $t->pesan_balas;
			}
			
			$d['content']= $this->load->view('administrator/hubungi/form',$d,true);
			$this->load->view('administrator/home',$d);
		}else{
			redirect('administrator/login/logout');
		}
	}
	
	public function simpan()
	{
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$id['id_hubungi'] = $this->input->post('id');
			
			$up['pesan_balas'] = $this->input->post('balas');
			$up['tanggal_balas'] = date('Y-m-d h:i:s');
			$up['balas'] = 'Y';
			
			$hasil = $this->app_model->getSelectedData("hubungi",$id);
			$row = $hasil->num_rows();
			if($row==1){
				$this->app_model->updateData("hubungi",$up,$id);
				
				/** variabel **/
				$email = $this->input->post('email');
				$nama = $this->input->post('nama');
				$subjek =  $this->input->post('subjek');
				$isi = $this->input->post('balas');
				
				$config = Array( 
			  'protocol' => 'smtp', 
			 'smtp_host' => 'ssl://smtp.googlemail.com', 
			  'smtp_port' => 465, 
			 'smtp_user' => 'deddy.rusdiansyah@gmail.com', 
			 'smtp_pass' => '', ); 
				
				/**config **/
				$this->email->from($email, $nama);
				$this->email->to('deddy.rusdiansyah@gmail.com'); 
				$this->email->cc('deddy.rusdiansyah@gmail.com'); 
				//$this->email->bcc('them@their-example.com'); 
				
				$this->email->subject($subjek);
				$this->email->message($isi);	
				
				$this->email->send();
				
				echo "Data Sukses diupdate !!";
			}
		}else{
			redirect('administrator/login/logout','refresh');
		}
	}
	
	public function hapus()
	{
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$id['id_hubungi'] = $this->uri->segment(4);
			$this->app_model->deleteData("hubungi",$id);
			redirect('administrator/hubungi/');
		}else{
			redirect('administrator/login/logout');
		}
	}
	
}

/* End of file index.php */
/* Location: ./application/controllers/index.php */