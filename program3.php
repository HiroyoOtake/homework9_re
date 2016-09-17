<?php
require_once 'data/functions.php';

$file_list = array(
  "/sample/images///img1.jpg",
  "/sample//other/images/img22.jpg",
  "/img333.jpg",
  "//img4444.jpg",
  "/////sample////////////img55555.jpg",
);

$dir_list = array();
foreach ($file_list as $file) {
	// var_dump($file);
  // TODO:
  // ディレクトリのパスのみを $dir_list に格納する。
  // その際、２つ以上連続した「/」は１つにまとめる。→ できない
	$a = preg_replace("/\/+/","/",$file);
	// var_dump($a);
	$b = preg_replace("/\/[^\/]*$/","/",$a);
	var_dump($b);
}


?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title></title>
  <link href="data/style.css" rel="stylesheet" />
</head>
<body>
  <h1>ディレクトリ一覧</h1>
  <ul>
  <?php foreach ($dir_list as $dir): ?>
    <li><?php echo h($dir) ?></li>
  <?php endforeach ?>
  </ul>

  <div class="result2">
    期待される結果<br>
    - /sample/images/<br>
    - /sample/other/images/<br>
    - /<br>
    - /<br>
    - /sample/<br>
  </div>
</body>
</html>

