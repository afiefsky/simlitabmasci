<table border="1" width="100%">
  <thead>
    <tr>
      <th width="3%">No</th>
      <th width="75%">Nama File</th>
      <th colspan="3" width="22%">Aksi</th>
    </tr> 
  </thead>
  <tbody>
      <?php
      $no = 1;
      foreach ($record->result() as $r) {
          echo "<tr>
              <td align='center' rowspan='2'>$no</td>
              <td rowspan='2'>$r->file_name</td>
              <td align='center' colspan='2'>".anchor(base_url().'uploads/'.$r->file_name, 'Download')."</td>
          </tr>
          <tr>
              <td align='center'>".anchor(base_url().'uploads/'.$r->file_name, 'Accept')."</td>
              <td align='center'>".anchor(base_url().'uploads/'.$r->file_name, 'Reject')."</td>
          </tr>";
          $no++;
      }
      ?>
  </tbody>
</table>
