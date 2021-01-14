<section class="content">
           
			<div class="box box-primary">
				<div class="box-header with-border">
					<h2 class="box-title">Laporan Permohononan Keluar</h2>
					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
					</div>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
				<form action="<?= base_url('laporan/cetak'); ?>" method="post" enctype="multipart/form-data">
                 	 <label for="inputEmail3" class="col-sm-1 control-label">Dari Tanggal</label>
                  		<div class="col-sm-3">
                    		<input type="date" class="form-control" id="dateAwal" name="dateAwal" required>
				  		</div>
				
					

				
                 	 <label for="inputEmail3" class="col-sm-1 control-label">Sampai Tanggal</label>
                  		<div class="col-sm-3">
                    		<input type="date" class="form-control" id="dateSelesai" name="dateSelesai" required>
						  </div>

						  
					
</div>
						  
						  <!-- /.box-body -->
						  <div class="box-footer">
                		<button type="submit" class="btn btn-info pull-right"> <i class="fa fa-print"></i> Print Laporan</button>
              			</div>
						  

						  </form>
					
					</div>

						
				</div>
			</div>
</section>
