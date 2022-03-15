<?php

namespace App\Controllers;

class Login extends BaseController
{
    public function login()
    {
        echo view('templates/header');
		echo view('pages/login');
		echo view('templates/footer');
    }
	
	public function register()
    {
		$modelUsers = model(UsersModel::class);
		
		if ($this->request->getMethod() === 'post' && $this->validate([
			'username' => 'required|max_length[80]|is_unique[users.username]',
			'email' => 'required|valid_email|is_unique[users.email]',
			'password' => 'required|max_length[100]',
			'repeat' => 'required|matches[password]'
		])){
			$modelUsers->save([
				'username' => $this->request->getPost('username'),
				'email' => $this->request->getPost('email'),
				'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
				'created_at' => date('y-m-d'),
			]);
			
			return redirect()->to('/home');
		} else {
			echo view('templates/header');
			echo view('pages/register');
			echo view('templates/footer');
		}
    }
}