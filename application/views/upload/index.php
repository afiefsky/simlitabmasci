<h2>Form Pengajuan Proposal</h2>
<?php echo form_open_multipart('upload/index'); ?>
<table border="1">
  <!-- 1 -->
  <tr>
    <td>
      Tanggal Ajuan
    </td>
    <td>
      <input type="text" name="created_at" value="<?php echo date("l, d-M-Y"); ?>" required readonly/>
    </td>
  </tr>
  <!-- 2 -->
  <tr>
    <td>
      Judul
    </td>
    <td>
      <textarea name="title" rows="4" cols="100" placeholder="Masukkan judul proposal" required></textarea>
    </td>
  </tr>
  <!-- 3 -->
  <tr>
    <td>
      Jenis PPM
    </td>
    <td>
      <select name="ppm_type" required>
        <option value="A">Penelitian Internal</option>
        <option value="B">PKM</option>
      </select>
    </td>
  </tr>
  <!-- 4 -->
  <tr>
    <td>
      Ajuan Dana
    </td>
    <td>
      <input type="text" name="submitted_fund" id="submitted_fund" placeholder="Masukkan nominal dalam angka (0-9)" size="40" required />
    </td>
  </tr>
  <!-- 5 -->
  <tr>
    <td>
      Periode
    </td>
    <td>
      <select name="period_type" required>
        <option value="A">6 Bulan</option>
        <option value="B">7 Bulan</option>
        <option value="C">8 Bulan</option>
      </select>
    </td>
  </tr>
  <!-- 6 -->
  <tr>
    <td>
      File Proposal
    </td>
    <td>
      <input type="file" name="userfile" size="20" required/>
    </td>
  </tr>
  <!-- 7 -->
  <tr>
    <td colspan="2">
      <input type="submit" name="submit" value="Submit" />
    </td>
  </tr>
</table>
<?php echo form_close(); ?>
<br />

<script type="text/javascript">
  /* Dengan Rupiah */
  var submitted_fund = document.getElementById('submitted_fund');
  submitted_fund.addEventListener('keyup', function(e)
  {
    submitted_fund.value = formatRupiah(this.value, 'Rp. ');
  });
  
  submitted_fund.addEventListener('keydown', function(event)
  {
    limitCharacter(event);
  });
  
  /* Fungsi */
  function formatRupiah(bilangan, prefix)
  {
    var number_string = bilangan.replace(/[^,\d]/g, '').toString(),
      split = number_string.split(','),
      sisa  = split[0].length % 3,
      rupiah  = split[0].substr(0, sisa),
      ribuan  = split[0].substr(sisa).match(/\d{1,3}/gi);
      
    if (ribuan) {
      separator = sisa ? '.' : '';
      rupiah += separator + ribuan.join('.');
    }
    
    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
    return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
  }
  
  function limitCharacter(event)
  {
    key = event.which || event.keyCode;
    if ( key != 188 // Comma
       && key != 8 // Backspace
       && key != 17 && key != 86 & key != 67 // Ctrl c, ctrl v
       && (key < 48 || key > 57) // Non digit
       // Dan masih banyak lagi seperti tombol del, panah kiri dan kanan, tombol tab, dll
      ) 
    {
      // event.preventDefault();
      return false;
    }
  }
</script>


<!-- 
<table border=1>
  <tr>
    <td>
      Hanya menerima file dengan extensi sebagai berikut: <b>pdf, docx/doc, xlsx/xls, pptx/ppt</b>
    </td>
  </tr>
  <tr>
    <td>
      <input type="file" name="userfile" size="20" />
    </td>
  </tr>
  <tr>
    <td>
      Catatan:
    </td>
  </tr>
  <tr>
    <td>
      <textarea name="note" rows="4" cols="100" placeholder="Masukkan catatan singkat di sini (cth: File petunjuk penulisan Tugas Akhir)"></textarea>
    </td>
  </tr>
  <tr>
    <td>
      <input type="submit" name="submit" value="Submit" />
    </td>
  </tr>
</table>
 -->