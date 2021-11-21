<?php
namespace App\Controllers;
use App\Auth;
use App\Core\Responses\Response;
use App\Models\Registration;

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
        $logged = Auth::login($login,$password);
        if ($logged) {
            $this->redirect('home');
        } else if ($login == null and $password == null) {
            $this->redirect('auth', 'loginForm');
        } else {
            $this->redirect('auth','loginForm',['error' => 'bleeee']);
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
        if (Registration::isTaken($mail))
        {
            $this->redirect('auth', 'registration', ['error'=>'Error']);
        }

        $newUser = new Registration();
        $newUser->setName($name);
        $newUser->setMail($mail);
        $newUser->setSurname($surname);
        $newUser->setUserName($userName);
        $newUser->setPassword($password);

        $newUser->save();

        $this->redirect('auth', 'loginForm', ['message'=>'account succesfully created']);
    }
}