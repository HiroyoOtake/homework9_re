<?php
require_once 'data/functions.php';

$html = file_get_contents('data/site.html');
// var_dump($html);

// TODO: $html の中から <title>...</title> に囲まれた内容を取得する
preg_match_all("/<title>(.*?)<\/title>/s", $html, $match);
// var_dump($match);
$title   = $match[1][0];


// TODO: $html の中から <img id="logo" src="..." /> の src 属性の内容を取得する
preg_match("/<img.*?src[[:space:]]{0,}=[[:space:]]{0,}[\"']{0,}(.*?[^\"'>[:space:]]{0,}.*?[^\"'>[:space:]]{0,}.*?)[\"']{0,}[[:space:]]{0,}.*?>/is", $html, $match);
// var_dump($match);
$src     = $match[1];


// TODO: $html の中から <div id="content">...</div> に囲まれた内容を取得する
preg_match("/<div id=\"content\">(.*?)<\/div>/s", $html, $match);
// var_dump($match);
$content = $match[0];


?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title></title>
  <link href="data/style.css" rel="stylesheet" />
</head>
<body>

&lt;title&gt;...&lt;/title&gt; の内容 <br>
<div class="result"><?php echo h($title); ?></div>

&lt;img id=&quot;logo&quot; src=&quot;...&quot; /&gt; の src 属性の内容<br>
<div class="result"><?php echo h($src); ?></div>

&lt;div id=&quot;content&quot;&gt;...&lt;/div&gt; の内容 <br>
<div class="result"><?php echo h($content); ?></div>

</body>
</html>

