<?php
class Mail {
    public $response;
    function __construct() {
        header('Allow-Methods: POST');
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method == 'POST') {

        } else $this->displayError('Los mails solo se permiten por método post');
    }
    private function displayError($message) {
        $this->response = array(
            'status' => 400,
            'message' => $message
        );
    }
}