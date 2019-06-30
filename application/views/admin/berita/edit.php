<?php 
// erorr warning
echo  validation_errors ( '<div class = "error alert alert-warning">','</div>');
// error upload
if(isset($error_upload)){
	echo '<div class = "error alert alert-warning">'.$error_upload.'</div>';
}
// form_open _multipart form untuk upload beserta file
echo form_open_multipart(base_url('admin/berita/edit/'.$berita->id_berita));
 ?>
	<div class="col-md-8">
		<div class="form-group form-group-md">
			<label>Judul Berita</label>
			<input type="text" name="judul_berita" class="form-control" placeholder="Judul Berita" value="<?php echo $berita->judul_berita ?>" required>
		</div>
	</div>

	<div class="col-md-4">
		<div class="form-group form-group-md">
			<label>Status Berita</label>
			<select name="status_berita" class="form-control">
				<option value="Publish">Publish</option>
				<option value="Draft" <?php if($berita->status_berita=="Draft"){ echo "selected"; } ?>>Draft</option>
			</select>
		</div>
	</div>

	<div class="col-md-4">
		<div class="form-group form-group-md">
			<label>Jenis Berita</label>
			<select name="jenis_berita" class="form-control">
				<option value="Berita">Berita</option>
				<option value="Profil" <?php if($berita->jenis_berita=="Profil"){ echo "selected"; } ?>>Profil</option>
			</select>
		</div>
	</div>

	<div class="col-md-4">
		<div class="form-group form-group-md">
			<label>Upload Gambar</label>
			<input type="file" name="gambar" class="form-control">
		</div>
	</div>

	<div class="col-md-12">
		<div class="form-group form-group-md">
			<label>Isi Berita</label>
			<textarea name="isi_berita" class="form-control tinymce" placeholder="Isi Berita"><?php echo $berita->isi_berita ?></textarea>
		</div>
	</div>
	
	<div class="col-md-12">
		<div class="form-group text-right">
			<button type="submit" name="submit" class="btn btn-success btn-sm">
				<i class="fa fa-save"> Simpan Berita </i>
			</button>
			<button type="submit" name="submit" class="btn btn-default btn-sm">
				<i class="fa fa-times"> Reset </i>
			</button>
		</div>
	</div>

<div class="clear-fix"></div>
 <?php echo form_close(); ?>


