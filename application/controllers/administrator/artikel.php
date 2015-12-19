<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Artikel extends CI_Controller {

	public function index()
	{
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['judul'] = 'Buku';
			
			$page=$this->uri->segment(4);
			$limit=10;
			if(!$page):
			$offset = 0;
			else:
			$offset = $page;
			endif;
			
			$d['tot'] = $offset;
			$tot_hal = $this->app_model->getAllData("tb_buku");
			$config['base_url'] = site_url() . '/administrator/artikel/index/';
			$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 4;
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Selanjutnya';
			$config['prev_link'] = 'Sebelumnya';
			$this->pagination->initialize($config);
			$d["paginator"] =$this->pagination->create_links();
			
			$d['data'] = $this->db->query("SELECT * FROM tb_buku ORDER BY id DESC limit ".$offset.",".$limit."");
			
			$d['content']= $this->load->view('administrator/artikel/daftar',$d,true);
			$this->load->view('administrator/home',$d);
		}else{
			redirect('administrator/login/logout');
		}
	}
	
	public function tambah()
	{
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['judul'] = 'Tambah Buku';
			
			$d['id'] ='';
			$d['isbn'] ='';
			$d['judul_buku'] ='';
			$d['pengarang'] ='';
			$d['penerbit'] ='';
			$d['tahun'] ='';
			$d['edisi'] ='';
			
			$d['gambar'] ='';
			
			$d['content']= $this->load->view('administrator/artikel/form',$d,true);
			$this->load->view('administrator/home',$d);
		}else{
			redirect('administrator/login/logout');
		}
	}
	
	public function edit()
	{
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['judul'] = 'Edit Buku';
			
			$id = $this->uri->segment(4);
			$data = $this->app_model->manualQuery("SELECT * FROM tb_buku WHERE id='$id'");
			foreach($data->result() as $t){
				$d['id'] = $t->id;
				$d['isbn'] = $t->isbn;
				$d['judul_buku'] = $t->judul;
				$d['pengarang'] = $t->pengarang;
				$d['penerbit'] = $t->penerbit;
				$d['tahun'] = $t->tahun;
				$d['edisi'] = $t->edisi;
				$d['gambar'] = $t->gambar;
			}
			$d['content']= $this->load->view('administrator/artikel/form',$d,true);
			$this->load->view('administrator/home',$d);
		}else{
			redirect('administrator/login/logout');
		}
	}
	
	public function simpan()
	{
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			date_default_timezone_set('Asia/Jakarta');
			
			$status = "";
		   	$msg = "";
			
			//$file_element_name = $_FILES['gambar']['name'];//'gambar';
			
			$config['upload_path'] = './download/';
			$config['allowed_types'] = 'zip|rar|pdf|doc|ppt|pptx';
			$config['max_size'] = '100000000';
			/*
			$config['allowed_types'] = 'jpg|jpeg|png|jp2';
			$config['max_size'] = '2000';
			$config['max_width'] = '2400';
			$config['max_height'] = '2400';	
			*/
			$config['overwrite'] = TRUE;			
			$this->load->library('upload', $config);
			
			if(!empty($_FILES['gambar']['name'])){	
				//$msg = "Gambar Kosong <br>";
				if($this->upload->do_upload('gambar')){
					$aa = $this->upload->data();
			 		$ori = $aa['file_name'];
					$up['gambar'] = $ori;
					
					$msg = " upload sukses<br>";
				}else{
					$error = $this->upload->display_errors();
					echo  $error;
				}
			}else{
				$error = $this->upload->display_errors();
				echo  $error;
			}
			
			$hari = $this->app_model->hari_ini(date('w'));
			
			$id['id'] 	= $_POST['id'];
			$up['isbn'] 	= $_POST['isbn'];
			$up['judul'] 		= $_POST['judul'];
			$up['pengarang'] 	= $_POST['pengarang'];
			$up['penerbit'] 	= $_POST['penerbit'];
			$up['tahun'] 		= $_POST['tahun'];;
			$up['edisi'] 		= $_POST['edisi'];;
			$up['tgl_insert'] 		= date('Y-m-d h:i:s');
			$up['username'] 	= $this->session->userdata('username');
			
			$hasil = $this->app_model->getSelectedData("tb_buku",$id);
			$row = $hasil->num_rows();
			if($row==1){
				$this->app_model->updateData("tb_buku",$up,$id);
				$status = "Data Sukses diupdate !!";
				
			}else{
				$this->app_model->insertData("tb_buku",$up);
				$status = "Sukses";
		
			}
			
			
			//echo json_encode(array('status' => $status, 'msg' => $msg));
			redirect('administrator/artikel/','refresh');
		}else{
			redirect('administrator/login/logout');
		}
	}
	
	public function hapus()
	{
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$id['id'] = $this->uri->segment(4);
			$this->app_model->deleteData("tb_buku",$id);
			redirect('administrator/artikel');
		}else{
			redirect('administrator/login/logout');
		}
	}
	
}

/* End of file index.php */
/* Location: ./application/controllers/index.php */