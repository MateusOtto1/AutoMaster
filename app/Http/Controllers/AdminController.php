<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;
use App\Models\Admin;
use Illuminate\Support\Facades\Mail;

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
        return redirect('/')->with('msg', 'Credenciais inválidas');
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/')->withCookie(cookie()->forget('userType'));
    }

    public function show(){
        return view('enviaCodigo');
    }

    public function sendCode(){
        $email = 'ottomateus5@gmail.com';

        // Recupera o usuário com base no e-mail
        $admin = Admin::where('email', $email)->first();

        // Verifica se o usuário existe
        if ($admin) {
            // Gera um código aleatório
            $codigo = strval(mt_rand(100000, 999999));
            // Salva o código no banco de dados
            $admin->codigo = $codigo;
            $admin->save();

            // Redireciona para a tela de login
            return redirect('/verifica/codigo')->with('msg', 'Código enviado para o e-mail cadastrado');
        }
        // Se o login falhar, redirecione de volta com uma mensagem de erro
        return redirect('/')->with('msg', 'E-mail não cadastrado');
    }

    public function showCodeForm(){
        return view('esqueceuSenha');
    }

    public function verifyCode(Request $request)
    {
        $codigo = $request->input('codigo');

        // Recupera o usuário com base no código
        $admin = Admin::where('codigo', $codigo)->first();

        // Verifica se o usuário existe
        if ($admin) {
            // Redireciona para a tela de login
            return redirect('/altera/senha/'.$codigo);
        }
        // Se o login falhar, redirecione de volta com uma mensagem de erro
        return redirect('/verifica/codigo')->with('msg', 'Código inválido');
    }

    public function showPasswordForm(){
        return view('alteraSenha');
    }

    public function changePassword(Request $request, $codigo)
    {
        $password = $request->input('password');
        $confirmacao = $request->input('confirmacao');

        // Verifica se a senha e a confirmação são iguais
        if ($password != $confirmacao) {
            return redirect('/altera/senha/'.$codigo)->with('msg', 'As senhas não conferem');
        }

        // Recupera o usuário com base no código
        $admin = Admin::where('codigo', $codigo)->first();

        // Verifica se o usuário existe
        if ($admin) {
            // Altera a senha do usuário
            $admin->senha = Hash::make($password);
            $admin->codigo = null;
            $admin->save();

            // Redireciona para a tela de login
            return redirect('/')->with('msg', 'Senha alterada com sucesso');
        }
        // Se o login falhar, redirecione de volta com uma mensagem de erro
        return redirect('/altera/senha/'.$codigo)->with('msg', 'Código inválido');
    }

}
