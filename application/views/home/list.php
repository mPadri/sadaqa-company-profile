<!-- slider -->   
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
      <li data-target="#carousel-example-generic" data-slide-to="1"></li>
      <li data-target="#carousel-example-generic" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
    <!-- Wrapper for slides -->
    <?php $i=1; foreach ($slider as $slider) { ?> 
      <div class="item <?php if($i==1){ echo "active"; }?>">
        <img class="first-slide" src="<?php echo base_url('assets/upload/img/'.$slider->gambar) ?>" alt=" <?php echo $slider->judul_galeri ?> ">    
      </div>  
      <?php $i++; } ?>
    </div>
  </div>
  </header> 
<!-- halaman tentang -->
  <div class="container">  
      <div class="row">
        <div class="col-md-4">
          <h1 id="about" class="page-scroll" style="border-right: thick solid salmon;">TENTANG</h1>        
          <h1>SADAQA</h1>
        </div>
        <div class="col-md-8">
          <p> SADAQA bercita-cita menjadi inisiator lembaga kemanusiaan Internasional dengan memaaksimalkan sedekah sebagai gerakan utama dalam menghadirkan keadilan sosial bagi seluruh manusia.</p>
          <p>Tujuan SADAQA adalah untuk menjadikan budaya bersedekah sebagai kunci memuliakan diri sendiri dan orang lain. Juga untuk memaksimalkan potensi sedekah menjadi solusi persoalan umat. Semoga lahirnya SADAQA ini dapat membawa keberkahan bagi ummat dan bangsa seluruhnya.</p>
        </div> 
      </div>
<hr width="5%" style="border-color: lightblue; border-width: 3px;">
      <div class="row">
        <div class="col-md-3 col-sm-12" style="text-align: center !important;">
            <div class="maincontainer" >
              <div class="card">
                <div class="front">
                  <img class="img-circle" src="<?php echo base_url() ?>assets/template/img/s1.png" width="140" height="140">
                  <h2>Sinergy</h2>
                </div>
                <div class="back">
                  <h2><b>Sinergy</b></h2>
                  <p class="p_card">Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh.</p>
                </div>
              </div>
            </div>     
        </div><!-- /.col-md-4 -->   
        <div class="col-md-3 col-sm-12" style="text-align: center !important;">
          <div class="maincontainer">
              <div class="card">
                <div class="front">
                  <img class="img-circle" src="<?php echo base_url() ?>assets/template/img/s2.png" width="140" height="140">
                  <h2>Responsibility</h2>
                </div>
                <div class="back">
                  <h2><b>Responsibility</b></h2>
                  <p class="p_card">Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh.</p>
                </div>
              </div>
            </div> 
        </div><!-- /.col-md-4 -->       
        <div class="col-md-3 col-sm-12" style="text-align: center !important;">
          <div class="maincontainer">
              <div class="card">
                <div class="front">
                  <img class="img-circle" src="<?php echo base_url() ?>assets/template/img/s3.png" width="140" height="140">
                  <h2>Profesional</h2>
                </div>
                <div class="back">
                  <h2><b>Profesional</b></h2>
                  <p class="p_card">Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh.</p>
                </div>
              </div>
            </div> 
        </div><!-- /.col-md-4 -->
        <div class="col-md-3 col-sm-12" style="text-align: center !important;">
          <div class="maincontainer">
              <div class="card">
                <div class="front">
                  <img class="img-circle" src="<?php echo base_url() ?>assets/template/img/s4.png" width="140" height="140">
                  <h2>Contributif</h2>
                </div>
                <div class="back">
                  <h2><b>Contributif</b></h2>
                  <p class="p_card">Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh.</p>
                </div>
              </div>
            </div> 
        </div><!-- /.col-lg-4 --> 
      </div>
      <br><br><br>
<hr class="style">
    </div>
    <!--halaman berita  -->
    <div class="container">
      <div class="row">
        <div class="col-md-3 list_berita">
        <h3 id="news" class="page-scroll">Berita</h3>
          <tr>
            <?php foreach ($berita as $berita) { ?>
            <li><a href=" <?php echo base_url('berita/read/'.$berita->slug_berita) ?> "><?php echo $berita->judul_berita ?></a></li>          
            <?php } ?>
          </tr>
        </div>
        <div class="col-md-8">
          <h1><a href="<?php echo base_url('berita/read/'.$berita->slug_berita) ?>"><?php echo $berita->judul_berita ?></a></h1>
          <p class="glyphicon glyphicon-calendar"> <i><?php echo $berita->tanggal_post ?></i></p>
          <div class="isi">
            <img src="<?php echo base_url('assets/upload/img/thumbs/'.$berita->gambar) ?>" alt="" width="300">
               <p><?php echo character_limiter($berita->isi_berita,2000) ?> <a href="<?php echo base_url('berita/read/'.$berita->slug_berita) ?>">lanjutkan...</a></p>
          </div>
        </div>
      </div>
<hr class="style">
    </div><!-- /.container content-->
<!-- Galeri -->
<section class="gallery">
    <div class="container">
      <div class="col-md-12 galeri">
        <h2 id="galeri" class="page-scroll" style="text-align: center;">Galeri</h2>
        <hr width="5%" style="border-color: lightblue; border-width: 3px;">
      </div>
      <div class="row">
        <div class="paginasi col-md-12">
          <?php if(isset($paginasi)){ echo $paginasi; } ?>
        </div>
      </div>
      <div class="row img">    
        <?php $i=1; foreach ($galeri as $galeri) { ?>
          <div class="col-xs-4">
          <a href="">
            <img src="<?php echo base_url('assets/upload/img/'.$galeri->gambar) ?>" alt="" class="img-thumbnail">
          </a>
        </div>
       <?php $i++; } ?>      
      </div>
    </div>
  </section>
<hr class="style">
<!-- kontak -->
 <div class="container">
      <div class="row">
        <div class="col-md-6 col-sm-6">
          <h3 id="contact" class="page-scroll">Contact Us</h3>
            <p><?php echo $konfigurasi->deskripsi ?></p>
               <br><?php echo nl2br($konfigurasi->alamat) ?>
               <br><i class="fa fa-phone "> <?php echo $konfigurasi->telepon ?></i>
               <br><i class="fa fa-envelope "> <?php echo $konfigurasi->email ?></i>
               <br><i class="fa fa-globe "> <?php echo $konfigurasi->website ?></i>
               <br><br>
            <button class="btn-sm btn-info"><span class="fa fa-facebook"></span></button>
            <button class="btn-sm btn-success"><span class="fa fa-instagram"></span></button>
            <button class="btn-sm btn-danger"><span class="fa fa-envelope"></span></button>
        </div>
        <div class="col-md-6 col-sm-6 thumbnail frame">
        <div class="embed-responsive embed-responsive-4by3">
          <?php echo $konfigurasi->map ?>
          </div>
        </div>
      </div>
    </div>
    <!-- mitra -->
    <div class="container mitra">
      <div class="row">
        <div class="col-md-12">
          <h2 style="text-align: center;">MITRA</h2>
          <hr width="5%" style="border-color: lightblue;border-width: 3px;">
        </div>
      </div>
      <div class="row img">
        <div class="col-md-2">
          <img src="<?php echo base_url() ?>assets/template/img/hayat-yolu logo.png" alt="" class="img-thumbnail">
        </div>
        <div class="col-md-2">
          <img src="<?php echo base_url() ?>assets/template/img/arzaq.png" alt="" class="img-thumbnail">
        </div>
        <div class="col-md-4">
          <img src="<?php echo base_url() ?>assets/template/img/logo_iai.png" alt="" class="img-thumbnail">
        </div>
        <div class="col-md-2">
          <img src="<?php echo base_url() ?>assets/template/img/logo_burak.png" alt="" class="img-thumbnail">
        </div>
        <div class="col-md-2">
          <img src="<?php echo base_url() ?>assets/template/img/logo_kasih_palestina.png" alt="" class="img-thumbnail">
        </div>
      </div>
    </div>

