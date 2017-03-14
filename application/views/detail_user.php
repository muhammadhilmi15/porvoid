<!DOCTYPE html>
<html lang="en">
<head>
  <title>Portal Volunteer Indonesia</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="<?php echo base_url('vendors/bootstrap/dist/css/bootstrap.min.css')?>" rel="stylesheet">
  <link href="<?php echo base_url('build/css/style.css')?>" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <script src="<?php echo base_url('vendors/jquery/dist/jquery.min.js')?>"></script>
  <script src="<?php echo base_url('vendors/bootstrap/dist/js/bootstrap.min.js')?>"></script>
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
<?php $this->load->view('header/session_header.php')?>
<div id="profil" class="container-fluid">
  <div class="right_col" role="main">
    <div class="">
      <div class="clearfix"></div>
      <div class="row">
        <div class="text-center">
          <h2>PROFIL ANDA</h2><br>
        </div>
        <div class="col-md-3">
          <img src="<?php echo base_url('build/images/img.jpg')?>" class="img-circle" style="border:4px solid black" alt="">
        </div>
        <div class="col-md-9">
          <div class="x_panel">
            <div class="x_content">
              <?php foreach ($user as $u) : ?>
                <table class="table">
                  <tr>
                    <td><b>ID User</b></td>
                    <td><?=$u->id_user?></td>
                  </tr>
                  <tr>
                    <td><b>Nama</b></td>
                    <td><?=$u->nama_user?></td>
                  </tr>
                  <tr>
                    <td><b>Alamat</b></td>
                    <td><?=$u->alamat?></td>
                  </tr>
                  <tr>
                    <td><b>Nama Lembaga</b></td>
                    <td><?=$u->nama_lembaga?></td>
                  </tr>
                  <tr>
                    <td><b>Email</b></td>
                    <td><?=$u->email?></td>
                  </tr>        
                  <tr>
                    <td><b>Nomor Telepon</b></td>
                    <td><?=$u->no_telp?></td>
                  </tr>
                  <tr>
                    <td><b>Status</b></td>
                    <td><?=$u->level?></td>
                  </tr>
                </table>
              <?php endforeach;?>
              <div class="col-md-6">
                <input type="button" class="btn btn-block btn-default" name="edit" value="Edit Profil">  
              </div>
              <div class="col-md-6">
                <input type="button" class="btn btn-block btn-default" name="gantipass" value="Ganti Password">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div id="kontak" class="container-fluid  bg-grey">
  <h2 class="text-center">STATISTIK</h2>
  <div class="row">
    
  </div>
</div>

<footer class="container-fluid text-center">
  <a href="#myPage" title="To Top">
    <span class="glyphicon glyphicon-chevron-up"></span>
  </a>
  <p>Copyright &copy <a href="https://www.porvo.id">www.porvo.id</a> 2017</p>
</footer>

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
<script type="text/javascript">
  $(document).ready(function(){
    $('.alert-success').hide();
    <?php if ($this->session->flashdata('pesan_sukses')): ?>
      $('.alert-success').html('<?php echo $this->session->flashdata('pesan_sukses'); ?>').fadeIn().delay(4000).fadeOut('slow');
    <?php endif ?>

    $('.alert-danger').hide();
    <?php if ($this->session->flashdata('pesan_gagal')): ?>
      $('.alert-danger').html('<?php echo $this->session->flashdata('pesan_gagal'); ?>').fadeIn().delay(4000).fadeOut('slow');
    <?php endif ?>
  });
</script>
</body>
</html>
