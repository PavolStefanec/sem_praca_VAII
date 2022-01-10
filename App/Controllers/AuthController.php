<?php
namespace App\Controllers;
use App\Auth;
use App\Core\Responses\Response;
use App\Models\Users;

class AuthController extends AControllerRedirect
{
    /**
     * @inheritDoc
     */
    public function index()
    {
        // TODO: Implement index() method.
    }

    public function loginForm()
    {
        return $this->html(
            [
                'error' => $this->request()->getValue('error'),
                'message'=> $this->request()->getValue('message')
            ]
        );
    }

    public function login() {
        $login = $this->request()->getValue('username');
        $password = $this->request()->getValue('password');

        if ($login == "" or $password == "") {
            $this->redirect('auth', 'loginForm', ['error' => 'Incorrect username or password!!!']);
        }
        $logged = Auth::login($login,$password);
        if ($logged) {
            $this->redirect('home');
        }
        else {
            $this->redirect('auth','loginForm',['error' => 'Incorrect username or password!!!']);
        }
    }

    public function logout()
    {
        Auth::logout();
        $this->redirect('home');
    }

    public function registration()
    {
        return $this->html(
            [
                'error' => $this->request()->getValue('error')
            ]
        );
    }

    public function createAccount()
    {
        $mail = $this->request()->getValue('mail');
        $name = $this->request()->getValue('name');
        $surname = $this->request()->getValue('surname');
        $userName = $this->request()->getValue('username');
        $password = $this->request()->getValue('password');

        if ($mail == "" or $name == "" or $surname == "" or $userName == "" or $password == "")
        {
            $this->redirect('auth', 'users', ['error'=>'One or more fields are empty!!!']);
            return;
        }

        if (Users::isTaken($mail))
        {
            $this->redirect('auth', 'users', ['error'=>'This email is already taken!!!']);
            return;
        }

        $newUser = new Users();
        $newUser->setName($name);
        $newUser->setMail($mail);
        $newUser->setSurname($surname);
        $newUser->setUserName($userName);
        $newUser->setPassword(password_hash($password, PASSWORD_DEFAULT));

        $newUser->save();

        $this->redirect('auth', 'loginForm', ['message'=>'Account succesfully created']);
    }
}