<?php
class Usuario {
    private $cnx;
    public $response;
    public function __construct($cnx, $action) {
        header('Allow-Methods: POST');
        $this->cnx = $cnx;
        $method = $_SERVER['REQUEST_METHOD'];
        if($method == 'POST') {
            switch ($action) {
                case 'create':
                $this->create();
                break;
            case 'login':
                $this->login();
                break;
            default:
                $this->displayError("No existe la acción $action");
                break;
            }
        } else $this->displayError('La creación de usuarios solo permite el método POST');
    }
    private function create() {
        if (isset($_POST['name']) && isset($_POST['lastName']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['phone'])) {
            $password = md5($_POST['password']);
            $query = 'INSERT INTO users SET name=:nombre, last_name=:apellido, email=:email, password=:password, phone=:telefono';
            $sentence = $this->cnx->prepare($query);
            $sentence->bindParam(':nombre', $_POST['name']);
            $sentence->bindParam(':apellido', $_POST['lastName']);
            $sentence->bindParam(':email', $_POST['email']);
            $sentence->bindParam(':password', $password);
            $sentence->bindParam(':telefono', $_POST['phone']);
            if($sentence->execute()) {
                $this->response = array(
                    'status' => 200,
                    'message' => 'Usuario creado con éxito'
                );
            } else $this->displayError('Error al ingresar el usuario');
        } else $this->displayError('Todos los campos son requeridos');
    }
    public function login () {
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $query = 'SELECT * FROM users WHERE email=?';
        $statement = $this->cnx->prepare($query);
        if($statement->execute(array($email))) {
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            if(isset($result[0])) {
                if(hash_equals($password,$result[0]['password'])) {
                    $this->response = array(
                        'status' => 200,
                        'message' => 'Bienvenido',
                        'userData' => $result
                    );
                } else $this->displayError('credenciales incorrectos');
            } else $this->displayError('credenciales incorrectos');
        }
    }
    private function displayError($message) {
        $this->response = array(
            'status' => 400,
            'message' => $message
        );
    }
}
