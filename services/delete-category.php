<?php

require_once __DIR__ . '/../Model/Model.php';
require_once __DIR__ . '/../Model/Category.php';


$id = $_GET['id'];
if(!isset($id)){
  header("Location: ../views/index-category.php");
  exit;
}

$categories = new Category();
$categories->delete($_GET['id']);
header("Location: ../views/index-category.php");
exit;