<?php

require_once __DIR__ . '/../Model/Model.php';
require_once __DIR__ . '/../Model/Item.php';


$id = $_GET['id'];
if(!isset($id)){
  header("Location: ../views/index-category.php");
  exit;
}

$menu = new Item();
$menu->delete($_GET['id']);
header("Location: ../views/index-menu.php");
exit;