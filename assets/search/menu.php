<?php


require_once __DIR__ . '/../../DB/Connection.php';
require_once __DIR__ . '/../../Model/Model.php';
require_once __DIR__ . '/../../Model/Item.php';

$keyword = $_GET['keyword'];
$items = new Item();
$items = $items->search($keyword);


?>

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
            <th>ID</th>
            <th>Waktu</th>
            <th>Aksi</th>
        </tr>
        <?php foreach ($items as $item): ?>
            <tr>
                <td class="p-0 text-center">
                    <div class="custom-checkbox custom-control">
                        <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-1">
                        <label for="checkbox-1" class="custom-control-label">&nbsp;</label>
                    </div>
                </td>
                <td><?= $item["name"] ?></td>
                <td><img src="../public/img/items/<?= $item["attachment"] ?>" width="50"></td>
                <td><?= $item["price"] ?></td>
                <td><?= $item["category_id"] ?></td>
                <td><?= $item["created_at"] ?></td>
                <td>
                    <a href="index.php?id=<?= $item['id'] ?>" class="btn btn-primary mr-2"><i class="fas fa-info-circle"></i></a>
                    <a href="index.php?id=<?= $item['id'] ?>" class="btn btn-success mr-2"><i class="fas fa-edit"></i></a>
                    <a href="index.php?id=<?= $item['id'] ?>" class="btn btn-danger mr-2"><i class="fas fa-trash-alt"></i></a>
                </td>
            </tr>
        <?php endforeach ?>
    </table>
</div>
</div>