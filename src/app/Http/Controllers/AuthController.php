<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterUserRequest;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use App\Models\Contact;
use App\Models\Gender;
use App\Models\Category;
use Illuminate\Http\Request;

class AuthController extends Controller
{
        public function index()
        {
            return view('auth.login');

        }
        public function login(LoginRequest $request)
        {
            $contacts = Contact::with('category')->paginate(7);;

            $categories = Category::all();

            $genders = Gender::genders;

            return view('admin', compact('contacts', 'categories','genders' ));

        }

        // 追加機能
        public function store(RegisterUserRequest $request)
        {
            $form = $request->all();
            User::create($form);
            return redirect('/');
        }
}
