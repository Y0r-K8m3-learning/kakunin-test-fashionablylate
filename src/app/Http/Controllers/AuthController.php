<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
class AuthController extends Controller
{
        public function index()
        {
            return view('index');
        }

        // 追加機能
        public function store(RegisterUserRequest $request)
        {
            $form = $request->all();
            User::create($form);
            return redirect('/');
        }
}
