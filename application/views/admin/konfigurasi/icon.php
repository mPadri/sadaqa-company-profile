<?php 
// notifikasi
    if($this->session->flashdata('sukses'))
    {
      echo ('<div class="alert alert-success">');
      echo $this->session->flashdata('sukses');
      echo ('</div>');
    }
// error upload
    if(isset($error))
    {
      echo ('<div class="alert alert-success">');
      echo $error;
      echo ('</div>');
    }
// erorr warning
echo  validation_errors ( '<div class = "error alert alert-warning">','</div>');
// error upload
if(isset($error_upload)){
	echo '<div class = "error alert alert-warning">'.$error_upload.'</div>';
}
$attribut = '';
echo form_open_multipart(base_url('admin/konfigurasi/icon'),$attribut);
 ?>
	<input type="hidden" name="id_konfigurasi" value="<?php echo $konfigurasi->id_konfigurasi ?>">
	<input type="hidden" name="id_user" value="<?php echo $this->session->userdata('id_user'); ?>">
	<div class="col-md-6">
		<div class="form-group">
			<label >Icon Perusahaan </label>
			<input type="file" name="icon" class="form-control" required="required">
		</div>
	</div>

	<div class="col-md-6">
		<div class="form-group">
			<button type="submit" name="submit" class="btn btn-success"><i class="fa fa-save"> Simpan Konfigurasi </i></button>
		</div>
	</div>

	<div class="col-md-6">
		<?php if( $konfigurasi->icon != "" ) { ?>
			<img src="<?php echo base_url('assets/upload/img/'.$konfigurasi->icon )  ?>" alt="<?php echo $konfigurasi->nama_web ?>" class="img img-responsive img-thumbnail">
		<?php }else{ ?>
			<p class="alert alert-danger text-center">Belum ada Icon !</p>
		<?php } ?>
	</div>

 <?php echo form_close(); ?>