<?php
$dashboard = 0;
$upload = 0;

$active_page = $this->session->userdata('active_page');

$login_status = $this->session->userdata('login_status');
$level_number = $this->session->userdata('level_number');

if ($active_page == 'dashboard') {
    $dashboard = anchor('dashboard', 'Beranda', ['class' => 'active']);
    $upload = null;
    $this->session->set_userdata('login_button_active', 0);
	$log_button = anchor('auth', 'Login');
	$daftar_proposal = null;
} elseif ($active_page == 'upload') {
    $dashboard = anchor('dashboard', 'Beranda');
    $upload = anchor('upload', 'Upload', ['class' => 'active']);
} else {
    $dashboard = anchor('dashboard', 'Beranda');
    $upload = anchor('upload', 'Upload');
	$log_button = anchor('auth', 'Login', ['class' => 'active']);
}

if ($login_status == 1 && $level_number == 2 && $active_page == 'upload') {
    $log_button = anchor('auth/logout', 'Logout');
	$upload = anchor('upload', 'Upload', ['class' => 'active']);
	$daftar_proposal = null;
}
else if ($login_status == 1 && $level_number == 2 && $active_page == 'dashboard') {
	$dashboard = anchor('dashboard', 'Beranda', ['class' => 'active']);
    $log_button = anchor('auth/logout', 'Logout');
	$upload = anchor('upload', 'Upload');
	$daftar_proposal = null;
} else if($login_status == 1 && $level_number == 1 && $active_page == 'dashboard') {
	$log_button = anchor('auth/logout', 'Logout');
	$upload = null;
	$daftar_proposal = anchor('daftar_proposal', 'Daftar Proposal');
}else if($login_status == 1 && $level_number == 1 && $active_page == 'daftar_proposal') {
	$log_button = anchor('auth/logout', 'Logout');
	$upload = null;
	$daftar_proposal = anchor('daftar_proposal', 'Daftar Proposal', ['class' => 'active']);
}
else if($login_status == 0){
	$upload = null;
	$daftar_proposal = null;
}
    


?>

<head>
  <style>
  body {
    margin: 0;
  }

  h1 {
    margin-bottom: 0;
  }

  ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    width: 25%;
    background-color: #f1f1f1;
    position: absolute;
    height: 200%;
    overflow: auto;
	
  }

  li a {
    display: block;
    color: #000;
    padding: 8px 16px;
    text-decoration: none;
  }

  li a.active {
    background-color: #4CAF50;
    color: white;
  }

  li a:hover:not(.active) {
    background-color: #555;
    color: white;
  }
</style>
</head>
<body >
  <h1 style="background-color:powderblue;">SIM-LITABMAS</h1>
  <ul>
    <li><?php echo $dashboard; ?></li>
    <li><?php echo $upload; ?></li>
	<li><?php echo $daftar_proposal; ?></li>
    <li><br></li>
    <li><?php echo $log_button; ?></li>
  </ul>

  <div style="margin-left:25%;padding:1px 16px;height:1000px;">
    <br />
    <?php echo $contents; ?>
  </div>

</body>