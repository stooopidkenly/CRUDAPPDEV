<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;

class FunctionController extends BaseController
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

    public function edit()
    {
        //show prefilled data, pass the array into the view!!!
        $session = session();
        $id = $session->get('id');

        if (!$id) {
            return redirect()->to('/login')->with('error', 'Please login first.');
        }

        $user = $this->userModel->find($id);
        //dd($user);
        return view('editInfo', ['user' => $user]);
    }

    public function editInfo()
    {
        //get the updated form info
        $session = session();
        $id = $session->get('id');

        // if id is not found, redirect
        if (!$id) {
            return redirect('/')->with('nosessionID', 'Log in First!');
        }

        // Check if email is used by another user
        $email = $this->request->getPost('email');
        $findEmail = $this->userModel
            ->where('email', $email)
            ->where('id !=', $id)
            ->first();
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
            ];
        }

        //only if the user changes his password
        if ($this->request->getPost('password')) {
            $data['password'] = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
        }

        $this->userModel->update($id, $data);

        //set new session 
        $session = session();
        $session->set([
            'firstname' => $data['firstname'],
            'middlename' => $data['middlename'],
            'lastname' => $data['lastname'],
            'email' => $data['email'],
        ]);
        return redirect()->to('/landing')->with('updated', 'Account Credentials Updated');
    }
}
