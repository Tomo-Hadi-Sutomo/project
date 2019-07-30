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
        <th colspan="2">Input</th>
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
                <td><a href="<?= BASEURL; ?>/voucher/drop/<?= $value['id']; ?>"><button type="button" onclick="return confirm('Are you sure ?');">Delete</button></a></td>
                <td><a href="#ex1" rel="modal:open"><button class="modalUbah" data="<?php echo $value['id']; ?>">Edit</button></a></td>
            </tr>
        <?php endforeach;
    endforeach; ?>
</table>

<div class="btn">
    <a href="#ex1" rel="modal:open"><button class="myBtn modalInput">Add Table</button></a>
</div>

<!-- Modal HTML embedded directly into document -->
<div id="ex1" class="modal">
    <h2 class="label">Input Data Voucher</h2>
    <form action="<?= BASEURL; ?>/voucher/input" method="post">
        <input type="hidden" name="insert_id" id="id">
        Provider:<br>
        <input type="text" name="insert_provider" autocomplete="off" id="provider">
        <br>
        Kuota:<br>
        <input type="text" name="insert_kuota" autocomplete="off" id="kuota">
        <br>
        Harga:<br>
        <input type="number" name="insert_harga" autocomplete="off" id="harga">
        <br>
        Stok<br>
        <input type="number" name="insert_stok" autocomplete="off" id="stok">
        <br><br>
        <button type="submit">Submit</button>
    </form>
</div>