<?php

namespace App\Controllers;

use App\Models\UserModel;

class Main extends BaseController
{
    public function __construct()
    {
        helper(['url', 'form']);
    }
    public function index()
    {
        // Check if the user is authenticated (logged in)
        if ($this->authenticated()) {
            return redirect()->to('admin/dashboard'); // Redirect to the dashboard or another page
        }
        return view('index');
    }
    private function authenticated(): bool
    {
        $session = session();

        return $session->has('logged_in') && $session->get('logged_in') === TRUE;
    }
    public function auth()
    {
        $validation = $this->validate([
            'username' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Username is Required'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[5]|max_length[12]',
                'errors' => [
                    'required' => 'Password is Required',
                    'min_length' => 'Password must have at least 5 characters',
                    'max_length' => 'Password must not exceed 12 characters'
                ]
            ]
        ]);

        if (!$validation) {
            return view('index', ['validation' => $this->validator]);
        }

        $session = session();
        $model = new UserModel;
        $req_username = $this->request->getPost('username');
        $req_password = $this->request->getPost('password');

        // Check if the user exists
        $data = $model->where('username', $req_username)->first();

        if ($data !== null) {
            $password = $data['password'];

            if ($password == $req_password) {
                $sess_data = [
                    'id' => $data['id'],
                    'username' => $data['username'],
                    'password' => $data['password'],
                    'logged_in' => TRUE
                ];
                $session->set($sess_data);
                return redirect()->to('admin/dashboard');
            }
        }


        $session->setFlashdata('fail', 'Incorrect Username or Password');
        return redirect()->to('/main')->withInput();
    }

    public function logout()
    {
        if (session()->has('logged_in')) {
            session()->remove('logged_in');
            return redirect()->to('/main')->with('fail', 'You are Logged out');
        }
    }
}
