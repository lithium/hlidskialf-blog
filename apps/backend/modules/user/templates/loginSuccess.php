<?=form_tag('user/login')?>
<table>
<tr>
  <td><b>Login<b/><br/>
    <?=input_tag('login')?>
  </td>
</tr>
<tr>
  <td><b>Password<b/><br/>
    <?=input_password_tag('password')?>
  </td>
</tr>
</table>
<?=submit_tag('Login')?>
</form>
