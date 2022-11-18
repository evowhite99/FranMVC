<?php include_once(VIEWS . 'header.php') ?>
    <div class="alert alert-success" role="alert">
        Producto añadido a la lista de deseos!!
    </div>

    <a href="<?= ROOT ?>shop/show/<?= $data['product_id'] ?>" class="btn btn-success" role="button">Regresar</a>

</div>

<?php include_once(VIEWS . 'footer.php') ?>
