<?php Flasher::flash(); ?>
<header>
    <h1>Voucher</h1>
</header>
<table>
    <tr>
        <th>Provider</th>
        <th>Kuota</th>
        <th>Harga</th>
        <th>Stok</th>
        <th>Input</th>
    </tr>
    <?php
    $arrayForTable = [];
    foreach ($data['voucher'] as $databaseValue) {
        $temp = [];
        $temp['id'] = $databaseValue['id'];
        $temp['kuota'] = $databaseValue['kuota'];
        $temp['harga'] = $databaseValue['harga'];
        $temp['stok'] = $databaseValue['stok'];
        if (!isset($arrayForTable[$databaseValue['provider']])) {
            $arrayForTable[$databaseValue['provider']] = [];
        }
        $arrayForTable[$databaseValue['provider']][] = $temp;
    }
    ?>
    <?php foreach ($arrayForTable as $id => $values) :
        foreach ($values as $key => $value) : ?>
            <tr>
                <?php if ($key == 0) : ?>
                    <td class="prov" rowspan="<?= count($values); ?>"><?= $id; ?></td>
                <?php endif; ?>
                <td><?= $value['kuota']; ?></td>
                <td><?= $value['harga']; ?></td>
                <td><?= $value['stok']; ?></td>
                <td><button type="button" onclick="return confirm('Sure ?');"><a href="<?= BASEURL; ?>/voucher/drop/<?= $value['id']; ?>">Delete</a></button></td>
            </tr>
        <?php endforeach;
    endforeach; ?>
</table>

<h2>Input Data Voucher</h2>
<form action="<?= BASEURL; ?>/voucher/input" method="post">
    Provider:<br>
    <input type="text" name="insert_provider" value="">
    <br>
    Kuota:<br>
    <input type="text" name="insert_kuota" value="">
    <br>
    Harga:<br>
    <input type="number" name="insert_harga" value="">
    <br>
    Stok<br>
    <input type="number" name="insert_stok" value="">
    <br><br>
    <input type="submit" value="Submit">
</form>