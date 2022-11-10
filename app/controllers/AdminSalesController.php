<?php

class AdminSalesController extends Controller
{
    private $model;

    public function __construct()
    {
        $this->model = $this->model('AdminSales');
    }
    public function index()
    {
        $session = new AdminSession();

        if ($session->getLogin()) {

            $sales = $this->model->getSales();

            $data = [
                'titulo' => 'Administración de Productos',
                'menu' => false,
                'admin' => true,
                'sales' => $sales,
            ];

            $this->view('admin/sales/index', $data);

        } else {
            header('location:' . ROOT . 'admin');
        }
    }
}