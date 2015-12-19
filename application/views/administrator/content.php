<style type="text/css">
.table tr th {
	text-align:center;
	font-weight:bold;
}
.text-center {
	text-align:center;
}
</style>
<div class="bootstrap-widget-header">
<i class=" icon-white"></i><h3>Home</h3>
</div>
<div class="bootstrap-widget-content">
<h4>Selamat Datang di Halaman Administrator Webiste <?php echo $this->config->item('nama_program');?>.</h4>
<br />
    <div class="row span11" >
    	Daftar Hubungi Kami belum dibalas
        <table class="table table-bordered table-striped table-hover">
        <thead>
          <tr>
            <th class="span1">No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Subjek</th>
            <th>Tanggal</th>
            <th>Balas</th>
          </tr>
        </thead>
        <tbody>
        <?php
		$data = $this->app_model->hubungi_kami();
		$no = 1;
		foreach($data->result() as $dt){
			$tgl = $this->app_model->tgl_indo($dt->tanggal);
		?>
          <tr>
            <td ><center><?php echo $no;?></center></td>
            <td><?php echo $dt->nama;?></td>
            <td><?php echo $dt->email;?></td>
            <td><?php echo $dt->subjek;?></td>
            <td><center><?php echo $tgl;?></center></td>
            <td><center>
        <div class="btn-group" data-toggle="buttons-checkbox">
          <a href="<?php echo base_url();?>index.php/administrator/hubungi/edit/<?php echo $dt->id_hubungi;?>" class="btn btn-info btn-mini"><i class=""></i> Balas</a>
          <a href="<?php echo base_url();?>index.php/administrator/hubungi/hapus/<?php echo $dt->id_hubungi;?>" class="btn btn-success btn-mini" onClick="return confirm('Anda yakin ingin menghapus data ini?')"><i class=""></i> Hapus</a>
        </div>
        </center></td>
          </tr>
		<?php 
		$no=$no+1;
		} ?>
        </tbody>
      </table>
    </div>
</div>