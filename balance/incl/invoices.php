<?php
$result = $db->simpleQuery("SELECT * FROM balance_transactions WHERE userid='" . $params->user . "' AND positive=0 ORDER BY id DESC");
if ($result->num_rows == 0) {
    $null = true;
}
?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header" data-background-color="<?= $db->getConfig()['color'] ?>">
                <h4 class="title">Invoice listing</h4>
            </div>
            <div class="card-content table-responsive">
                <table class="table">
                    <thead class="text-primary">
                    <tr>
                        <th>Order id</th>
                        <th>Price</th>
                        <th>Date</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?= $null ? "No Records found!" : ""; ?>
                        <?php
                        while ($row = $result->fetch_object()):
                        ?>
                        <tr>
                            <td><?= $row->id ?></a></td>
                            <td><?= $row->price?>€</td>
                            <td><?= $row->createdate ?></td>
                            <td><a href="module.php?module=balance/invoice.php&params=id|<?= $row->id ?>"><i
                                            class="material-icons">open_in_new</i></a></td>
                        </tr>
                        <?php
                        endwhile;
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>