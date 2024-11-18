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
    <link rel="stylesheet" href="../assets/modules/prism/prism.css">

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
                                                <?php foreach ($items as $menu): ?>
                                                    <tr>
                                                        <td class="p-0 text-center">
                                                            <div class="custom-checkbox custom-control">
                                                                <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-1">
                                                                <label for="checkbox-1" class="custom-control-label">&nbsp;</label>
                                                            </div>
                                                        </td>
                                                        <td><?= $menu["name_item"] ?></td>
                                                        <td><img src="../public/img/items/<?= $menu["attachment"] ?>" width="50"></td>
                                                        <td><?= $menu["price"] ?></td>
                                                        <td><?= $menu["name_category"] ?></td>
                                                        <td><?= $menu["created_at_item"] ?></td>
                                                        <td>
                                                            <button onclick="modalDetail(<?= $menu['id_item'] ?>, '<?= $menu['name_item'] ?>', '<?= $menu['attachment'] ?>', '<?= $menu['price'] ?>', '<?= $menu['name_category'] ?>', '<?= $menu['created_at_item'] ?>')" class="btn btn-primary mr-1"><i class="far fa-eye"></i> Detail</button>
                                                            <a href="edit-menu.php?id=<?= $menu['id_item'] ?>" class="btn btn-success mr-2"><i class="fas fa-edit"></i></a>
                                                            <a href="../services/delete-menu.php?id=<?= $menu['id_item'] ?>" class="btn btn-danger mr-2"><i class="fas fa-trash-alt"></i></a>
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

    <!-- modal -->
    <div class="modal fade" tabindex="-1" role="dialog" id="detailModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detail Kategori</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- <p>Modal body text goes here.</p> -->
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
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
    <script src="../assets/modules/prism/prism.js"></script>

    <!-- Page Specific JS File -->
    <script src="../assets/js/page/bootstrap-modal.js"></script>

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

        function modalDetail(id, name, attachment, price, category, created_at) {
            $('#detailModal .modal').empty();
            let content = '<ul>';
            content += `<li><strong>Id Kategori:</strong> ${id}</li>`;
            content += `<li><strong>Nama Menu:</strong> ${name}</li>`;
            content += `<li><strong>Gambar : </strong> ${attachment}</li>`;
            content += `<li><strong>Harga: </strong> ${price}</li>`;
            content += `<li><strong>Kategori: </strong> ${category}</li>`;
            content += `<li><strong>Dibuat pada : </strong> ${created_at}</li>`;
            content += '</ul>';
            $('#detailModal .modal-body').html(content);
            $('#detailModal').modal('show');
        }
    </script>
</body>

</html>