@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection

@section('content')
<div class="form-confirm__content">
  <div class="form-confirm__heading">
    Confirm
  </div>
  <div class="form-confirm__content-wrapper">

  <form class="form" action="/contact/store" method="post">
    @csrf

    <div class="form-confirm-table">
      <table class="form-confirm-table__inner" border>
        <tr class="form-confirm-table__row">
          <th class="form-confirm-table__header">お名前</th>
          <td class="form-confirm-table__text">
             <input type="text" name="last_name"  value="{{ $contact['last_name'] .' '. $contact['first_name']}}" readonly /> 
             <input type="text"
           
            <input type="text" name="last_name"  value="{{ $contact['last_name'] }}" readonly hidden/> 
             <input type="text" name="first_name" value="{{ $contact['first_name'] }}"   readonly hidden/> 
          </td>
        </tr>
         <tr class="form-confirm-table__row">
          <th class="form-confirm-table__header">性別</th>
          <td class="form-confirm-table__text">
            <input type="text"  value="{{ $contact['gendername'] }}" readonly />
            <input type="text" name="gender" value="{{ $contact['gender'] }}" hidden readonly/>
          </td>
        </tr>
        <tr class="form-confirm-table__row">
          <th class="form-confirm-table__header">メールアドレス</th>
          <td class="form-confirm-table__text">
            <input type="email" name="email" value="{{ $contact['email'] }}" readonly />
          </td>
        </tr>
        <tr class="form-confirm-table__row">
          <th class="form-confirm-table__header">電話番号</th>
          <td class="form-confirm-table__text">
            <input type="text" name="tell" value="{{ $contact['tell'] }}" readonly />
          </td>
        </tr>
           <tr class="form-confirm-table__row">
          <th class="form-confirm-table__header">住所</th>
          <td class="form-confirm-table__text">
            <input type="text" name="address" value="{{ $contact['address'] }}" readonly />
          </td>
        </tr>
           <tr class="form-confirm-table__row">
          <th class="form-confirm-table__header">建物</th>
          <td class="form-confirm-table__text">
            <input type="text" name="building" value="{{ $contact['building'] }}" readonly />
          </td>
        </tr>
          <tr class="form-confirm-table__row">
          <th class="form-confirm-table__header">お問い合わせの種類</th>
          <td class="form-confirm-table__text">
             <input type="text"  value="{{ $contact['category']['content'] }}" readonly />
            <input type="text" name="category_id" value="{{ $contact['category_id'] }}" readonly hidden />
          </td>
        </tr>
        <tr class="form-confirm-table__row">
          <th class="form-confirm-table__header">お問い合わせ内容</th>
          <td class="form-confirm-table__text">
            <textarea name="detail" readonly />{{ $contact['detail'] }}</textarea> 
          </td>
        </tr>
      </table>
    </div>
    <div class="form-confirm__button">
      <button class="form-confirm__button-submit" type="submit">送信</button>
      <button class="form-confirm__button-back" name="back"  value="back" type="submit">修正</button>
    </div>
  </form>
  </div>

</div>
@endsection