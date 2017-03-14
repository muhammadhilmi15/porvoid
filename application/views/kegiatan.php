    <?php
    function random($panjang) {
      $karakter = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
      $string = '';
      for ($i = 0; $i < $panjang; $i++) {
        $pos = rand(0, strlen($karakter) - 1);
        $string .= $karakter{$pos};
      }
      return $string;
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
      <title>Portal Volunteer Indonesia</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="<?php echo base_url('vendors/bootstrap/dist/css/bootstrap.min.css')?>" rel="stylesheet">
      <link href="<?php echo base_url('build/css/gridlist.css')?>" rel="stylesheet">
      <!-- NProgress -->
      <link href="<?php echo base_url();?>vendors/nprogress/nprogress.css" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
      <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
      <script src="<?php echo base_url('vendors/jquery/dist/jquery.min.js')?>"></script>
      <script src="<?php echo base_url('vendors/bootstrap/dist/js/bootstrap.min.js')?>"></script>
      

    </head>
    <body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
      <?php $this->load->view('header/session_header.php')?>
      <div id="kegiatan" class="container-fluid bg-grey">
        <div class="well well-sm">
          <div class="btn-group">
            <a href="#" id="list" class="btn btn-default btn-md"><span class="glyphicon glyphicon-th-list">
            </span>List</a> <a href="#" id="grid" class="btn btn-default btn-md">
            <span class="glyphicon glyphicon-th"></span>Grid</a>
            <form class="">
              <div class="input-group pull-right col-sm-3">
               <input type="text" class="form-control">
               <span class="input-group-btn">
                <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search"></span></button>
              </span>
            </div>
          </form>
        </div>  
      </div>
      <div id="products" class="row list-group">
        <?php foreach ($kegiatan as $keg): ?>
          <div class="item  col-xs-4 col-lg-4">
            <div class="thumbnail">
              <img class="group list-group-image" src="<?php echo base_url('build/images/'.$keg['foto']) ?>" alt="" style ="width: 400px; height: 250px;" />
              <div class="caption">
                <h4 class="group inner list-group-item-heading" id="nama_keg" style="text-transform: uppercase;">
                  <?php echo $keg['nama_keg'] ?></h4>
                  <p class="group inner list-group-item-text" id="nmKeg">
                    <?php echo $keg['deskripsi'] ?>
                    <p>
                      <span class="glyphicon glyphicon-calendar"></span> <?php echo $keg['tgl_mulai']?> s/d <?php echo $keg['tgl_selesai']?><br>
                      <span class="glyphicon glyphicon-map-marker"></span> <?php echo $keg['lokasi']; ?>
                    </p>                      
                    <div class="btn-group" id="tombol_operasi">
                      <a href="javascript:;" id="daftarPeserta" class="btn btn-sm btn-default btn_gabung" data-id="<?php echo $keg['id_kegiatan']; ?>" data-toggle="modal" data-target="#daftar_peserta"><span class="glyphicon glyphicon-comment"></span></a>
                      <a href="javascript:;" id="masukkanDonasi" class="btn btn-sm btn-default btn_donasi" data-id="<?php echo $keg['id_kegiatan']; ?>" data-toggle="modal" data-target="#donasi"><span class="glyphicon glyphicon-thumbs-up"></span></a>
                      <a href="javascript:;" class="btn btn-sm btn-default btn_detail"><span class="glyphicon glyphicon-search"></span></a>
                    </div>                                          
                  </div>
                </div>
              </div>
            <?php endforeach ?>
          </div>
        </div>
        <div class="modal fade" tabindex="-1" role="dialog" id="daftar_peserta">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                <h3>Daftarkan Sebagai Peserta</h3>
              </div>
              <div class="modal-body">
               <?php 
               $dataForm = array('class'=>'form-vertical');
               echo form_open_multipart('c_user/addPeserta', $dataForm); ?>
               <div class="form-group">
                <label>Status</label>
                <select class="form-control" name="status">
                  <option>Pilih Pekerjaan</option>
                  <option value="siswa">Siswa</option>
                  <option value="mahasiswa">Mahasiswa</option>
                  <option value="pekerja">Pekerja</option>
                </select>
              </div>
              <div class="form-group">
                <label>Nama instansi</label>
                <input type="text" name="nama_instansi" class="form-control" placeholder="Nama instansi anda bekerja">
              </div>
              <div class="form-group">
                <label>Lampiran</label>
                <div style="position:relative;">
                 <a class='btn btn-default' href='javascript:;'>
                   Pilih File
                   <input type="file" style='position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;color:transparent;' name="userfile" multiple size="40"  onchange='$("#upload-file-info").html($(this).val());'>
                 </a>
                 &nbsp;
                 <span class='label label-primary' id="upload-file-info"></span>
               </div>
             </div>
             <div class="form-group">
              <button type="button" class="btn btn-danger btn-md" data-dismiss="modal">Batal</button>
              <button type="reset" class="btn btn-primary btn-md">Reset</button>
              <button type="submit" class="btn btn-default btn-md">Daftar</button>
            </div>
            <input type="hidden" name="id_userlog" value="<?php echo $this->session->userdata('id_user'); ?>">
            <input type="hidden" name="id_kegiatan" id="id_kegiatan" class="form-control">
            <input type="hidden" name="id_peserta" id="id_peserta" class="form-control" value="<?php echo random(8);?>">         
          </form>
        </div>
      </div>
    </div>
    </div>
    <div class="modal fade" tabindex="-1" role="dialog" id="donasi">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            <h3>Donasi</h3>
          </div>
          <div class="modal-body">
            <div id="wizard" class="form_wizard wizard_horizontal">
              <ul class="wizard_steps">
                <li>
                  <a href="#step-1">
                    <span class="step_no">1</span>
                    <span class="step_descr">
                      Langkah 1<br />
                      <small>Masukkan jumlah nominal donasi</small>
                    </span>
                  </a>
                </li>
                <li> 
                  <a href="#step-2">
                    <span class="step_no">2</span>
                    <span class="step_descr">
                      Langkah 2<br />
                      <small>Pilih metode pengiriman donasi</small>
                    </span>
                  </a>
                </li>
                <li>
                  <a href="#step-3">
                    <span class="step_no">3</span>
                    <span class="step_descr">
                      Langkah 3<br />
                      <small>Terima kasih atas donasi anda</small>
                    </span>
                  </a>
                </li>
              </ul>
              <div id="step-1" class="active">
                <div class="text-center">
                  <h4>Donasi Untuk</h4>
                  <h2 id="tag_nama_keg"><?php echo $keg['nama_keg'] ?></h2>
                </div>
                <div class="container-fluid">
                 <form class="form-vertical">
                   <div class="form-group text-center">
                     <h4>Jumlah Donasi yang Anda Ingin Donasikan</h4>
                     <input type="text" name="donasi" class="form-control" placeholder="Jumlah donasi"><br>
                     <textarea class="form-control" name="pesan" rows="4" placeholder="Pesan untuk penyelenggara kegiatan"></textarea><br>
                   </div>
                 </form>
                </div>
              </div>
              <div id="step-2">
                <h2 class="StepTitle text-center">Pilih Metode Pembayaran</h2>
                <div class="container-fluid">
                  <label>Nomor Rekening</label>
                  <p>BANK BNI<br>3364773623<br>A.N. PT. Portal Volunteer Indonesia</p><br>
                  <label>Bayar Dengan QR Code</label>
                  <img src="<?php echo base_url('build/images/sample.png')?>" alt="image qr" style="width: 300px; height: 300px;">
                </div>
              </div>
              <div id="step-3">
                <h2 class="StepTitle">Terimak Kasih</h2>
                <hr>
              </div>
            </div>
         </div>
         <!-- <footer class="container-fluid text-center">
          <a href="#myPage" title="To Top">
            <span class="glyphicon glyphicon-chevron-up"></span>
          </a>
          <p>Copyright &copy <a href="https://www.porvo.id">www.porvo.id</a> 2017</p>
        </footer> -->
        <!-- FastClick -->
        <script src="<?php echo base_url();?>vendors/fastclick/lib/fastclick.js"></script>
        <!-- NProgress -->
        <script src="<?php echo base_url();?>vendors/nprogress/nprogress.js"></script>
        <!-- jQuery Smart Wizard -->
        <script src="<?php echo base_url();?>vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script>
        <!-- Custom Theme Scripts -->
        <script src="<?php echo base_url();?>build/js/custom.min.js"></script>
        <!-- jQuery Smart Wizard -->
        <script>
          $(document).ready(function() {
            $('#wizard').smartWizard();

            $('#wizard_verticle').smartWizard({
              transitionEffect: 'slide'
            });

            $('.buttonNext').addClass('btn btn-success');
            $('.buttonPrevious').addClass('btn btn-primary');
            $('.buttonFinish').addClass('btn btn-default');
          });
        </script>
        <script>
          $(document).ready(function(){
      // Add smooth scrolling to all links in navbar + footer link
      $(".navbar a, footer a[href='#myPage']").on('click', function(event) {
        // Make sure this.hash has a value before overriding default behavior
        if (this.hash !== "") {
          // Prevent default anchor click behavior
          event.preventDefault();
          // Store hash
          var hash = this.hash
          // Using jQuery's animate() method to add smooth page scroll
          // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
          $('html, body').animate({
            scrollTop: $(hash).offset().top
          }, 900, function(){
            // Add hash (#) to URL when done scrolling (default click behavior)
            window.location.hash = hash;
          });
        } // End if
      });
      $(window).scroll(function() {
        $(".slideanim").each(function(){
          var pos = $(this).offset().top;

          var winTop = $(window).scrollTop();
          if (pos < winTop + 600) {
            $(this).addClass("slide");
          }
        });
      });
    });
    </script>
    <script>
      $(document).ready(function() {
        $('#list').click(function(event){event.preventDefault();$('#products .item').addClass('list-group-item');});
        $('#grid').click(function(event){event.preventDefault();$('#products .item').removeClass('list-group-item');$('#products .item').addClass('grid-group-item');});
      });
    </script>
    <script type="text/javascript">
      $(document).ready(function(){
        $(document).on('click','.btn_gabung', function(){
          var idku = $(this).data('id');
          $('#daftar_peserta #id_kegiatan').val(idku);
        });
        $(document).on('click','.btn_donasi', function(){
          var idad = $(this).data('id');
          $('#donasi #tag_nama_keg').val(idad);
        });
      });
    </script>
    </body>
    </html>
