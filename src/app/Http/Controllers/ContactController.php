<?php

namespace App\Http\Controllers;
use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;

class ContactController extends Controller
{
   public function index()
  {
    return view('contact');
  }

  public function confirm(ContactRequest $request){
    $contact = $request->only(['name', 'email', 'tel', 'content']);

return view('confirm', compact('contact'));
  }

  public function store(ContactRequest $request){
        $contact = $request->only(['name', 'email', 'tel', 'content']);

        Contact::create($contact);

        return view('thanks');
  }

  public function destroy(Request $request)
{
    Todo::find($request->id)->delete();
    return redirect('/')->with('message', 'Todoを削除しました');
}
}
