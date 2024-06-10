<?php

namespace App\Http\Controllers;

use App\Models\Model;
use App\Models\Contact;
use App\Models\Gender;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin', compact('contacts', 'categories','genders'));

    }

    public function search(Request $request)
{
 
  $contacts = Contact::with('category')->ContactSearch($request)->paginate(7);
  
  $categories = Category::all();
  $genders = Gender::genders;
  return view('/admin', compact('contacts', 'categories','genders'));
}
}
