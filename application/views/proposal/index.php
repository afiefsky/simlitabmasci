<!-- Search feature -->
<?php echo form_open('daftar_proposal/index'); ?>
<table border="1">
  <tr>
    <td>Pencarian: </td>
    <td><input type="text" name="keyword" size="100" placeholder="Masukkan kata kunci (cth: Buku Pedoman)"></td>
    <td><input type="submit" name="submit"></td>
<?php echo form_close(); ?>
    <td><?php echo anchor('daftar_proposal', '<button>Reset</button>'); ?></td>
  </tr>
</table>
<!-- End of search feature -->
<br/>
<!-- Table of Data -->
<table border="1" width="100%">
  <thead>
    <tr>
  <th width="3%">No</th>
    <th width="15%">Uploader</th>
      <th width="3%">Tanggal Ajuan</th>
      <th width="50%">Judul</th>
      <th width="15%">Jenis PPM</th>
    <th width="15%">Ajuan Dana</th>
    <th width="15%">Periode</th>
    <th width="15%">File Proposal</th>
      <th colspan="3" width="22%">Aksi</th>
    </tr> 
  </thead>
  <tbody>
      <?php 
    $no = 1;
    $ppm_name = 0;
    $period_fixed = '';
    foreach($record as $r){?>
    <tr>
    <?php
    // for ppm_type
    if ($r->ppm_type == 'a') {
        $ppm_name = 'Penelitian Internal';
    } elseif ($r->ppm_type == 'b') {
        $ppm_name = 'PKM';
    } else {
        $ppm_name = '';
    }

    // format rupiah for submitted fund
    $fund_fixed = "Rp " . number_format($r->submitted_fund,2,',','.');
        
    // for period type between A, B, and C
    if ($r->period_type == 'a') {
        $period_fixed = '6 Bulan';
    } elseif ($r->period_type == 'b') {
        $period_fixed = '7 Bulan';
    } elseif ($r->period_type == 'c') {
        $period_fixed = '8 Bulan';
    } else {
        $period_fixed = '';
    }
    ?>
    <td><?php echo $no;?></td>
    <td><?php echo $r->username;?></td>
    <td><?php echo $r->created_at;?></td>
    <td><?php echo $r->title;?></td>
    <td><?php echo $ppm_name;?></td>
    <td><?php echo $fund_fixed;?></td>
    <td><?php echo $period_fixed;?></td>
    <td><?php echo $r->file_name;?></td>
    <td>
                   <button class="btn btn-warning" onclick="edit_item(<?php echo $r->user_id;?>)">edit<i class="glyphicon glyphicon-pencil"></i></button></td>
      </tr>  
        
     <?php $no++;}?>
  </tbody>
</table>
