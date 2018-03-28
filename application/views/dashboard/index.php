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
    <li><?php echo anchor('upload', 'Upload'); ?></li>
    <li><br></li>
    <li><?php echo anchor('auth/logout', 'Logout'); ?></li>
  </ul>

  <div style="margin-left:25%;padding:1px 16px;height:1000px;">
    <br />
    <table border="1">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama File</th>
          <th>Aksi</th>
        </tr> 
      </thead>
      <tbody>
        
      </tbody>
    </table>
  </div>

</body>