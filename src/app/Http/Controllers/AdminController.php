<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $contacts = Contact::with('category')->get();

        $categories = Category::all();

        return view('index', compact('contacts', 'categories'));

    }

    public function search(Request $request)
{
 
  $contacts = Contact::with('category')->ContactSearch($request)->get();
  $categories = Category::all();
  return view('index', compact('contacts', 'categories'));
}
}
