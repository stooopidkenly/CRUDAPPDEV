<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\AdminModel;
use App\Models\UserModel;

class AdminController extends BaseController
{
    protected $adminModel;
    protected $userModel;

    public function __construct()
    {
        $this->adminModel = new AdminModel();
        $this->userModel = new UserModel();
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

    public function createFromAdmin()
    {
        return view('createUserFromAdmin');
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
                    'role' => 'admin',
                    'isLoggedIn' => true
                ]);
                return redirect()->to('/admin/landing')->with('loginSuccessAdmin', 'Admin Login Successful!');
            } else {
                return redirect()->back()->with('failed', 'Login Failed, Try Again');
            }
        } else {
            return redirect()->back()->with('error', 'Account not found');
        }
    }

    public function getAllUsers()
    {
        try {
            $users = $this->userModel->findAll();
            // Laging mag-return ng view kahit empty
            return view('showUsers', ['users' => $users]);
        } catch (\Exception $e) {
            return redirect()->to('/admin/landing')
                ->with('somethingWentWrong', 'Something Went Wrong: ' . $e->getMessage());
        }
    }

    public function deleteUser($id = null)
    {
        $userModel = new \App\Models\UserModel();

        if ($id && $userModel->find($id)) {
            $userModel->delete($id);
            return redirect()->to('/admin/showUsers')->with('success', 'User deleted successfully.');
        }

        // Kung invalid id, balik lang sa showUsers (wag sa landing para di mag-loop)
        return redirect()->to('admin.landing')->with('error', 'User ID not found.');
    }


    public function banUser($id = null)
    {

        if ($id) {
            //ban user
        }
    }

    public function unbanUser($id = null)
    {

        if ($id) {
            //unban
        }
    }
}
