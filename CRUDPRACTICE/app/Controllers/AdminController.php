<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\AdminModel;

class AdminController extends BaseController
{
    protected $adminModel;

    public function __construct()
    {
        $this->adminModel = new AdminModel();
    }
    public function index()
    {
        //
    }

    public function adminLoginView()
    {
        return view('adminLogin');
    }

    public function createAdminAccount()
    {
        return view('adminCreateAccount');
    }

    public function registerAdmin()
    {
        //get the form info
        // get the password first and hash it
        $password =  $this->request->getPost('password');
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $data = [
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'password' => $hashedPassword
        ];

        try {
            if ($data) {
                $this->adminModel->insert($data);
                return redirect()->to('/')->with('adminSuccess', 'Admin account Creation Successful');
            } else {
                return redirect()->back()->with('inc', 'Incomplete Admin Credentials');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('wrong', 'Something went wrong' . $e->getMessage());
        }
    }

    public function adminLanding()
    {
        return view('adminLanding');
    }

    public function adminLogin()
    {
        // get form data
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        //validate and compare data to the users table in the database
        $admin = $this->adminModel->where('email', $email)->first();
        if ($admin) {
            if (password_verify($password, $admin['password'])) {
                //if correct, store session data
                $session = session();
                $session->set([
                    'id' => $admin['id'],
                    'username' => $admin['username'],
                    'isLoggedIn' => true
                ]);
                return redirect()->to('/adminLanding')->with('loginSuccessAdmin', 'Admin Login Successful!');
            } else {
                return redirect()->back()->with('failed', 'Login Failed, Try Again');
            }
        } else {
            return redirect()->back()->with('error', 'Account not found');
        }
    }
}
