<!-- index_box -->
<div id="index_box" class="box">
  <div class="head">
    <span>Index</span>
  </div>
  <div class="content">
    <ul>
      <li><a href="hypoman/" target="_blank">HyPoMaN</a></li>
      <li><a href="hypoman/tools/eval/" target="_blank">Eval</a></li>
      <li><a href="phpinfo.php" target="_blank">PHP Info</a></li>
      <li><a href="phpmyadmin/" target="_blank">phpMyAdmin</a></li>
      <li><a href="test/" target="_blank">Test</a></li>
    </ul>
  </div>
</div>
<!-- /index_box -->
<!-- link_box -->
<div id="link_box" class="box">
  <div class="head">
    <span>Links</span>
  </div>
  <div class="content">
    <ul>
    <? foreach ($page->getLinks() as $link) { ?>
      <li><a id="link_<?= $link['id'] ?>" href="<?= $link['url'] ?>" target="_blank"><?= $link['title'] ?></a></li>
    <? }//foreach ?>
    </ul>
  </div>
</div>
<!-- /link_box -->
<!-- info_box -->
<div id="info_box" class="box">
  <div class="head">
    <span>Info</span>
  </div>
  <div class="content">
    <table>
      <tr id="info_browser"><th>Browser:</th><td></td></tr>
      <tr id="info_server"><th>Server:</th><td><?= $_SERVER['SERVER_SOFTWARE'] ?></td></tr>
      <tr id="info_ip"><th>IP:</th><td><?= $_SERVER['REMOTE_ADDR'] ?></td></tr>
      <tr id="info_date"><th>Date:</th><td></td></tr>
      <tr id="info_time"><th>Time:</th><td></td></tr>
    </table>
  </div>
</div>
<!-- /info_box -->
<!-- note_box -->
<div id="note_box" class="box">
  <div class="head">
    <span>Note</span>
    <a id="note_read" href="#">Read</a>
    <a id="note_save" href="#">Save</a>
  </div>
  <div class="content">
    <textarea cols="30" rows="10" wrap="off"><?= $page->readNote(1) ?></textarea>
  </div>
</div>
<!-- /note_box -->
<!-- menu -->
<div id="menu">
  <span><?= $user->name ?></span>
  <span><a href="action.php?action=logout">Logout</a></span>
</div>
<!-- /menu -->