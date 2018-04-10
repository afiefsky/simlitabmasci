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
	  foreach($documents as $post){?>
     <tr>
		<td><?php echo $no;?></td>
         <td><?php echo $post->user_id;?></td>
         <td><?php echo $post->created_at;?></td>
		 <td><?php echo $post->title;?></td>
		 <td><?php echo $post->ppm_type;?></td>
		 <td><?php echo $post->submitted_fund;?></td>
		 <td><?php echo $post->period_type;?></td>
		 <td><?php echo $post->file_name;?></td>
		 <td>
                   <button class="btn btn-warning" onclick="edit_item(<?php echo $post->user_id;?>)">edit<i class="glyphicon glyphicon-pencil"></i></button></td>
      </tr>  
			  
     <?php $no++;}?>
  </tbody>
</table>
