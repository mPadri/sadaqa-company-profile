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
  <a href="<?php echo base_url('admin/galeri/tambah') ?>" title="Tambah Galeri Baru" class="btn btn-info">
    <i class="fa fa-plus">Tambah Baru</i>
  </a>
</p>

<table id="example1" class="table table-bordered table-striped">
  <thead>
    <tr>
        <th width="5%">No</th>
        <th>Gambar</th>
        <th>Judul Gambar</th>
        <th>Posisi</th>
        <th>Penulis</th>
        <th>Tanggal</th>
        <th width="20%">Aksi</th>
    </tr>
  </thead>
  <tbody>

    <?php $i=1; foreach ($galeri as $galeri) :?>
    <tr>
        <td><?php echo $i; ?></td>
        <td><img src="<?php echo base_url('assets/upload/img/thumbs/'.$galeri->gambar) ?>" width="60" alt="gambar" class="img img-thumbnail"></td>
        <td><?php echo $galeri->judul_galeri ?></td>
        <td><?php echo $galeri->posisi_galeri ?></td>
        <td><?php echo $galeri->nama ?></td>
        <td><?php echo $galeri->tanggal_post ?></td>
        <td style="text-align: center;">
            <a href="<?php echo base_url('admin/galeri/edit/'.$galeri->id_galeri) ?>" title="Edit galeri" class="btn btn-warning btn-xs"><i class="fa fa-edit"> Edit </i>
            </a>
           
            <?php include('delete.php'); ?>
        
        </td>
    </tr>
    <?php $i++; ?>
    <?php endforeach ?>
    </tbody>
  </table>