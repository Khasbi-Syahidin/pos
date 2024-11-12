<?php
require_once __DIR__ . "/../Model/Model.php";
require_once __DIR__ . "/../Model/Item.php";


if (!isset($_SESSION["full_name"])) {
    header("Location: login.php");
    exit;
}


$items = new Item();

$limit = 2;
$halAktif = (isset($_GET["page"])) ? $_GET["page"] : 1;
$start = ($limit * $halAktif) - $limit;
$length = count($items->All());
$countPage = ceil($length / $limit);
// var_dump($items->all2());

$items = $items->all2($start, $limit);
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
            <?php include "../components/layout/navbar.php" ?>
            <?php include "../components/layout/sidebar.php" ?>

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1>Halaman Menu</h1>
                    </div>
                    <div class="section-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Advanced Table</h4>
                                        <div class="card-header-form">
                                            <form action="" method="post">
                                                <div class="input-group">
                                                    <input type="text" id="search" name="search" class="form-control" placeholder="Search">
                                                    <div class="input-group-btn">
                                                        <button class="btn btn-primary" id="search-btn" name="search-btn"><i class="fas fa-search"></i></button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="card-body p-0">
                                        <div id="content" class="table-responsive">
                                            <table class="table table-striped">
                                                <tr>
                                                    <th>
                                                        <div class="custom-checkbox custom-control">
                                                            <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">
                                                            <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                                                        </div>
                                                    </th>
                                                    <th>Nama</th>
                                                    <th>Attachment</th>
                                                    <th>Harga</th>
                                                    <th>Category</th>
                                                    <th>Waktu</th>
                                                    <th>Aksi</th>
                                                </tr>
                                                <?php foreach ($items as $category): ?>
                                                    <tr>
                                                        <td class="p-0 text-center">
                                                            <div class="custom-checkbox custom-control">
                                                                <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-1">
                                                                <label for="checkbox-1" class="custom-control-label">&nbsp;</label>
                                                            </div>
                                                        </td>
                                                        <td><?= $category["name_item"] ?></td>
                                                        <td><img src="../public/img/items/<?= $category["attachment"] ?>" width="50"></td>
                                                        <td><?= $category["price"] ?></td>
                                                        <td><?= $category["name_category"] ?></td>
                                                        <td><?= $category["created_at_item"] ?></td>
                                                        <td>
                                                            <a href="index.php?id=<?= $category['id_item'] ?>" class="btn btn-primary mr-2"><i class="fas fa-info-circle"></i></a>
                                                            <a href="edit-menu.php?id=<?= $category['id_item'] ?>" class="btn btn-success mr-2"><i class="fas fa-edit"></i></a>
                                                            <a href="delete-menu.php?id=<?= $category['id_item'] ?>" class="btn btn-danger mr-2"><i class="fas fa-trash-alt"></i></a>
                                                        </td>
                                                    </tr>
                                                <?php endforeach ?>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body d-flex justify-content-end">
                                    <nav aria-label="...">
                                        <ul class="pagination">
                                            <?php $prevDis = ($halAktif == 1) ? "disabled" : ""; ?>
                                            <li class="page-item <?= $prevDis ?>">
                                                <?php $prev = ($halAktif == 1) ? 1 : $halAktif - 1; ?>
                                                <a class="page-link" href="?page=<?= $prev ?>" tabindex="-1">Previous</a>
                                            </li>
                                            <?php for ($i = 1; $i <= $countPage; $i++) : ?>
                                                <?php $pageAktif = ($halAktif == $i) ? "btn-outline-primary" : ""; ?>
                                                <li class="page-item">
                                                    <a class="page-link <?= $pageAktif ?>" href="?page=<?= $i ?>"><?= $i ?></a>
                                                </li>
                                            <?php endfor ?>
                                            <?php $nextDis = ($halAktif == $countPage) ? "disabled" : ""; ?>
                                            <li class="page-item <?= $nextDis ?>">
                                                <?php $next = ($halAktif == $countPage) ? $countPage : $halAktif + 1; ?>
                                                <a class="page-link" href="?page=<?= $next ?>">Next</a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="section-body">
                    </div>
                </section>
            </div>
            <?php include "../components/layout/footer.php" ?>
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

    <!-- Page Specific JS File -->

    <!-- Template JS File -->
    <script src="../assets/js/scripts.js"></script>
    <script src="../assets/js/custom.js"></script>
    <script>
        $(document).ready(function() {
            $('#search').on('keyup', function() {
                //console.log($("#search").val());
                $("#content").load("../assets/search/menu.php?keyword=" + $(this).val());
            });
        });
    </script>
</body>

</html>