<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo base_url();?>">PORVO.ID</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="<?php echo base_url('c_kegiatan'); ?>">KEGIATAN</a></li>
        <li><a href="<?php echo base_url('c_user'); ?>">PROFIL</a></li>
        <li><a href="<?php echo base_url('c_login/logged_out'); ?>"><span class="glyphicon glyphicon-off"></span>LOGOUT</a></li>
      </ul>
    </div>
  </div>
</nav>
