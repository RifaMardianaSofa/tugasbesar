<script type="text/javascript">
$(document).ready(function(){
	$("#balas").focus();
	
	
	$("#simpan").click(function(){
		var nama 	= $("#nama").val();
		
		var string = $("#my-form").serialize();
		
		//alert(string);
		
		if(nama.length==0){
			$('.bottom-right').notify({
			  message: {text: 'Maaf, Nama Penerima tidak boleh kosong'},type:'info'
			}).show();
			$("#nama").focus();
			return false();
		}
		
		$.ajax({ 
			type	: 'POST',
		   url      :'<?php echo site_url(); ?>/administrator/hubungi/simpan', 
		   data     : string,
		   success  : function (data){
			  /*
			  $('.bottom-right').notify({
				  message: {text:data},type:'info'
				}).show();
				*/
				alert(data);
		   }
		});

		return false();		
	});
});
</script>
<div class="bootstrap-widget-header">
<i class="icon-home icon-white"></i><h3><?php echo $judul;?></h3>
</div>
<div class="bootstrap-widget-content">
<!-- awal form -->
<form name="my-form" id="my-form" >
<input type="hidden" name="id" id="id" value="<?php echo $id;?>" />
  <div class="control-group">
    <label class="control-label" for="kategori">Nama</label>
    <div class="controls">
      <input type="text" id="nama" name="nama" class="span5"  value="<?php echo $nama;?>" readonly="readonly">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="kategori">Email</label>
    <div class="controls">
      <input type="text" id="email" name="email" class="span5"  value="<?php echo $email;?>" readonly="readonly">
    </div>
  </div>
   <div class="control-group">
    <label class="control-label" for="kategori">Subjek</label>
    <div class="controls">
      <input type="text" id="subjek" name="subjek" class="span5"  value="<?php echo $subjek;?>" readonly="readonly">
    </div>
  </div>
   <div class="control-group">
    <label class="control-label" for="kategori">Pesan</label>
    <div class="controls">
      <textarea name="pesan" id="pesan"><?php echo $pesan;?></textarea>
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="kategori">Balas</label>
    <div class="controls">
    	<!--
      <textarea name="balas" id="balas"></textarea>
      -->
      <input type="text" name="balas" id="balas" class="span6" value="<?php echo $pesan_balas;?>" />
    </div>
  </div>
  <div class="control-group">
    <div class="controls">
      <button type="button" id="simpan" name="simpan" class="btn btn-success btn-small"><i class="icon-envelope"></i> Kirim</button>
    <a href="<?php echo base_url();?>index.php/administrator/hubungi" class="btn btn-info btn-small"><i class="icon-hand-left"></i> Kembali</a>
    </div>
  </div>
</form>

<!-- akhir form -->
</div>
