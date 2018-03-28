<table border="1" width="100%">
  <thead>
    <tr>
      <th>No</th>
      <th>Nama File</th>
      <th>Aksi</th>
    </tr> 
  </thead>
  <tbody>
      <?php
      $no = 1;
      foreach ($record->result() as $r) {
          echo "<tr>
              <td>$no</td>
              <td>$r->file_name</td>
              <td>".anchor(base_url().'uploads/'.$r->file_name, 'Download')."</td>
          </tr>";
          $no++;
      }
      ?>
  </tbody>
</table>
