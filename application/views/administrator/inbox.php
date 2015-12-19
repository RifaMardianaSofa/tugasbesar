<script type="text/javascript">

function editData(ID){
var string = "id="+ID;
//alert(ID);
	$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url(); ?>/home/balas_inbox",
			data	: string,
			cache	: true,
			success	: function(data){
				alert(data);
			}
	});
}

</script>
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
<i class="icon-download-alt icon-white"></i><h3><?php echo $judul;?></h3>
</div>
<div class="bootstrap-widget-content">
<div class="pull-left">
<a href="<?php echo base_url();?>index.php/home/inbox" class="btn btn-info btn-small"><i class="icon-refresh icon-white"></i> Refresh</a>
</div>
<div class="pull-right">
<form name="form-cari" method="post" action="<?php echo base_url();?>index.php/home/cari_inbox" class="form-horizontal">
<div class="control-group">
  <label class="control-label" for="inputIcon">Pencarian</label>
  <div class="controls">
    <div class="input-prepend">
      <span class="add-on"><i class="icon-search"></i></span>
      <input class="span3" id="inputIcon" type="text" name="txt_cari">
    </div>
  </div>
</div>
</form>
</div>
<table class="table table-condensed table-hover table-bordered table-striped">
<thead>
	<tr>
    	<th class="span1">No</th>
        <th class="span4">Pengirim</th>
        <th>Pesan</th>
        <th class="span2">Aksi</th>
	</tr>
</thead>            
<tbody>
<?php
$no=1+$tot;
foreach($data->result() as $t){
?>
	<tr>
    	<td><center><?php echo $no;?></center></td>
        <td><center><?php echo $t->SenderNumber;?></center></td>
        <td><?php echo $t->TextDecoded;?></td>
        <td><center>
        <div class="btn-group" data-toggle="buttons-checkbox">
          <a href="javascript:editData('<?php echo $t->SenderNumber;?>')" class="btn btn-info btn-mini"><i class="icon-repeat"></i> Balas</a>
          <a href="<?php echo base_url();?>index.php/home/hapus_inbox/<?php echo $t->ID;?>" class="btn btn-success btn-mini" onClick="return confirm('Anda yakin ingin menghapus data ini?')"><i class="icon-trash"></i> Hapus</a>
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
</div>
