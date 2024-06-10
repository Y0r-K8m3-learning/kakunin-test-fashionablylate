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
       $categories = Category::all();
  $genders = Gender::genders;
  $contacts=[];
        return view('/admin', compact('contacts', 'categories','genders'));

    }

    const results = [];

    public function search(Request $request)
{
  $allcontacts = Contact::with('category')->ContactSearch($request);
  $results = $allcontacts;
  $contacts = $allcontacts->paginate(7);
  
  $categories = Category::all();
  $genders = Gender::genders;


  return view('/admin', compact('contacts', 'categories','genders'));
}
  public function export(){
   $results = session('results', collect());

    $header = ['お名前','性別','メールアドレス','お問い合わせの種類'];

     // 書き込み用ファイルを開く
     $f = fopen('contacts.csv', 'w');
     if ($f) {
         mb_convert_variables( 'UTF-8','UTF-8', $header);
         fputcsv($f,mb_convert_encoding($header, 'SJIS-win', 'UTF-8'));
         foreach ($results as $record) {
            mb_convert_variables( 'SJIS-win','UTF-8', $record);
            $data = [$record['last_name']. $record['first_name'],$record['gendername'],$record['email'],$record['category']['content']];
            fputcsv($f, mb_convert_encoding($data, 'SJIS-win', 'UTF-8'));

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
