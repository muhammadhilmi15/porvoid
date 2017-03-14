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
<style media="screen">
.wrapper {
    width: 100%;
    text-align: center;
}
.hidden {
    display: none;
}
#map { height: 300px; width: 96%; margin: 10px; margin-top: 1px}
</style>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Portal Volunteer Indonesia</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url()?>vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url()?>vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url()?>vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="<?php echo base_url()?>vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="<?php echo base_url()?>vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="<?php echo base_url()?>build/css/custom.min.css" rel="stylesheet">
    <script type="text/javascript">
    function myMap() {
        var map = new google.maps.Map(document.getElementById('map'),{
            center: new google.maps.LatLng(-7.9666204, 112.6326321),
            zoom: 12
        });
        marker = new google.maps.Marker({
            position: map.getCenter(),
            map: map,
            title: 'Drag to set position',
            draggable: true,
            flat: false
        });
        google.maps.event.addListener(marker, 'dragend', function() {
            latlng = marker.getPosition();
            url = 'https://maps.googleapis.com/maps/api/geocode/json?latlng='+ latlng.lat() + ',' + latlng.lng() + '&sensor=false';
            $.get(url, function(data) {
                if (data.status == 'OK') {
                    map.setCenter(data.results[0].geometry.location);
                    $('#location').val(data.results[0].formatted_address);
                    $('#lat').val(data.results[0].geometry.location.lat);
                    $('#lng').val(data.results[0].geometry.location.lng);
                }
            });
        });
    }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDyM7_MqYnMCdEV789fjA3SmDQmT-N5dWg&callback=myMap"async defer></script>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">

            <div class="clearfix"></div>

            <?php $this->load->view('header/dashboard_header') ?>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Input Kegiatan<small>Isi form dengan lengkap</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <div class="alert-success" style="display: none;"></div>
                    <br />
                    <?php 
                    $dataForm = array('class'=>'form-horizontal form-label-left',);
                    echo form_open_multipart('C_kegiatan/tambahKegiatan', $dataForm); ?>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Kegiatan</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="form-control" name="nama" placeholder="Nama kegiatan">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-md-6">
                          <label class="control-label col-xs-6">Tgl Mulai</label>
                          <div class="col-xs-6">
                            <input type="date" class="form-control" name="tgl_mulai">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <label class="control-label col-xs-3">Tgl Selesai</label>
                          <div class="col-xs-7">
                            <input type="date" class="form-control" name="tgl_selesai">
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-md-6">
                          <label class="control-label col-xs-6">Tgl Mulai Registrasi</label>
                          <div class="col-xs-6">
                            <input type="date" class="form-control" name="tgl_mulaireg">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <label class="control-label col-xs-3">Tgl Tutup Registrasi</label>
                          <div class="col-xs-7">
                            <input type="date" class="form-control" name="tgl_tutupreg">
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Skala Kegiatan</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <select class="form-control" name="skala" >
                              <?php foreach ($skala as $row) : ?>
                              <option value="<?=$row->id_skala?>"><?=$row->nama?></option>
                              <?php endforeach; ?>
                            </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Kategori Kegiatan</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <select class="form-control" name="kategori" >
                            <?php foreach ($kategori as $row2) : ?>
                            <option value="<?=$row2->id_kategori?>"><?=$row2->nama_kategori?></option>
                            <?php endforeach;?>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Buka Donasi</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div id="donasi" class="btn-group" data-toggle="buttons">
                            <label class="btn btn-md btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                              <input type="radio" name="donasi" value="ya"> &nbsp; Iya &nbsp;
                            </label>
                            <label class="btn btn-md btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                              <input type="radio" name="donasi" value="tidak"> Tidak
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Lokasi Kegiatan</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="form-control" name="location" id="location" placeholder="Masukkan lokasi kegiatan atau letakkan marker marker pada map">
                        </div>
                      </div>
                      <div class="form-group">
                          <center>
                              <label class="control-label col-xs-3"></label>
                              <div class="col-xs-2">
                                  <input class="form-control" type="text" name="lat" id="lat" placeholder="Latitude" readonly="TRUE"/>
                              </div>
                              <div class="col-xs-2">
                                  <input class="form-control" type="text" name="lng" id="lng" placeholder="Longitude" readonly="TRUE"/>
                              </div>
                          </center>
                      </div>
                      <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12"></label>
                          <div class="col-md-9 col-sm-9 col-xs-12">
                            <div id="map"></div>
                          </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Deskripsi<span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <textarea class="form-control" rows="5" placeholder='Masukkan deskripsi tentang kegiatan' name="desk"></textarea>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Pamflet</label>
                        <div style="position:relative;" class="col-md-9 col-sm-9 col-xs-12">
                         <a class='btn btn-default' href='javascript:;'>
                           Pilih gambar...
                           <input type="file" style='position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;color:transparent;' name="userfile" multiple size="40"  onchange='$("#upload-file-info").html($(this).val());'>
                         </a>
                         &nbsp;
                         <span class='label label-primary' id="upload-file-info"></span>
                       </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                          <button type="button" class="btn btn-primary">Cancel</button>
                          <button type="reset" class="btn btn-primary">Reset</button>
                          <button type="submit" class="btn btn-success">Submit</button>
                          <input type="hidden" name="id_user1" id="id_user1" value="<?php echo $this->session->userdata('id_user'); ?>" 
                          style="text-transform: uppercase">
                          <input type="hidden" name="id_keg" id="id_keg" value="<?php echo random(8); ?>" style="text-transform: uppercase">
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Copyright 2017 <a href="#">www.porvo.id</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="<?php echo base_url()?>vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url()?>vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url()?>vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="<?php echo base_url()?>vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="<?php echo base_url()?>vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- jQuery Sparklines -->
    <script src="<?php echo base_url()?>vendors/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
    <!-- Flot -->
    <script src="<?php echo base_url()?>vendors/Flot/jquery.flot.js"></script>
    <script src="<?php echo base_url()?>vendors/Flot/jquery.flot.pie.js"></script>
    <script src="<?php echo base_url()?>vendors/Flot/jquery.flot.time.js"></script>
    <script src="<?php echo base_url()?>vendors/Flot/jquery.flot.stack.js"></script>
    <script src="<?php echo base_url()?>vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="<?php echo base_url()?>vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="<?php echo base_url()?>vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="<?php echo base_url()?>vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="<?php echo base_url()?>vendors/DateJS/build/date.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="<?php echo base_url()?>vendors/moment/min/moment.min.js"></script>
    <script src="<?php echo base_url()?>vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url()?>build/js/custom.min.js"></script>

    <script type="text/javascript">
      $(document).ready(function(){
        <?php if ($this->session->flashdata('pesan_sukses')): ?>
          $('.alert-success').html('<?php echo $this->session->flashdata('pesan_sukses'); ?>').fadeIn().delay(4000).fadeOut('slow');
        <?php endif ?>
      });
    </script>
  </body>
</html>
