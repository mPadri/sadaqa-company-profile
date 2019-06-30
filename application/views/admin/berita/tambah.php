<?php 
// erorr warning
echo  validation_errors ( '<div class = "error alert alert-warning">','</div>');
// error upload
if(isset($error_upload)){
	echo '<div class = "error alert alert-warning">'.$error_upload.'</div>';
}
$attribut = '';
echo form_open_multipart(base_url('admin/berita/tambah'),$attribut);
 ?>
	<div class="col-md-8">
		<div class="form-group form-group-md">
			<label>Judul Berita</label>
			<input type="text" name="judul_berita" class="form-control" placeholder="Judul Berita" value="<?php echo set_value('judul_berita') ?>" required>
		</div>
	</div>

	<div class="col-md-4">
		<div class="form-group form-group-md">
			<label>Status Berita</label>
			<select name="status_berita" class="form-control">
				<option value="Publish">Publish</option>
				<option value="Draft">Draft</option>
			</select>
		</div>
	</div>

	<div class="col-md-4">
		<div class="form-group form-group-md">
			<label>Jenis Berita</label>
			<select name="jenis_berita" class="form-control">
				<option value="Berita">Berita</option>
				<option value="Profil">Profil</option>
			</select>
		</div>
	</div>

	<div class="col-md-4 offset-4">
		<div class="form-group form-group-md">
			<label>Upload Gambar</label>
			<input type="file" name="gambar" class="form-control" required="required">
		</div>
	</div>

	<div class="col-md-12">
		<div class="form-group form-group-md">
			<label>Isi Berita</label>
			<textarea name="isi_berita" class="form-control tinymce" placeholder="Isi Berita"><?php echo set_value('isi_berita') ?></textarea>
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


