<!DOCTYPE html>
<html lang="en">
<head>
  <style>
  form {
    display: inline-block; //Or display: inline; 
  }
  #jenis_hibah{
    width:450px;   
  }
  #jenis_hibah option{
    width:450px;   
  }
  .center {
    padding: 70x 0;
    width:380px;
    margin-top: 200px;
    text-align: center;
    margin: auto;
    border: 1px solid gray;
    background-color: #eeeeee;
  }
  div.a {
    line-height: 1.6;
  }
</style>
<title>Login Page</title>
</head>
<div class="form-signin">
  <div class="text-center">
    <!-- This is text-center -->
  </div>
  <div class="center">
    <div id="login" class="tab-pane active">
      <?php
        echo form_open('auth');
      ?>
        <p class="text-muted text-center">
          <b>Login Opt. Pengelola Perguruan Tinggi</b>
        </p>
        <div class="a">
          Username :
          <input name="username" type="text" autocomplete="off" placeholder="Masukkan username" class="form-control top"><br>
          Password : <input name="password" type="password" autocomplete="off" placeholder="Masukkan password" class="form-control bottom"><br>
          <br>
		  <input type="button" value="Kembali" onclick="window.location.href='dashboard'" />
          <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Login</button>
		  
          <br></br>
      </form>
      </div>
    </div>
  </div>
</div>
</body>
</html>