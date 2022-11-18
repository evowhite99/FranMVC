<?php include_once dirname(__DIR__) . ROOT . 'header.php'?>
   <h2 class="text-center"><?= $data['subtitle'] ?></h2>
    <img src="<?= ROOT ?>img/<?= $data['data']->image ?>" class="rounded float-right" alt="">
    <h4>Precio:</h4>
    <p><?= number_format($data['data']->price, 2) ?>€</p>
    <?php if($data['data']->type == 1): ?>
        <h4>Descripción:</h4>
        <p><?= html_entity_decode($data['data']->description) ?></p>
        <h4>A quien va dirigido:</h4>
        <p><?= $data['data']->people ?></p>
        <h4>Objetivos:</h4>
        <p><?= $data['data']->objetives ?></p>
        <h4>¿Qué es necesario conocer?</h4>
        <p><?= $data['data']->necesites ?></p>
    <?php elseif($data['data']->type == 2): ?>
        <h4>Autor:</h4>
        <p><?= $data['data']->author ?></p>
        <h4>Editorial:</h4>
        <p><?= $data['data']->publisher ?></p>
        <h4>Número de páginas:</h4>
        <p><?= $data['data']->pages ?></p>
        <h4>Resumen:</h4>
        <?= html_entity_decode($data['data']->description) ?>
    <?php endif; ?>
    <a href="<?= ROOT . (!empty($data['back']) ? $data['back'] : 'shop') ?>" class="btn btn-success">Volver al listado de productos</a>
    <?php if(isset($data['user_id'])) : ?>
    <a href="<?= ROOT ?>cart/addproduct/<?= $data['data']->id ?>/<?= $data['user_id'] ?>" class="btn btn-primary">Comprar</a>
    <a href="<?= ROOT ?>wishList/addproduct/<?= $data['data']->id ?>/<?= $data['user_id'] ?>" class="ms-3"><svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
            <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
        </svg></a>
    <?php else :?>
    <a href="<?= ROOT ?>login" class="btn btn-primary">Comprar</a>
    <?php endif; ?>

    <?php include_once dirname(__DIR__) . ROOT . 'footer.php'?>