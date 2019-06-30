<?php 
// erorr warning
echo  validation_errors ( '<span class = "error">' , '</ span>' );
$attribut = 'class="box box-success"';
echo form_open(base_url('admin/user/edit/'.$user->id_user),$attribut);
 ?>
<div class="row">
	<div class="col-md-6">
		<div class="form-group">
			<label for="nama">Nama :</label>
			<input type="text" name="nama" id="nama" class="form-control" placeholder="Nama Lengkap" value="<?php echo $user->nama ?>" required>
		</div>
		<div class="form-group">
			<label for="email">Email :</label>
			<input type="text" name="email" id="email" class="form-control" placeholder="Email" value="<?php $user->email ?>" required>
		</div>

		<div class="form-group">
			<label>Level Hak Akses :</label>
			<input type="text" name="akses_level" class="form-control" value="Admin" readonly="readonly">
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<label for="username">Username :</label>
			<input type="text" name="username" id="username" class="form-control" placeholder="Username" value="<?php echo $user->username ?>" readonly>
		</div>
		<div class="form-group">
			<label for="password">Password :</label>
			<input type="password" name="password" id="password" class="form-control" placeholder="Password" value="<?php echo set_value('password') ?>" required>
		</div>
		<div class="form-group">
			<button type="submit" name="submit" class="btn btn-success btn-sm" value="simpan">Simpan</button>
			<button type="reset" name="reset" class="btn btn-default btn-sm" value="reset">Reset</button>
		</div>
	</div>
</div>
 <?php echo form_close(); ?>


