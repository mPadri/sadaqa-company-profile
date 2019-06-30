<?php 
// notifikasi
    if($this->session->flashdata('sukses'))
    {
      echo ('<div class="alert alert-success">');
      echo $this->session->flashdata('sukses');
      echo ('</div>');
    }
// erorr warning
echo  validation_errors ( '<div class = "error alert alert-warning">','</div>');
// error upload
if(isset($error_upload)){
	echo '<div class = "error alert alert-warning">'.$error_upload.'</div>';
}
$attribut = '';
echo form_open_multipart(base_url('admin/konfigurasi'),$attribut);
 ?>
	<input type="hidden" name="id_konfigurasi" value="<?php echo $konfigurasi->id_konfigurasi ?>">
	<input type="hidden" name="id_user" value="<?php echo $this->session->userdata('id_user'); ?>">
	<div class="col-md-6">
		<div class="form-group">
			<label >Nama Perusahaan </label>
			<input type="text" name="nama_web" class="form-control" placeholder="Nama Web" value="<?php echo $konfigurasi->nama_web ?>">
		</div>
	</div>

	<div class="col-md-6">
		<div class="form-group">
			<label >Email </label>
			<input type="email" name="email" class="form-control" placeholder="Email Perusahaan" value="<?php echo $konfigurasi->email ?>">
		</div>
	</div>

	<div class="col-md-6">
		<div class="form-group">
			<label >Website </label>
			<input type="url" name="website" class="form-control" placeholder="Website Perusahaan" value="<?php echo $konfigurasi->website ?>">
		</div>
	</div>

	<div class="col-md-6">
		<div class="form-group">
			<label >Telepon </label>
			<input type="text" name="telepon" class="form-control" placeholder="Telepon Perusahaan" value="<?php echo $konfigurasi->telepon ?>">
		</div>
	</div>

		<div class="col-md-6">
		<div class="form-group">
			<label >Alamat </label>
			<textarea name="alamat" class="form-control" placeholder="Alamat"><?php echo $konfigurasi->alamat ?></textarea>
		</div>
	</div>

	<div class="col-md-6">
		<div class="form-group">
			<label >Deskripsi </label>
			<textarea name="deskripsi" class="form-control" placeholder="Deskripsi"><?php echo $konfigurasi->deskripsi ?></textarea>
		</div>
	</div>

	<div class="col-md-6">
		<div class="form-group">
			<label >Facebook URL </label>
			<input type="url" name="facebook" class="form-control" placeholder="Facebook" value="<?php echo $konfigurasi->facebook ?>">
		</div>
	</div>

	<div class="col-md-6">
		<div class="form-group">
			<label >Instagram URL </label>
			<input type="url" name="instagram" class="form-control" placeholder="Instagram" value="<?php echo $konfigurasi->instagram ?>">
		</div>
	</div>

	<div class="col-md-6">
		<div class="form-group">
			<label >Google Map </label>
			<textarea name="map" class="form-control" placeholder="Google Map"><?php echo $konfigurasi->map ?></textarea>
		</div>
	</div>

	<div class="col-md-6">
		<div class="form-group">
			<button type="submit" name="submit" class="btn btn-success"><i class="fa fa-save"> Simpan Konfigurasi </i></button>
		</div>
	</div>

 <?php echo form_close(); ?>