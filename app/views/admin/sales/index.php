<?php include_once(VIEWS . 'header.php')?>
<div class="card p-4 bg-light">
    <div class="card-header">
        <h1 class="text-center">Administración de Ventas</h1>
    </div>
    <div class="card-body">
        <table class="table text-center" width="100%">
            <thead>
            <th>Usuario</th>
            <th>Producto/s</th>
            <th>Fecha</th>
            <th>Detalles</th>
            </thead>
            <tbody>
            <?php foreach ($data['sales'] as $sales): ?>
                <tr>
                    <td class="text-center"><?= $sales->user_name ?></td>
                    <td class="text-center"><?= $sales->product_name ?></td>
                    <td class="text-center"><?= $sales->date ?></td>
                    <td class="text-center"><a href="<?= ROOT ?>adminSales/details/<?= $sales->user_id ?>/<?= $sales->date ?>" class="btn btn-info">Detalles</a></td>

                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?php include_once(VIEWS . 'footer.php')?>
