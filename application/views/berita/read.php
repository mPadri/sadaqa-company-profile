<!--halaman berita  -->
    <div class="container" style="margin-top: 50px;">
      <div class="row">
        <div class="col-md-3 list_berita">
        <h3 id="news" class="page-scroll">Berita</h3>
          <tr>
            <?php foreach ($listing as $listing) { ?>
            <li><a href=" <?php echo base_url('berita/read/'.$listing->slug_berita) ?> "><?php echo $listing->judul_berita ?></a></li>       
            <?php } ?>
          </tr>
        </div>
        <div class="col-md-8">
          <h1><?php echo $title; ?></h1>
          <p class="glyphicon glyphicon-calendar"> <i><?php echo $berita->tanggal_post ?></i></p>
          <div class="isi">
            <img src="<?php echo base_url('assets/upload/img/thumbs/'.$berita->gambar) ?>" alt="" width="300">
               <p><?php echo $berita->isi_berita ?></p>
          </div>
        </div>
      </div>
      