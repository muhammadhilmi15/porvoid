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
<?php $this->load->view('header/main_header.php')?>
<div class="jumbotron text-center">
  <h1>Be an Agent of Change!</h1>
  <p>Portal Volunteer Indonesia</p>
  <div class="alert alert-success" style="display: none"></div>
  <div class="alert alert-info" style="display: none"></div>
  <div class="alert alert-danger" style="display: none"></div>
  <div class="alert alert-warning" style="display: none"></div>
</div>
<!-- Container (About Section) -->
<div id="tentang" class="container-fluid">
  <div class="row">
    <div class="col-sm-8">
      <h2>VISI</h2>
      <h4>Sebuah aplikasi yang bergerak di bidang sosial kemasyarakatan</h4>
      <p>Banyaknya masalah yang ada di Indonesia khususnya masalah dibidang sosial, membuat kami berinisiatif membangun aplikasi ini untuk membantu menyelesaikan permasalahan-permasalahan tersebut.</p>
    </div>
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-tree-deciduous logo pull-right"></span>
    </div>
  </div>
</div>

<div class="container-fluid bg-grey">
  <div class="row">
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-globe logo slideanim"></span>
    </div>
    <div class="col-sm-8">
      <h2>MISI</h2>
      <h4>Membangun Indonesia menjadi lebih baik</h4>
      <p>Kami memberi kesempatan kepada orang-orang baik yang ada di Indonesia untuk tidak hanya diam, tetapi memberikan aksi nyata dalam menyelesaikan permasalahan-permasalahan sosial yang ada di Indonesia.</p>
    </div>
  </div>
</div>

<!-- Container (Services Section) -->
<div id="fitur" class="container-fluid text-center">
  <h2>FITUR DAN LAYANAN</h2>
  <h4>Yang Kami Tawarkan Untuk Anda</h4>
  <br>
  <div class="row slideanim">
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-user logo-small"></span>
      <h4>VOLUNTEER</h4>
      <p>Jadilah volunteer dalam berbagai kegiatan dan tunjukkan jiwa sosialmu</p>
    </div>
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-briefcase logo-small"></span>
      <h4>DONATUR</h4>
      <p>Anda juga bisa berperan sebagai donatur untuk kegiatan sosial loh</p>
    </div>
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-calendar logo-small"></span>
      <h4>PENYELENGGARA</h4>
      <p>Buatlah kegiatan sosial dan rekrut volunteer sesuai kriteria anda untuk membantu menyelesaikan permasalahan yang ada</p>
    </div>
  </div>
</div>

<!-- Container (Portfolio Section) -->
<div id="kegiatan" class="container-fluid text-center bg-grey">
  <h2>KEGIATAN TERUPDATE</h2>
  <h4>Pilih Kegiatan yang Anda Minati</h4>
  <div class="row text-center slideanim">
  <?php foreach ($berita as $news): ?>
    <div class="col-sm-4">
      <div class="thumbnail">
        <img src="<?php echo base_url('build/images/'.$news['foto']); ?>" alt="<?php echo $news['tgl_mulai']; ?>" width="400" height="300"><br>
        <p style="text-transform: uppercase;"><strong><?php echo $news['nama_keg']; ?></strong></p>
        <p><?php echo $news['deskripsi'] ?></p>
      </div>
    </div>
    <?php endforeach ?>
  </div>
</div>

<!-- Container (Contact Section) -->
<div id="kontak" class="container-fluid">
  <h2 class="text-center">KONTAK KAMI</h2>
  <div class="row">
    <div class="col-sm-5">
      <p>Kami bersedia melayani anda 24 jam non-stop :)</p>
      <p><span class="glyphicon glyphicon-map-marker"></span> Malang, Indonesia</p>
      <p><span class="glyphicon glyphicon-phone"></span> +62 341-345876</p>
      <p><span class="glyphicon glyphicon-envelope"></span> porvoid@gmail.com</p>
    </div>
    <div class="col-sm-7 slideanim">
      <div class="row">
        <div class="col-sm-6 form-group">
          <input class="form-control" id="name" name="name" placeholder="Nama" type="text" required>
        </div>
        <div class="col-sm-6 form-group">
          <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
        </div>
      </div>
      <textarea class="form-control" id="comments" name="comments" placeholder="Pesan" rows="5"></textarea><br>
      <div class="row">
        <div class="col-sm-12 form-group">
          <button class="btn btn-default pull-right" type="submit">Kirim</button>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Add Google Maps -->
<div id="googleMap" style="height:400px;width:100%;" class="bg-grey"></div>
<script>
function myMap() {
var myCenter = new google.maps.LatLng(-7.950884, 112.608102);
var mapProp = {center:myCenter, zoom:15, scrollwheel:false, draggable:false, mapTypeId:google.maps.MapTypeId.ROADMAP};
var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
var marker = new google.maps.Marker({position:myCenter});
marker.setMap(map);
}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDyM7_MqYnMCdEV789fjA3SmDQmT-N5dWg&callback=myMap"></script>

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
