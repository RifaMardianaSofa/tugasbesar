<div class="grid fluid">
    <div class="row">
	<center>
        <div class="span8">
		</center>
            <div class="carousel" id="carousel1">
				<div class="slide">
					<center>
                    <img src="<?php echo base_url();?>assets/images/logo.png" class="cover1" />
					</center>
                </div>
               <!--  <div class="slide">
                    <img src="<?php echo base_url();?>assets/images/e.jpg" class="cover1" />
                </div>
                <div class="slide">
                    <img src="<?php echo base_url();?>assets/images/c.jpg" class="cover1" />
                </div>
                <div class="slide">
                    <img src="<?php echo base_url();?>assets/images/b.jpg" class="cover1"/>
                </div> -->
            </div>
			 <script>
                $(function(){
                    $("#carousel1").carousel({
                        height: 300,
						auto:true,
						period: 2000,
						duration: 1000,
						// effect: 'fade',
						markers: {
							show: true,
							type: 'square',
							position: 'bottom-right'
						}
                    });
                })
            </script>
        </div>
        
        <!--<div class="span4">
            <div class="span4"><div class="calendar small" data-role="calendar" ></div></div>
        </div-->
    </div>
</div>