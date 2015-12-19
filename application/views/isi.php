			
			<table class="table striped hovered dataTable" id="dataTables-1">
                <thead>
                <tr>
                    <th class="span1 text-center">No</th>
					<th class="text-center">ISBN</th>
                    <th class="text-center">Judul</th>
                    <th class="text-center">Penulis</th>
                    <th class="text-center">Penerbit</th>
                    <th class="span2 text-center">Tahun</th>
					<th class="span1 text-center">Edisi</th>
					<th class="span1 text-center">Download</th>
                </tr>
                </thead>

                <tbody>
                </tbody>

                <!-- <tfoot>
                <tr>
                    <th class="span1 text-center">No</th>
					<th class="text-center">ISBN</th>
                    <th class="text-center">Judul</th>
                    <th class="text-center">Penulis</th>
                    <th class="text-center">Penerbit</th>
                    <th class="span2 text-center">Tahun</th>
					<th class="span1 text-center">Edisi</th>
					<th class="span2 text-center">Download</th>
                </tr>
                </tfoot> -->
            </table>
			
            <script>
                $(function(){
					
                    $('#dataTables-1').dataTable( {
                        "bProcessing": true,
                        "sAjaxSource": "<?php echo base_url();?>index.php/home/view_data",
                        "aoColumns": [
							{ "mData": "no" },
							{ "mData": "isbn" },
                            { "mData": "judul" },
                            { "mData": "pengarang" },
                            { "mData": "penerbit" },
                            { "mData": "tahun" },
							{ "mData": "edisi" },
							{ "mData": "download" }
                        ]
                    } );
					
					
                });
            </script>
			
			