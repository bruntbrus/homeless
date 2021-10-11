<!DOCTYPE HTML>
<html>
<head>
<title><?= $page->title ?></title>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<link rel="icon" type="image/png" href="image/favicon.png">
<? foreach ($page->styles as $href) { ?>
  <link rel="stylesheet" type="text/css" href="<?= $href ?>">
<? }//foreach ?>
<? foreach ($page->scripts as $src) { ?>
  <script type="text/javascript" src="<?= $src ?>"></script>
<? }//foreach ?>
</head>
<body>

<!-- page -->
<? $template->insert($page->name); ?>
<!-- /page -->

</body>
</html>