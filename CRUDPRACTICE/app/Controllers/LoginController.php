<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;

class LoginController extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }
    public function index()
    {
        //
    }

    public function loginView()
    {
        return view('login');
    }

    public function login()
    {
        //get form data
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        //validate and compare data to the users table in the database
        $user = $this->userModel->where('email', $email)->first();
        if ($user) {
            if (password_verify($password, $user['password'])) {
                //if correct, store session data
                $session = session();
                $session->set([
                    'firstname' => $user['firstname'],
                    'middlename' => $user['middlename'],
                    'lastname' => $user['lastname'],
                    'isLoggedIn' => true
                ]);
                return redirect()->to('/landing')->with('loginSuccess', 'Login Successful!');
            } else {
                return redirect()->back()->with('failed', 'Login Failed, Try Again');
            }
        } else {
            return redirect()->back()->with('error', 'Account not found');
        }
    }
}
