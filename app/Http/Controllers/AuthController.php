<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        //Валидация
        // $this->validate($request, [
        //     'name' => 'required',
        //     'email' => 'required|email|unique:users',
        //     'password' => 'required|min:6',
        // ]);

        User::create([
            // 'name' => $request->name,
            // 'email' => $request->email,
            'name' => 'Григорий',
            'email' => 'g.a.patr@bk.ru',
            'password' => bcrypt('g.a.patr@bk.ru'),
        ]);  

        $this->login($request);
        echo 'Account created successfully';
    }

    public function login(Request $request)
    {
        // валидация данных
        // $this->validate($request, [
        //     'email' => 'required|email',
        //     'password' => 'required',
        // ]);
    
        // аутентификация пользователя
        // auth()->attempt(['name'=>'Григорий','password'=>'g.a.patr@bk.ru']);
        // if (auth()->attempt(['name'=>'Григорий','password'=>'g.a.patr@bk.ru'])) {
        //     return redirect('/')->with('success', 'Авторизация прошла успешно');
        // }else echo 'плох';

        session(['email' => 'g.a.patr@bk.ru', 'name' => 'Григорий']);

        
        // return redirect()->back()->with('error', 'Invalid credentials');
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/')->with('success', 'выход прошел успешно');
    }
    
    public function loginpage()
    {
        return view('login');
    }
}
