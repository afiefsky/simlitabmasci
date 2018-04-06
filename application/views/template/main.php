<?php
$dashboard = 0;
$upload = 0;

$active_page = $this->session->userdata('active_page');

$login_status = $this->session->userdata('login_status');

if ($active_page == 'dashboard') {
    $dashboard = anchor('dashboard', 'Beranda', ['class' => 'active']);
    $upload = anchor('upload', 'Upload');
    $this->session->set_userdata('login_button_active', 0);
} elseif ($active_page == 'upload') {
    $dashboard = anchor('dashboard', 'Beranda');
    $upload = anchor('upload', 'Upload', ['class' => 'active']);
} else {
    $dashboard = anchor('dashboard', 'Beranda');
    $upload = anchor('upload', 'Upload');
}

if ($login_status == 1) {
    $log_button = anchor('auth/logout', 'Logout');
} else {
    $upload = '';

    $login_button_active = $this->session->userdata('login_button_active');

    if ($login_button_active == 1) {
        $log_button = anchor('auth/index', 'Login', ['class' => 'active']);
    } else {
        $log_button = anchor('auth/index', 'Login');
    }
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
    position: fixed;
    height: 100%;
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
    <li><br></li>
    <li><?php echo $log_button; ?></li>
  </ul>

  <div style="margin-left:25%;padding:1px 16px;height:1000px;">
    <br />
    <?php echo $contents; ?>
  </div>

</body>