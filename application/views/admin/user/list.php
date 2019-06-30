<?php 
  // notifikasi
    if($this->session->flashdata('sukses'))
    {
      echo ('<div class="alert alert-success">');
      echo $this->session->flashdata('sukses');
      echo ('</div>');
    }
 ?>
<p>
  <a href="<?php echo base_url('admin/user/tambah') ?>" title="Tambah User Baru" class="btn btn-info">
    <i class="fa fa-plus">Tambah Baru</i>
  </a>
</p>
<table id="example1" class="table table-bordered table-striped">
  <thead>
    <tr>
        <th width="5%">No</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Username - Level</th>
        <th width="20%">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php $i=1; foreach ($user as $users) :?>
    <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $users->nama ?></td>
        <td><?php echo $users->email ?></td>
        <td><?php echo $users->username ?> - <?php echo $users->akses_level ?></td>
        <td style="text-align: center;">
            <a href="<?php echo base_url('admin/user/edit/'.$users->id_user) ?>" title="Edit" class="btn btn-warning btn-xs"><i class="fa fa-edit"> Edit </i>
            </a>     
            <?php include('delete.php'); ?>   
        </td>
    </tr>
    <?php $i++; ?>
    <?php endforeach ?>
    </tbody>
  </table>