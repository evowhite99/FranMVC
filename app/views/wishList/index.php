<?php include_once(VIEWS . 'header.php') ?>
<?php $verify = false; $subtotal = 0; $send = 0; $discount = 0; $user_id = $data['user_id'] ?>
<h2 class="text-center"><?= $data['subtitle'] ?></h2>
<form action="<?= ROOT ?>cart/update" method="POST">
    <table class="table table-stripped" width="100%">
        <tr>
            <th width="12%">Producto</th>
            <th width="46%">Descripción</th>
            <th width="4%">Precio</th>
            <th width="1%">&nbsp;</th>
            <th width="1%">Eliminar</th>
            <th width="10%">Añadir al Carrito</th>
        </tr>
        <?php foreach ($data['data'] as $key => $value): ?>
            <tr>
                <td><img src="<?= ROOT ?>img/<?= $value->image ?>" width="105" alt="<?= $value->name ?>"></td>
                <td>
                    <b><?= $value->name ?></b>
                    : <?= substr(html_entity_decode($value->description),0, 200) ?>
                </td>
                <td class="text-end"><?= number_format($value->price, 2) ?> &euro;</td>
                <td>&nbsp;</td>
                <td class="text-end">
                    <a href="<?= ROOT ?>wishList/delete/<?= $value->product_id ?>/<?= $data['user_id'] ?>"
                       class="btn btn-danger"
                    >Eliminar</a>
                </td>
                <td class="text-end">
                    <a href="<?= ROOT ?>cart/addProduct/<?= $value->product_id ?>/<?= $data['user_id'] ?>"
                       class="btn btn-success me-4"
                    >Añadir</a>
                </td>
            </tr>

        <?php endforeach; ?>

        <input type="hidden" name="rows" value="<?= count($data['data']) ?>">
        <input type="hidden" name="user_id" value="<?= $data['user_id'] ?>">
    </table>


</form>
<?php include_once(VIEWS . 'footer.php') ?>
