<?php echo form_open_multipart('upload/index'); ?>
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
<?php echo form_close(); ?>