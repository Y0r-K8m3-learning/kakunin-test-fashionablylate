<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterUserRequest;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use App\Models\Contact;
use App\Models\Gender;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

        public function index()
        {
            return view('auth.login');

        }
        public function login(LoginRequest $request)
        {
            $credentials = $request->only('email', 'password');
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();

                // ログイン後のリダイレクト先を設定
                if ($request->session()->has('url.intended')) {
                    return redirect()->intended();
                }

                  $contacts = Contact::with('category')->paginate(7);;

            $categories = Category::all();

            $genders = Gender::genders;

            return view('admin', compact('contacts', 'categories','genders' ));


                return redirect()->intended('/admin'); // デフォルトのリダイレクト先
            }

                        
          
        }

        // 追加機能
        public function store(RegisterUserRequest $request)
        {
            $form = $request->all();
            User::create($form);
            return redirect('/');
        }
}
