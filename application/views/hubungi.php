<script type="text/javascript">
$(document).ready(function(){
	$("#nama").focus();

	$('#simpan').click(function () {
	
		var nama = $("#nama").val();
		var email = $("#email").val();
		var subjek = $("#subjek").val();
		var captcha = $("#captcha").val();

		
		var string = $("#my-form").serialize();
		/*
		var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
		if(!emailReg.test(email)) {
		jQuery("span#email_error2").show();
		jQuery("input#email").focus();
		return false;
		}
		*/
		//alert(string);
		if(nama.length==0){
		  alert('Maaf, Nama tidak boleh kosong');
		  $("#nama").focus();
		  return false();
		}
		if(email.length==0){
		  alert('Maaf, Email tidak boleh kosong');
		  $("#email").focus();
		  return false();
		}
		if(subjek.length==0){
		  alert('Maaf, subjek tidak boleh kosong');
		  $("#subjek").focus();
		  return false();
		}
		if(captcha.length==0){
		  alert('Maaf, captcha tidak boleh kosong');
		  $("#captcha").focus();
		  return false();
		}
		$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url(); ?>/home/simpan_hubungi",
			data	: string,
			cache	: false,
			success	: function(data){
				if(data=='sukses'){
					  alert('Terima Kasih, Anda telah menghubungi kami. Tunggu email Balasan dari Administrator');
					  window.location.assign('<?php echo base_url();?>index.php/home/hubungi_kami');
				}else{
					alert(data);
				}
			}
		});
   });
});
</script>
<nav class="breadcrumbs small">
    <ul>
        <li><a href="<?php echo base_url();?>"><i class="icon-home"></i> Home</a></li>
        <li class="active"><a href="#">Hubungi Kami</a></li>
    </ul>
</nav>
<form id="my-form" class="form-horizontal">
    <fieldset>
        <legend>Hubungi Kami</legend>
        <label>Nama</label>
        <div class="input-control text" data-role="input-control">
            <input type="text" placeholder="type nama" name="nama" id="nama">
            <button class="btn-clear" tabindex="-1"></button>
        </div>
        <label>Email</label>
        <div class="input-control text" data-role="input-control">
            <input type="email" placeholder="type email" name="email" id="email">
            <button class="btn-clear" tabindex="-1"></button>
        </div>
        <label>Subjek</label>
        <div class="input-control text" data-role="input-control">
            <input type="text" placeholder="type subjek" name="subjek" id="subjek">
            <button class="btn-clear" tabindex="-1"></button>
        </div>
        <label>Pesan</label>
        <div class="input-control textarea" data-role="input-control">
            <textarea data-transform="input-control" name="pesan" id="pesan"></textarea>
        </div>
		<!-- <label>Captcha</label>
		      <?php echo $gbr_captcha;?>
        <label>Masukan Captcha diatas</label>
        <div class="input-control text" data-role="input-control">
            <input type="text"  name="captcha" id="captcha">
            <button class="btn-clear" tabindex="-1"></button>
        </div> -->
        <button type="button" name="simpan" id="simpan" class="btn btn-inverse"><i class="icon-floppy"></i> Kirim</button>
      
      <button type="reset" name="reset" id="reset" class="btn btn-inverse"><i class="icon-cycle"></i> Reset</button>

        <div style="margin-top: 20px">
        </div>
		
    </fieldset>
</form>