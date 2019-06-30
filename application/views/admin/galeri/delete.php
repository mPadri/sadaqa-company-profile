<button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal-danger<?php echo $galeri->id_galeri ?>">
	<i class="fa fa-trash"></i> Hapus
</button>

<div class="modal modal-danger fade" id="modal-danger<?php echo $galeri->id_galeri ?>">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title">Hapus Data Galeri</h4>
			</div>
			
			<div class="modal-body">
				<p>Apakah anda yakin ?</p>
			</div>
			
			<div class="modal-footer">
				<button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Tidak</button>
				<a href="<?php echo base_url('admin/galeri/delete/'.$galeri->id_galeri) ?>" class="btn btn-outline pull-right"><i class="fa fa-trash-o"></i> Ya </a>
			</div>
		</div>
	</div>
</div>