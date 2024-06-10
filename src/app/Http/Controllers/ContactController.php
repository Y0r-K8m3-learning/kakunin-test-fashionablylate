<?php

namespace App\Http\Controllers;
use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;
use App\Models\Gender;
use App\Models\Category;
use App\Models\Contact;


class ContactController extends Controller
{
   public function index()
  {

    $categories = Category::all();
     $genders = Gender::genders;
    return view('index', compact('categories','genders'));
  }

  public function confirm(ContactRequest $request){
    
    $request['tell'] = $request['tell_first'].$request['tell_second'] . $request['tell_third'];
     $contact = $request->only(['first_name', 'last_name', 'gender','gendername', 'email', 'tell', 'address', 'building', 'category_id','detail']);

    $contact['category']= Category::find($request->category_id);
    $genders = Gender::genders;
      foreach ( $genders as $gender) {
            if ($gender['id'] == $contact['gender']) {
               $contact['gendername']=$gender['name'];
            }
        }

   

    return view('confirm', compact('contact'));
  }

  public function store(Request $request){

        if($request->input('back') == 'back'){
            return redirect('/',$request);
                        
        }

       $contact = $request->only(['first_name', 'last_name', 'gender', 'email', 'tell', 'address', 'building', 'category_id', 'detail']);

       Contact::create($contact);

         return redirect()->route('thanks');
  }

  public function destroy(Request $request)
{
    Contact::find($request->id)->delete();
    return redirect('/admin');
}

public function thanks()
{
    return view('thanks');
}



}
