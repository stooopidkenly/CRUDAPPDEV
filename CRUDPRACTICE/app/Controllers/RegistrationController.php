<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;

class RegistrationController extends BaseController
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

    public function registerView()
    {
        return view('registration');
    }

    public function registerAccount()
    {

        //get the password
        $password = $this->request->getPost('password');
        //hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        //find email if existing
        $email = $this->request->getPost('email');
        $findEmail = $this->userModel->where('email', $email)->first();
        if ($findEmail) {
            return redirect()->back()->with('existing', 'Email Already Exists!!');
        } else {
            //get the other form data
            //use associative array to store the data
            $data = [
                'firstname' => $this->request->getPost('firstname'),
                'middlename' => $this->request->getPost('middlename'),
                'lastname' => $this->request->getPost('lastname'),
                'email' => $email,
                'password' => $hashed_password
            ];
        }
        //insert the data
        try {
            if ($data) {
                $this->userModel->insert($data);
                return redirect('/')->with('completed', 'Account Creation Successful');
            } else {
                return redirect()->back()->with('incomplete', 'Data Submitted is Incomplete, Try Again');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong' . $e->getMessage());
        }
    }
}
