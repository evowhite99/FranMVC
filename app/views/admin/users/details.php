<?php include_once(VIEWS . 'header.php')?>
<div class="card p-4 bg-light">
    <div class="card-header">
        <h1 class="text-center">Detalles</h1>
    </div>
    <div class="card-body">
        <form action="<?= ROOT ?>adminUser/details/<?= $data['data']->id ?>" method="POST">
            <div class="form-group text-left">
                <label for="email">Id:</label>
                <input type="email" name="email" class="form-control" disabled
                       value="<?= $data['data']->id ?? '' ?>"
                >
            </div>

            <div class="form-group text-left">
                <label for="name">Nombre Completo:</label>
                <input type="text" name="name" class="form-control" disabled
                       value="<?= $data['data']->first_name . ' ' . $data['data']->last_name_1  . ' ' . $data['data']->last_name_2 ?? '' ?>"
                >
            </div>
            <div class="form-group text-left">
                <label for="email">Correo Electrónico:</label>
                <input type="email" name="email" class="form-control" disabled
                       value="<?= $data['data']->email ?? '' ?>"
                >
            </div>

            <div class="form-group text-left">
                <label for="address">Dirección:</label>
                <input type="text" name="address" class="form-control" disabled
                       value="<?= $data['data']->address ?? '' ?>"
                >
            </div>

            <div class="form-group text-left">
                <label for="city">City:</label>
                <input type="text" name="city" class="form-control" disabled
                       value="<?= $data['data']->city ?? '' ?>"
                >
            </div>

            <div class="form-group text-left">
                <label for="state">State:</label>
                <input type="text" name="state" class="form-control" disabled
                       value="<?= $data['data']->state ?? '' ?>"
                >
            </div>

            <div class="form-group text-left">
                <label for="zipcode">Codigo Postal:</label>
                <input type="text" name="zipcode" class="form-control" disabled
                       value="<?= $data['data']->zipcode ?? '' ?>"
                >
            </div>

            <div class="form-group text-left">
                <label for="country">País:</label>
                <input type="text" name="country" class="form-control" disabled
                       value="<?= $data['data']->country ?? '' ?>"
                >
            </div>

            <div class="form-group text-left ">
                <a href="<?= ROOT ?>adminUser" class="btn btn-info">Regresar</a>
            </div>
        </form>
    </div>
    <div class="card-footer">

    </div>
</div>



<?php include_once(VIEWS . 'footer.php')?>
