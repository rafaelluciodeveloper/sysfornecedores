<?php 
namespace App\Controllers;  
use CodeIgniter\Controller;
use App\Models\UserModel;
  
class Signin extends Controller
{
    public function index()
    {
        helper(['form']);
        echo view('login');
    } 
  
    public function login()
    {
        $session = session();
        $userModel = new UserModel();
        $email = $this->request->getVar('email');
        $senha = $this->request->getVar('password');
        
        $data = $userModel->where('email', $email)->first();
        
        if($data){
            $pass = $data['password'];
            $authenticatePassword = password_verify($senha, $pass);
            if($authenticatePassword){
                $ses_data = [
                    'id' => $data['id'],
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'isLoggedIn' => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('/');
            }else{
                $session->setFlashdata('msg', 'Incorrect password.');
                return redirect()->to('/signin');
            }
        }else{
            $session->setFlashdata('msg', 'E-mail does not exist.');
            return redirect()->to('/signin');
        }
    }

    public function logout(){
        session()->destroy();        
        return redirect()->to('/signin');
    }
}