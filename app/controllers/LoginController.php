<?php

class LoginController extends Controller
{
    private $model;

    public function __construct()
    {
        $this->model = $this->model('Login');
    }

    public function index()
    {
        $data = [
            'titulo' => 'Login',
            'menu'   => false,
        ];

        $this->view('login', $data);
    }

    public function olvido()
    {
        print 'Estoy en olvido';
    }

    public function registro()
    {
        $errors=[];
        $dataForm = [];

        //SI estoy entrando por el post, es decir, enviando los datos del formulario
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //procesamos la informacion recibida
            $fisrtName = $_POST['fistName'] ?? '';//si exite lo que hay en $_POST['fist_name'] pongo eso si no exite ''
            $lastName_1 = $_POST['lastName_1'] ?? '';
            $lastName_2 = $_POST['lastName_2'] ?? '';
            $email = $_POST['email'] ?? '';
            $password1 = $_POST['password1'] ?? '';
            $password2 = $_POST['password2'] ?? '';
            $address = $_POST['address'] ?? '';
            $city = $_POST['city'] ?? '';
            $state = $_POST['state'] ?? '';
            $postcode = $_POST['postcode'] ?? '';
            $country = $_POST['country'] ?? '';

            $dataForm = [
                'firstName' => $fisrtName,
                'lastName_1' => $lastName_1,
                'lastName_2' => $lastName_2,
                'email' => $email,
                'password1' => $password1,
                'password2' => $password2,
                'address' => $address,
                'city' => $city,
                'state' => $state,
                'postcode' => $postcode,
                'country' => $country
            ];

            if($fisrtName == ''){
                array_push($errors,'El nombre es requerido');
            }
            if($lastName_1 == ''){
                array_push($errors,'El primer apellido es requerido');
            }
            if($lastName_2 == ''){
                array_push($errors,'El segundo apellido es requerido');
            }
            if($email == ''){
                array_push($errors,'El email es requerido');
            }
            if($password1 == ''){
                array_push($errors,'La contraseña es requerida');
            }
            if($password2 == ''){
                array_push($errors,'Repetir contraseña es requerido');
            }
            if($address == ''){
                array_push($errors,'La direccion es requerida');
            }
            if($city == ''){
                array_push($errors,'La ciudad es requerida');
            }
            if($state == ''){
                array_push($errors,'La provincia es requerida');
            }
            if($postcode == ''){
                array_push($errors,'El codigo postal es requerido');
            }
            if($country == ''){
                array_push($errors,'El pais es requerido');
            }
            if($password1!=$password2){
                array_push($errors,'Las contraseñas deben ser iguales');
            }

            if(count($errors) == 0){
                print 'Pasamos a dar de alta al usuario en la base de datos';
            }else{
                //var_dump($errors);
                $data = [
                    'titulo' => 'Registro',
                    'menu'   => false,
                    'errors' => $errors,
                    'dataform' => $dataForm
                ];
            }

        }else{ //Si estoy entrando por el get, es decir, clickando desde el login en "nuevo usuario"
            //Mostramos el formulario
            $data = [
                'titulo' => 'Registro',
                'menu'   => false,
            ];
        }



        $this->view('register', $data);
    }
}