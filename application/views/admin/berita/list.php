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
  <a href="<?php echo base_url('admin/berita/tambah') ?>" title="Tambah Berita Baru" class="btn btn-info">
    <i class="fa fa-plus">Tambah Baru</i>
  </a>
</p>

<table id="example1" class="table table-bordered table-striped">
  <thead>
    <tr>
        <th width="5%">No</th>
        <th>Gambar</th>
        <th>Judul</th>
        <th>Jenis - Status</th>
        <th>Penulis</th>
        <th>Tanggal</th>
        <th width="20%">Aksi</th>
    </tr>
  </thead>
  <tbody>

    <?php $i=1; foreach ($berita as $berita) :?>
    <tr>
        <td><?php echo $i; ?></td>
        <td><img src="<?php echo base_url('assets/upload/img/thumbs/'.$berita->gambar) ?>" width="60" alt="gambar" class="img img-thumbnail"></td>
        <td><?php echo $berita->judul_berita ?></td>
        <td><?php echo $berita->jenis_berita ?> - <?php echo $berita->status_berita ?></td>
        <td><?php echo $berita->nama ?></td>
        <td><?php echo $berita->tanggal_post ?></td>
        <td style="text-align: center;">
            <a href="<?php echo base_url('admin/berita/edit/'.$berita->id_berita) ?>" title="Edit" class="btn btn-warning btn-xs"><i class="fa fa-edit"> Edit </i>
            </a>
           
            <?php include('delete.php'); ?>
        
        </td>
    </tr>
    <?php $i++; ?>
    <?php endforeach ?>
    </tbody>
  </table>