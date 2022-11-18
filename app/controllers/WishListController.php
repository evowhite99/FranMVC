<?php

class WishListController extends Controller
{
    private $model;

    public function __construct()
    {
        $this->model = $this->model('WishList');
    }

    public function index()
    {
        $session = new Session();

        if($session->getLogin()){
            $user_id = $session->getUserId();
            $wishList = $this->model->getWishList();

            $data = [
                'titulo' => 'Lista de Deseos',
                'menu' => true,
                'subtitle' => 'Lista de Deseos',
                'active' => 'wishList',
                'user_id' => $user_id,
                'data' => $wishList,

            ];
            $this->view('wishList/index', $data);
        } else{
            header('location:' . ROOT . 'login');
        }



    }

    public function delete($product, $user)
    {
        $errors = [];

        if( ! $this->model->delete($product, $user)) {
            array_push($errors, 'Error al borrar el registro de la lista de deseos');
        }

        $this->index($errors);
    }

    public function addProduct($product_id, $user_id)
    {
        $session = new Session();
        $errors = [];

        if ($this->model->verifyProduct($product_id, $user_id) == false) {
            if ($this->model->addProduct($product_id, $user_id) == false) {
                array_push($errors,'Error al insertar el producto en la base de datos');
            }
        }

        $data=[
            'titulo' => 'Producto añadido con éxito',
            'product_id' => $product_id,
            'menu' => true,
            'errors' => $errors,
        ];

        $this->view('wishList/message',$data);
    }
}