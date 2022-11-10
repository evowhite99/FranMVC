<?php include_once(VIEWS . 'header.php')?>
<div class="card p-4 bg-light">
    <div class="card-header">
        <h1 class="text-center">Administración de Ventas</h1>
    </div>
    <div class="card-body">
        <table class="table text-center" width="100%">
            <thead>
            <!--<th>Id</th>-->
            <th>Usuario(id)</th>
            <!--<th>Detalles de Compra</th>-->
            <!--<th>Precio Total</th>-->
            <th>Fecha</th>
            </thead>
            <tbody>
            <?php foreach ($data['sales'] as $sales): ?>
                <tr>
                    <!--<td class="text-center"><?= $sales->id ?></td>-->
                    <td class="text-center"><?= $sales->user_id ?></td>
                    <!--<td class="text-center"><?= html_entity_decode($sales->details) ?></td>-->
                    <!--<td class="text-center"><?= $sales->total_price ?></td>-->
                    <td class="text-center"><?= $sales->date ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?php include_once(VIEWS . 'footer.php')?>
