<!-- login -->
<form id="login_form" action="action.php?action=login" method="post" class="validate">
  <input type="hidden" name="action_allowed" value="yes">
  <label>Username:&nbsp;<input type="text" name="username" value="" maxlength="20" class="required"></label>
  <br>
  <label>Password:&nbsp;<input type="password" name="password" value="" maxlength="20" class="required"></label>
  <br>
  <input type="submit" name="submit" value="Login">
  <div id="message" class="message"><?= $page->message ?></div>
</form>
<!-- /login -->