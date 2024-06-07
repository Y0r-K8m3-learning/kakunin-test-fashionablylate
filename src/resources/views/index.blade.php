@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="attendance__alert">
  // メッセージ機能
</div>
<div class="page-title">Admin</div>
   <form class="search-form" action="/contacts/search" method="get">
     @csrf
    <div class="search-form__item">
      <input class="search-form__item-input" type="text" placeholder="名前やメールアドレスを" name="name" value="{{ old('name') }}">       
        <select class="search-form__item-select" name="gender">
          <option value="">性別</option>
          @foreach ([
        ['id' => '1', 'name' => '男性'],
        ['id' => '2', 'name' => '女性'],
        ['id' => '3', 'name' => 'その他']
    ] as $gender)
          <option value="{{ $gender['id'] }}">{{ $gender['name'] }}</option>
           @endforeach
        </select>
        <select class="search-form__item-select" name="category_id">
                  <option value="">お問い合わせの種類</option>
          @foreach ($categories as $category)
          <option value="{{ $category['id'] }}">{{ $category['content'] }}</option>
           @endforeach
        </select>
      <input class="search-form__item-calender" type="date" placeholder="名前やメールアドレスを" name="date" value="{{ old('date') }}">   
    </div>
    <div class="search-form__button">
      <button class="search-form__button-submit" type="submit">検索</button>
      <button class="search-form__button-reset" type="submit">リセット</button>
    </div>
  </form>
  <form action="post" method="">
  <button type="button" class="csv-export-form__button-export">エクスポート</button>
  </form>

  <div class="attendance-table">
    <table class="attendance-table__inner">
      <tr class="attendance-table__row">
        <th class="attendance-table__header" >名前</th>
        <th class="attendance-table__header">性別</th>
        <th class="attendance-table__header">メールアドレス</th>
        <th class="attendance-table__header">お問い合わせ</th>
        <th class="attendance-table__header"></th>
      </tr>
       @foreach ($contacts as $contact)
      <tr class="attendance-table__row">
        <td class="attendance-table__item">{{$contact['first_name']}}</td>
        <td class="attendance-table__item">サンプル</td>
        <td class="attendance-table__item">サンプル</td>
        <td class="attendance-table__item">サンプル</td>
        <td class="attendance-table__item"> 
            @include('modal',['data' => $contact])
        </td>
      </tr>
       @endforeach
    </table>
  </div>
</div>

@endsection