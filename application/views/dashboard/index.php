<!-- Search feature -->
<?php echo form_open('dashboard/index'); ?>
<table border="1">
  <tr>
    <td>Pencarian: </td>
    <td><input type="text" name="keyword" size="100" placeholder="Masukkan kata kunci (cth: Buku Pedoman)"></td>
    <td><input type="submit" name="submit"></td>
<?php echo form_close(); ?>
    <td><?php echo anchor('dashboard', '<button>Reset</button>'); ?></td>
  </tr>
</table>
<!-- End of search feature -->
<br/>
<!-- Table of Data -->
<table border="1" width="100%">
  <thead>
    <tr>
      <th width="3%">No</th>
      <th width="50%">Nama File</th>
      <th width="15%">Uploader</th>
      <?php
      $level_number = $this->session->userdata('level_number');

      if ($level_number == '1' || $level_number == '2') {
          echo "<th width='10%'>Status</th>";
      } else {
          '';
      }
      
      ?>
      <th colspan="3" width="22%">Aksi</th>
    </tr> 
  </thead>
  <tbody>
      <?php


      $no = 1;
      $acceptance_status = 0;
      foreach ($record->result() as $r) {
          if ($r->acceptance_status == '0') {
              $acceptance_status = 'REJECTED';
          } elseif ($r->acceptance_status == '1') {
              $acceptance_status = 'ACCEPTED';
          } elseif ($r->acceptance_status == '2') {
              $acceptance_status = 'UNCONFIRMED';
          } else {
              $acceptance_status = '';
          }

          echo "<tr>
              <td align='center' rowspan='2'>$no</td>
              <td rowspan='2' align='center'>$r->file_name</td>
              <td rowspan='2' align='center'>$r->username</td>";

          if ($level_number == '1') {
              echo "<td rowspan='2' align='center'><b>$acceptance_status</b></td>";
              echo "<td align='center' colspan='2'>".anchor(base_url().'uploads/'.$r->file_name, 'Download')."</td>
              </tr>
              <tr>
                  <td align='center'>".anchor(base_url().'index.php/document/accept/'.$r->document_id, 'Accept')."</td>
                  <td align='center'>".anchor(base_url().'index.php/document/reject/'.$r->document_id, 'Reject')."</td>
              </tr>";
          } elseif ($level_number == '2') {
              echo "<td rowspan='2' align='center'><b>$acceptance_status</b></td>";
              echo "<td align='center' colspan='2' rowspan='2'>".anchor(base_url().'uploads/'.$r->file_name, 'Download')
                  ."</td>
              </tr>
              <tr></tr>";
          } else {
              echo "<td align='center' colspan='2' rowspan='2'>".anchor(base_url().'uploads/'.$r->file_name, 'Download')
                  ."</td>
              </tr>
              <tr></tr>";
          }

          $no++;
      }
      ?>
  </tbody>
</table>
