<?php
require_once 'data/functions.php';

$errors = array();
$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  if ($_POST['account'] == '') {
    $errors['account'] = 'アカウント名を入力してください';
  } elseif (!preg_match("/^[a-zA-Z0-9]+$/", $_POST['account'])) {
    $errors['account'] = 'アカウント名は半角英数字のみで入力してください';
  }

  // TODO:
  // アカウント名が半角英数字のみかチェックする。
  // エラーの場合は「アカウント名は半角英数字のみで入力してください」と表示する。

  
  if ($_POST['tel'] == '') {
    $errors['tel'] = '電話番号を入力してください';
  } elseif (!preg_match("/^[0-9-]+$/", $_POST['tel'])) {
    $errors['tel'] = '電話番号は数字とハイフンのみで入力してください';
  }

  // TODO:
  // 電話番号が数字とハイフンのみかチェックする。
  // エラーの場合は「電話番号は数字とハイフンのみで入力してください」と表示する。


  if ($_POST['date'] == '') {
    $errors['date'] = '日付を入力してください';
  } elseif (!preg_match("/^([1-9][0-9]{3})\/(0[1-9]{1}|1[0-2]{1})\/(0[1-9]{1}|[1-2]{1}[0-9]{1}|3[0-1]{1})$/", $_POST['date'])) {
    $errors['date'] = '日付はYYYY/MM/DDの形式で入力してください';
  }

  // TODO:
  // 日付が YYYY/MM/DD 形式かチェックする。
  // エラーの場合は「日付はYYYY/MM/DDの形式で入力してください」と表示する。


  if (empty($errors)) {
    $message = '正しい形式のデータが入力されました';
  }
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
<div class="message"><?php echo $message ?></div>

<form action="" method="post">
  <span class="label">アカウント名</span> <input type="text" name="account" value="<?php if (isset($_POST['account'])): ?><?php echo h($_POST['account']); ?><?php endif ?>"> <span class="info">半角英数字のみ</span><br>
  <?php if (isset($errors['account'])): ?>
    <div class="error"><?php echo h($errors['account']); ?></div>
  <?php endif ?>

  <span class="label">電話番号</span> <input type="text" name="tel" value="<?php if (isset($_POST['tel'])): ?><?php echo h($_POST['tel']); ?><?php endif ?>"><span class="info"> 数字とハイフンのみ</span><br>
  <?php if (isset($errors['tel'])): ?>
    <div class="error"><?php echo h($errors['tel']); ?></div>
  <?php endif ?>

  <span class="label">日付</span> <input type="text" name="date" value="<?php if (isset($_POST['date'])): ?><?php echo h($_POST['date']); ?><?php endif ?>"> <span class="info">YYYY/MM/DD の形式</span><br>
  <?php if (isset($errors['date'])): ?>
    <div class="error"><?php echo h($errors['date']); ?></div>
  <?php endif ?>

  <input type="submit" value="送信">
</form>
</body>
</html>

