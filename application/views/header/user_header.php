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
        <li><a href="<?php echo base_url();?>"><span class="glyphicon glyphicon-home"></span>HOME</a></li>
        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#login"><span class="glyphicon glyphicon-user"></span>LOGIN</a>
          <div class="dropdown-menu">
            <form id="formLogin" class="form container-fluid" method="POST" action="<?php echo base_url('C_login/logged_in2') ?>">
              <div class="form-group">
                <label for="email">Email</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                  <input type="text" class="form-control" placeholder="Email" id="emailU" name="emailU">
                </div>
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                  <input type="password" class="form-control" placeholder="Password" id="passwordU" name="passwordU">
                </div>
              </div>
              <div class="form-group">
                <label for="password">Level</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  <select class="form-control" name="levelU">
                  <option>Pilih level</option>
                    <option value="volunteer">Volunteer/Donatur</option>
                    <option value="donatur">Penyelenggara</option>
                  </select>
                </div>
              </div>
              <button type="submit" id="btnLogin" class="btn btn-block btn-primary">Login</button>
              <a type="button" id="btnRegister" class="btn btn-block btn-primary" href="<?php echo base_url('c_register')?>">Register</a>
            </form>
          </div>
        </li>
      </ul>
    </div>
  </div>
</nav>
