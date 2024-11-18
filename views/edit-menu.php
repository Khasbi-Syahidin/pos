<?php

require_once __DIR__ . '/../Model/Model.php';
require_once __DIR__ . '/../Model/Category.php';
require_once __DIR__ . '/../Model/Item.php';


if(!isset($_SESSION["full_name"])) {
  header("Location: login.php");
  exit;
}

$id = $_GET['id'];
if(!isset($id)){
  header("Location: index-menu.php");
  exit;
}

$categories = new Category();
$categories = $categories->all();

$menu = new Item();
$detail_menu = $menu->find($id);

if(isset($_POST["submit"])){

  $datas = [
    "post" => $_POST,
    "files" => $_FILES,
  ];
  $result = $menu->update($id, $datas);
  if(gettype($result) == "string"){
    echo "<script>alert('{$result}'); window.location.href = 'edit-menu.php';</script>";
  }else{
    echo "<script>alert('Menu berhasil ditambahkan'); window.location.href = 'index-menu.php';</script>";
  }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Blank Page &mdash; Stisla</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="../assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/modules/fontawesome/css/all.min.css">

  <!-- CSS Libraries -->

  <link rel="stylesheet" href="../assets/modules/bootstrap-daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="../assets/modules/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
  <link rel="stylesheet" href="../assets/modules/select2/dist/css/select2.min.css">
  <link rel="stylesheet" href="../assets/modules/jquery-selectric/selectric.css">
  <link rel="stylesheet" href="../assets/modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css">
  <link rel="stylesheet" href="../assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/css/components.css">
  <!-- Start GA -->


  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-94034622-3');
  </script>
  <!-- /END GA -->
</head>

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <?php include('../components/layout/navbar.php'); ?>

      <?php include('../components/layout/sidebar.php'); ?>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Edit Menu</h1>
          </div>
          <div class="section-body">
            <div class="row">
              <div class="col-12 col-md-6 col-lg-6 p-2 d-flex justify-content-center align-items-center">
                <img src="../assets/img/illustrations/fastfood.png" style="width: 300px;" alt="">
              </div>
              <div class="col-12 col-md-6 col-lg-6 mx-auto">
                <div class="card w-full">
                  <form action="" method="POST" enctype="multipart/form-data" class="card-body">
                    <div class="form-group">
                      <label for="name_item">Nama Menu</label>
                      <input name="name_item" type="text" id="name_item" class="form-control" value="<?= $detail_menu[0]['name_item'] ?>">
                    </div>
                    <div class="form-group d-flex flex-column ">
                      <label for="attachment" class="form-control-label">Gambar</label>
                      <div class="custom-file">
                        <input type="file" name="attachment" class="custom-file-input" id="attachment" value="<?= $detail_menu[0]['attachment'] ?>">
                        <label class="custom-file-label">Choose File</label>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="category_id">Pilih Kategori</label>
                      <select name="category_id" id="category_id" class="form-control selectric" >
                        <?php foreach ($categories as $category) : ?>
                          <option value="<?= $category["id_category"] ?>" <?php echo ($category["id_category"] ==  $detail_menu[0]['category_id']) ? ' selected' : '';?> ><?= $category["name_category"] ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="price">Harga</label>
                      <input type="number" name="price" id="price" class="form-control" value="<?= $detail_menu[0]['price'] ?>">
                    </div>
                    <div class="d-flex justify-content-end">
                      <button name="submit" type="submit" class="btn btn-primary ">Tambahkan</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
      <?php include('../components/layout/footer.php'); ?>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="../assets/modules/jquery.min.js"></script>
  <script src="../assets/modules/popper.js"></script>
  <script src="../assets/modules/tooltip.js"></script>
  <script src="../assets/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="../assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="../assets/modules/moment.min.js"></script>
  <script src="../assets/js/stisla.js"></script>

  <!-- JS Libraies -->
  <script src="../assets/modules/cleave-js/dist/cleave.min.js"></script>
  <script src="../assets/modules/cleave-js/dist/addons/cleave-phone.us.js"></script>
  <script src="../assets/modules/jquery-pwstrength/jquery.pwstrength.min.js"></script>
  <script src="../assets/modules/bootstrap-daterangepicker/daterangepicker.js"></script>
  <script src="../assets/modules/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
  <script src="../assets/modules/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
  <script src="../assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
  <script src="../assets/modules/select2/dist/js/select2.full.min.js"></script>
  <script src="../assets/modules/jquery-selectric/jquery.selectric.min.js"></script>

  <!-- Page Specific JS File -->

  <!-- Template JS File -->
  <script src="../assets/js/scripts.js"></script>
  <script src="../assets/js/custom.js"></script>
</body>

</html>