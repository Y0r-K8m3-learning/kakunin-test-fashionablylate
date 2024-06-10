<?php

namespace App\Http\Controllers;

use App\Models\Model;
use App\Models\Contact;
use App\Models\Gender;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function index()
    {
       $categories = Category::all();
  $genders = Gender::genders;
  $contacts=[];
        return view('/admin', compact('contacts', 'categories','genders'));

    }


    public function search(Request $request)
{

  $categories = Category::all();
  $genders = Gender::genders;
   if($request->input('reset') == 'reset'){
        Session::forget('search_contacts');
            return redirect('/admin');
             
   }
  $search_contacts = Contact::with('category')->ContactSearch($request);

 Session::put('search_contacts', $search_contacts->get()->toArray());

  $contacts = $search_contacts->paginate(7);
  $request->flash();

  return view('/admin', compact('contacts', 'categories','genders'));
}

 

  public function destroy(Request $request)
{
    Contact::find($request->id)->delete();
    return $this->search($request);
}



  public function export(){

    $header = ['お名前','性別','メールアドレス','お問い合わせの種類'];
    $results = Session::get('search_contacts', []);
     $f = fopen('contacts.csv', 'w');
     if ($f) {
         mb_convert_variables( 'UTF-8','UTF-8', $header);
         fputcsv($f,mb_convert_encoding($header, 'UTF-8', 'UTF-8'));
         foreach ($results as $record) {

            $genders = Gender::genders;
            foreach ($genders as $gender) {
                if ($gender['id'] == $record['gender']) {
                  $record['gendername'] = $gender['name'];
                  break;
                }
            }
            mb_convert_variables( 'UTF-8','UTF-8', $record);
            $data = [$record['last_name']. $record['first_name'],$record['gendername'],$record['email'],$record['category']['content']];
            fputcsv($f, mb_convert_encoding($data, 'UTF-8', 'UTF-8'));

         }
     }

     fclose($f);

      header("Content-Type: application/octet-stream");
     header('Content-Length: '.filesize('contacts.csv'));
     header('Content-Disposition: attachment; filename=test.csv');
     readfile('contacts.csv');
    return view('/admin', compact($results));

  }

}
