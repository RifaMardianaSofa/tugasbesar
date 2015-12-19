<script type="text/javascript">
$(document).ready(function(){
	$("#isbn").focus();
	
});
</script>
<div class="bootstrap-widget-header">
<i class="icon-home icon-white"></i><h3><?php echo $judul;?></h3>
</div>
<div class="bootstrap-widget-content">
<!-- awal form -->
<form name="my-form" id="my-form" action="<?php echo site_url(); ?>/administrator/artikel/simpan" method="post" enctype="multipart/form-data">
<input type="hidden" name="id" id="id" value="<?php echo $id;?>" />
    <div class="control-group">
    <label class="control-label" for="kategori">ISBN</label>
    <div class="controls">
      <input type="text" id="isbn" name="isbn" class="span3" value="<?php echo $isbn;?>">
    </div>
  </div>
	<div class="control-group">
    <label class="control-label" for="kategori">Judul</label>
    <div class="controls">
      <input type="text" id="judul" name="judul" class="span6" value="<?php echo $judul_buku;?>">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="kategori">Pengarang</label>
    <div class="controls">
      <input type="text" id="pengarang" name="pengarang" class="span6" value="<?php echo $pengarang;?>">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="kategori">Penerbit</label>
    <div class="controls">
      <input type="text" id="penerbit" name="penerbit" class="span6" value="<?php echo $penerbit;?>">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="kategori">Tahun</label>
    <div class="controls">
      <input type="text" id="tahun" name="tahun" class="span2" value="<?php echo $tahun;?>">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="kategori">Cetakan</label>
    <div class="controls">
      <input type="text" id="edisi" name="edisi" class="span1" value="<?php echo $edisi;?>">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="kategori">Dokumen</label>
    <?php 
	if(!empty($gambar)){
	?>
    Nama File : <?php echo $gambar;?>
    <?php } ?>
    <div class="controls">
      <input type="file" name="gambar" id="gambar" />
    </div>
  </div>
  <div class="control-group">
  <div class="controls">
    <button type="submit" name="simpan" class="btn btn-success btn-small"><i class="icon-ok-circle"></i> Simpan</button>
    <a href="<?php echo base_url();?>index.php/administrator/artikel" class="btn btn-info btn-small"><i class="icon-hand-left"></i> Kembali</a>
	</div>
    </div>
</form>

<!-- akhir form -->
</div>
