<style type="text/css">
.table tr th {
	text-align:center;
	background: -moz-linear-gradient(top, #FAFAFA 0%, #E9E9E9 100%);
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #FAFAFA), color-stop(100%, #E9E9E9));background: -webkit-linear-gradient(top, #FAFAFA 0%, #E9E9E9 100%);
	background: -o-linear-gradient(top, #FAFAFA 0%, #E9E9E9 100%);
	background: -ms-linear-gradient(top, #FAFAFA 0%, #E9E9E9 100%); 
	background: linear-gradient(top, #FAFAFA 0%, #E9E9E9 100%);
	filter: progid:DXImageTransform.Microsoft.gradient(startColorstr = '#FAFAFA', endColorstr = '#E9E9E9');-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr='#FAFAFA', endColorstr='#E9E9E9')";
	border: 1px solid #D5D5D5;
}
</style>
<div class="bootstrap-widget-header">
<i class="icon-home icon-white"></i><h3><?php echo $judul;?></h3>
</div>
<div class="bootstrap-widget-content">
<div class="container">
<div class="pull-left">

</div>
</div>
<section>
<table class="table table-condensed table-hover table-bordered table-striped">
<thead>
	<tr>
    	<th class="span1">No</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Subjek</th>
        <th>Tanggal</th>
        <th>Balas</th>
        <th>Aksi</th>
	</tr>
</thead>            
<tbody>
<?php
$no=1+$tot;
foreach($data->result() as $t){
	$tgl = $this->app_model->tgl_indo($t->tanggal);
?>
	<tr>
    	<td width="10"><center><?php echo $no;?></center></td>
        <td><?php echo $t->nama;?></td>
        <td><?php echo $t->email;?></td>
        <td><?php echo $t->subjek;?></td>
        <td><center><?php echo $tgl;?></center></td>
        <td><center><?php echo $t->balas;?></center></td>
        <td><center>
        <div class="btn-group" data-toggle="buttons-checkbox">
          <a href="<?php echo base_url();?>index.php/administrator/hubungi/edit/<?php echo $t->id_hubungi;?>" class="btn btn-info btn-mini"><i class="icon-pencil"></i> Edit</a>
          <a href="<?php echo base_url();?>index.php/administrator/hubungi/hapus/<?php echo $t->id_hubungi;?>" class="btn btn-success btn-mini" onClick="return confirm('Anda yakin ingin menghapus data ini?')"><i class="icon-trash"></i> Hapus</a>
        </div>
        </center></td>
	</tr>            
<?php 
	$no++;
} ?>
</tbody>
</table>
<div class="pagination pagination-centered">
    <ul>
    <?php
    echo $paginator;
    ?>
    </ul>
</div>
</section>
</div>
