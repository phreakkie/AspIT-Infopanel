<?php
session_start();
$page = $_SERVER['PHP_SELF'];
$sec = "600";
?>
<!DOCTYPE html>
<html lang="en" class=" h-screen">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="<?=$meta?>">
  <meta http-equiv="refresh" content="<?php echo $sec?>;URL='<?php echo $page?>'">
  <title><?= $title ?> | Infoskærm</title>
  <link rel="stylesheet" href="glide.core.min.css">
  <link rel="stylesheet" href="glide.theme.min.css">
  <link rel="stylesheet" href="https://unpkg.com/flowbite@1.3.4/dist/flowbite.min.css" />
  <link rel="stylesheet" href="styles.css" />
</head>

<body class="font-OpenSans aspit-green h-screen">