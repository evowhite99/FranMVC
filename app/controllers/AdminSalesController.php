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
                'active' => 'sales',
            ];

            $this->view('admin/sales/index', $data);

        } else {
            header('location:' . ROOT . 'admin');
        }
    }

    public function details($user_id,$date)
    {
        $session = new AdminSession();
        if ($session->getLogin()) {

            $date = strtr($date,['%20' => ' ']);
            $saleDetails = $this->model->getSaleDetails($user_id,$date);

            $data = [
                'titulo' => 'Carrito',
                'subtitle' => 'Detalles de compra',
                'menu' => false,
                'admin' => true,
                'sale_details' => $saleDetails,
            ];

            $this->view('admin/sales/details', $data);

        } else {
            header('location:' . ROOT . 'admin');
        }

    }


}