<?php


require_once __DIR__ . '/../../DB/Connection.php';
require_once __DIR__ . '/../../Model/Model.php';
require_once __DIR__ . '/../../Model/Category.php';

$keyword = $_GET['keyword'];
$categories = new Category();
$categories = $categories->search($keyword);

?>


<div class="table-responsive">
    <table class="table table-striped">
        <tr>
            <th>
                <div class="custom-checkbox custom-control">
                    <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">
                    <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                </div>
            </th>
            <th>Nama Categori</th>
            <th>Action</th>
        </tr>
        <?php foreach ($categories as $category) : ?>
            <tr>
                <td class="">
                    <div class="custom-checkbox custom-control">
                        <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-1">
                        <label for="checkbox-1" class="custom-control-label">&nbsp;</label>
                    </div>
                </td>
                <td><?= $category["name"] ?></td>
                <td class="justify-content-end">
                    <a href="detail-category.php?id=<?= $category["id"] ?>" class="btn btn-primary mr-1"><i class="far fa-eye"></i> Detail</a>
                    <a href="edit-category.php?id=<?= $category["id"] ?>" class="btn btn-success mr-1"> <i class="far fa-edit"></i> Edit</a>
                    <a href="delete-category.php?id=<?= $category["id"] ?>" class="btn btn-danger mr-1"><i class="far fa-trash-alt"></i> Hapus</a>
                </td>
            </tr>
        <?php endforeach ?>
    </table>
</div>