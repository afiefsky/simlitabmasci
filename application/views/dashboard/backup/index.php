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
  <ul >
    <li><a class="active" href="#home">Home</a></li>
    <li><?php echo anchor('auth/logout', 'Logout'); ?></li>
  </ul>

  <div style="margin-left:25%;padding:1px 16px;height:1000px;">
    <h2>Selamat datang!</h2>
    <h2>Pengumumam</h2>
    <h3>Pengumuman terbaru (selanjutnya) silahkan lihat di laman http://simlitabmas.ristekdikti.go.id</h3>
    <p>Notice that this div element has a left margin of 25%. This is because the side navigation is set to 25% width. If you remove the margin, the sidenav will overlay/sit on top of this div.</p>
    <p>Also notice that we have set overflow:auto to sidenav. This will add a scrollbar when the sidenav is too long (for example if it has over 50 links inside of it).</p>
    <p>Some text..</p>
    <p>Some text..</p>
    <p>Some text..</p>
    <p>Some text..</p>
    <p>Some text..</p>
    <p>Some text..</p>
    <p>Some text..</p>
  </div>

</body>