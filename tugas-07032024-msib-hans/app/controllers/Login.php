<?php
class login extends Controller
{
    public function __construct()
    {
        if (isset($_SESSION['login'])) {
            header('Location: ' . BASE_URL . '/home');
        }
    }

    public function index()
    {
        $this->view('login');
    }

    public function login()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $data = $this->model('User_model')->getByUsername($username);

        //check data and password verify
        if (!empty($data)) {
            if (password_verify($password, $data['password'])) {
                $_SESSION['login']        = true;
                $_SESSION['username'] = $data['username'];
                $_SESSION['role'] = $data['role'];
                $_SESSION['id'] = $data['id'];
                header('Location: ' . BASE_URL . '/home');
            } else {
                header('Location: ' . BASE_URL . '/login');
            }
        } else {
            header('Location: ' . BASE_URL . '/login');
        }

        // Pass $data to login.php
        $this->view('login', $data);
    }

    public function register()
    {
        $this->view('register');
    }

    public function registers()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $password = password_hash($password, PASSWORD_DEFAULT);
        $role = 'user';
        $data = $this->model('User_model')->register($username, $password, $role);
        if ($data) {
            header('Location: ' . BASE_URL . '/login');
        } else {
            header('Location: ' . BASE_URL . '/login/register');
        }
    }

    public function logout()
    {
        unset($_SESSION['login']);
        session_destroy();
        header('Location: ' . BASE_URL . '/login');
    }
}
