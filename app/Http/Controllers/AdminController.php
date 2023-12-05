<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;
use App\Models\Admin;

class AdminController extends Controller
{

    public function showLoginForm(){
        return view('login');
    }

    public function login(Request $request){
        $email = $request->input('email');
        $password = $request->input('password');

        // Recupera o usuário com base no e-mail
        $admin = Admin::where('email', $email)->first();

        // Verifica se o usuário existe e a senha está correta
        if ($admin && Hash::check($password, $admin->senha)) {
            // Autentica o usuário e redireciona para a tela inicial
            Auth::guard('admin')->login($admin);
            return redirect('/home')->withCookie(cookie('userType', 'admin'));
        }

        // Se o login falhar, redirecione de volta com uma mensagem de erro
        return redirect()->back()->withErrors(['error' => 'Credenciais inválidas']);
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/')->withCookie(cookie()->forget('userType'));
    }
}
