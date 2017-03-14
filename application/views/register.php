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
  <link href="<?php echo base_url('build/css/style.css')?>" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <script src="<?php echo base_url('vendors/jquery/dist/jquery.min.js')?>"></script>
  <script src="<?php echo base_url('vendors/bootstrap/dist/js/bootstrap.min.js')?>"></script>
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
<?php $this->load->view('header/user_header.php')?>
<div class="jumbotron text-center">
  <h1>Portal Volunteer Indonesia</h1>
  <p>Be an Agent of Change!</p>
      <div class="alert alert-success" style="display: none"></div>
      <div class="alert alert-info" style="display: none"></div>
      <div class="alert alert-danger" style="display: none"></div>
      <div class="alert alert-warning" style="display: none"></div>
</div>
<div class="text-center">
  <h2>REGISTER</h2>
  <h4>Daftarkan diri anda. Jadilah agen perubahan untuk Indonesia yang lebih baik!</h4>
</div>
<div class="container-fluid bg-grey">
<ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#user">Volunteer/Donatur</a></li>
  <li><a data-toggle="tab" href="#admin">Penyelenggara Kegiatan</a></li>
</ul>
<div class="tab-content">
  <div id="user" class="tab-pane fade in active"><br>
    <div class="row">
      <div class="col-sm-4">
        <div class="panel panel-info">
          <div class="panel-heading">Tata cara pengisian form</div>
          <div class="panel-body">
            <ul>
              <li>Mengisi form sesuai identitas lembaga</li>
              <li>Tuliskan deskripsi singkat dan jelas tentang lembaga anda</li>
              <li>Usahakan untuk mengupload logo lembaga</li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-sm-8">
        <?php
        $formData = array(
            'class' => 'form-vertical',
          );
        echo form_open_multipart('C_register/addRegister',$formData);
        ?>
          <div class="form-group">
            <label>Nama</label>
            <input type="text" class="form-control" placeholder="Masukkan nama anda" id="nama" name="nama">
          </div>
          <div class="form-group">
            <label>Nama Lembaga</label>
            <input type="text" class="form-control" placeholder="Masukkan nama lembaga" id="nama_lembaga" name="nama_lembaga">
          </div>
          <div class="form-group">
            <label>Tanggal Lahir/Tanggal Berdiri</label>
            <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir">
          </div>
          <div class="form-group">
            <label>Alamat</label>
            <textarea class="form-control" placeholder="Masukkan alamat anda" id="alamat" name="alamat" rows="4"></textarea>
          </div>
          <div class="form-group">
            <label>Nomor Telepon</label>
            <input type="text" class="form-control" placeholder="Masukkan nomor telepon anda" id="no_telp" name="no_telp">
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="mail" class="form-control" placeholder="Masukkan email anda" id="email" name="email">
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" placeholder="Password" id="password" name="password">
          </div>
          <div class="form-group">
            <label for="password">Level</label>
            <select class="form-control" name="level">
              <option value="volunteer">Volunteer</option>
              <option value="donatur">Donatur</option>
            </select>
          </div>
          <div class="form-group">
            <label for="">Foto</label>
            <div class="input-group">
                <label class="input-group-btn">
                    <span class="btn btn-default">
                        Browse&hellip; <input type="file" style="display: none;" multiple name="userfile">
                    </span>
                </label>
                <input type="text" class="form-control" readonly>
            </div>
          </div>
          <button type="submit" id="btnReg" class="btn btn-primary btn-md">Daftar</button>
          <button type="reset" id="btnReset" class="btn btn-dafault btn-md">Reset</button>
          <input type="hidden" name="id_user" id="id_user" value="<?php echo random(8)?>" style="text-transform: uppercase">
        </form>
      </div>
    </div>
  </div>
  <div id="admin" class="tab-pane fade"><br>
    <div class="row">
      <div class="col-sm-4">
        <div class="panel panel-info">
          <div class="panel-heading">Tata cara pengisian form</div>
          <div class="panel-body">
            <ul>
              <li>Mengisi form sesuai identitas</li>
              <li>Kosongkan nama lembaga apabila hanya mendaftar sebagai volunteer</li>
              <li>Jika mendaftar sebagai lembaga, isi nama sesuai nama lembaga</li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-sm-8">
      <form class="form-vertical" id="form_penyelenggara" method="POST" action="<?php echo base_url('C_penyelenggara/addPenyelenggara'); ?>">
          <div class="form-group">
            <label>Nama Lembaga</label>
            <input type="text" class="form-control" placeholder="Masukkan nama lembaga" id="nama_lembaga" name="nama_lembaga_pny">
          </div>
          <div class="form-group">
            <label>Tanggal Berdiri</label>
            <input type="date" class="form-control" id="tgl_berdiri" name="tgl_berdiri">
          </div>
          <div class="form-group">
            <label>Alamat</label>
            <textarea class="form-control" placeholder="Masukkan alamat" id="alamat_pny" name="alamat_pny" rows="4"></textarea>
          </div>
          <div class="form-group">
            <label>Nomor Telepon</label>
            <input type="text" class="form-control" placeholder="Masukkan nomor telepon" id="no_telp" name="no_telp_pny">
          </div>
          <div class="form-group">
            <label>Deskripsi</label>
            <textarea class="form-control" name="deskripsi_pny" rows="8" placeholder="Tuliskan deskripsi singkat tentang lembaga"></textarea>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label>Nomor Rekening</label>
              <input type="text" class="form-control" placeholder="Masukkan nomor rekening" id="no_rek_pny" name="no_rek_pny">
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label>Nama Alias</label>
              <input type="text" class="form-control" placeholder="Masukkan nama alias" id="alias_pny" name="alias_pny">
            </div>
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" placeholder="Masukkan email anda" id="email_pny" name="email_pny">
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" placeholder="Password" id="password_pny" name="password_pny">
          </div>
          <button type="submit" id="btnRegPny" class="btn btn-primary btn-md">Daftar</button>
          <button type="reset" id="btnReset" class="btn btn-dafault btn-md">Reset</button>
          <input type="hidden" name="id_admin" id="id_admin" value="<?php echo random(8) ?>" style="text-transform: uppercase">
        </form>
      </div>
    </div>
  </div>
</div>
</div><br>
<footer class="container-fluid text-center">
  <a href="#myPage" title="To Top">
    <span class="glyphicon glyphicon-chevron-up"></span>
  </a>
  <p>Copyright & copy <a href="https://www.porvo.id">www.porvo.id</a> 2017</p>
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
    $('.alert-warning').hide();
    <?php if ($this->session->flashdata('pesan_gagal')): ?>
      $('.alert-warning').html('<?php echo $this->session->flashdata('pesan_gagal'); ?>').fadeIn().delay(4000).fadeOut('slow');
    <?php endif ?>
  });
</script>
</body>
</html>
