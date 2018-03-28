    <?php echo form_open_multipart('upload/index'); ?>
    <table border=1>
      <tr>
        <td>
          <input type="file" name="userfile" size="20" />
        </td>
      </tr>
      <tr>
        <td>
          <input type="submit" name="submit" value="Submit" />
        </td>
      </tr>
    </table>
    <?php echo form_close(); ?>