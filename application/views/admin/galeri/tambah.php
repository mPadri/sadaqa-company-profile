<?php 
// erorr warning
echo  validation_errors ( '<div class = "error alert alert-warning">','</div>');
// error upload
if(isset($error_upload)){
	echo '<div class = "error alert alert-warning">'.$error_upload.'</div>';
}
$attribut = '';
echo form_open_multipart(base_url('admin/galeri/tambah'),$attribut);
 ?>
	<div class="col-md-8">
		<div class="form-group form-group-md">
			<label>Judul Galeri</label>
			<input type="text" name="judul_galeri" class="form-control" placeholder="Judul Galeri" value="<?php echo set_value('judul_galeri') ?>" required>
		</div>
	</div>

	<div class="col-md-4">
		<div class="form-group form-group-md">
			<label>Posisi Galeri</label>
			<select name="posisi_galeri" class="form-control">
				<option value="Galeri">Galeri</option>
				<option value="Homepage">Homepage Slider</option>
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
			<label>Isi Galeri</label>
			<textarea name="isi_galeri" class="form-control tinymce" placeholder="Isi Galeri"><?php echo set_value('isi_galeri') ?></textarea>
		</div>
	</div>
	
	<div class="col-md-12">
		<div class="form-group text-right">
			<button type="submit" name="submit" class="btn btn-success btn-sm">
				<i class="fa fa-save"> Simpan Galeri </i>
			</button>
			<button type="submit" name="submit" class="btn btn-default btn-sm">
				<i class="fa fa-times"> Reset </i>
			</button>
		</div>
	</div>

<div class="clear-fix"></div>
 <?php echo form_close(); ?>


