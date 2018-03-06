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
            case 'all':
                $this->all();
            break;
            case 'delete':
                $this->delete();
            break;
            default:
                $this->displayError(400, "No existe la acción $action");
                break;
            }
        } else $this->displayError(404, 'La creación de usuarios solo permite el método POST');
    }
    private function create() {
        if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['phone'])) {
            $query = 'SELECT * FROM users WHERE email=?';
            $statement = $this->cnx->prepare($query);
            if($statement->execute(array($_POST['email']))){
                $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                if($count[0]) $this->displayError(0, 'Ya hay un usuario creado con ese email');
                else {
                    $password = md5($_POST['password']);
                    $query = 'INSERT INTO users SET name=:nombre, email=:email, password=:password, phone=:telefono';
                    $sentence = $this->cnx->prepare($query);
                    $sentence->bindParam(':nombre', $_POST['name']);
                    $sentence->bindParam(':email', $_POST['email']);
                    $sentence->bindParam(':password', $password);
                    $sentence->bindParam(':telefono', $_POST['phone']);
                    if($sentence->execute()) {
                        $this->response = array(
                            'status' => 200,
                            'message' => 'Usuario creado con éxito'
                        );
                    } else $this->displayError(400, 'Error al ingresar el usuario');
                }
            }
        } else $this->displayError(400, 'Todos los campos son requeridos');
    }
    private function login () {
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
                } else $this->displayError(0, 'credenciales incorrectos');
            } else $this->displayError(400, 'Errror al hacer el login');
        }
    }
    private function all() {
        $statement = $this->cnx->prepare('SELECT * FROM users');
        if($statement->execute()) {
            $this->response = array(
                'status' => 200,
                'data' => $statement->fetchAll(PDO::FETCH_ASSOC)
            );
        }
    }
    private function delete() {
        $statement = $this->cnx->prepare('DELETE FROM users');
        if($statement->execute()) {
            $this->response = array(
                'status' => 200,
                'message' => 'Registros borrados con éxito'
            );
        } else $this->displayError(400, 'Error al borrar los registros');
    }
    private function displayError($status, $message) {
        $this->response = array(
            'status' => 400,
            'message' => $message
        );
    }
}
