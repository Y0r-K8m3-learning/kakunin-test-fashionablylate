@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
<link rel="stylesheet" href="{{ asset('css/paginate.css') }}">

@endsection

@section('content')
  <div class="admin__content">

<div class="admin-form__heading">
   Admin
  </div>
   <form class="search-form" action="/admin/search" method="get">
     @csrf
    <div class="search-form__item">
    <div class="search-form__item-group">
      <div class="search-form__item-group-item">
        <input class="search-form__item-input" type="text" placeholder="名前やメールアドレスを入力してください" name="name" value="{{ old('name') }}">       
        </div>
      <div class="search-form__item-group-item">
        <div class="search-form__item-select-wrapper">
          <select class="search-form__item-select search-form__item-select-gender"  name="gender">
            <option  selected disabled  hidden>性別</option>
            @foreach ($genders as $gender)
            <option value="{{ $gender['id'] }}">{{ $gender['name'] }}</option>
            @endforeach
          </select>
        </div>

        </div>
 <div class="search-form__item-group-item">
  <div class="search-form__item-select-wrapper">
        <select class="search-form__item-select search-form__item-select-category" name="category_id">
                  <option value="">お問い合わせの種類</option>
          @foreach ($categories as $category)
          <option value="{{ $category['id'] }}">{{ $category['content'] }}</option>
           @endforeach
        </select>
        </div>
      </div>
 <div class="search-form__item-group-item">
      <div class="search-form__item-select-wrapper">
          <input class="search-form__item-calender" type="date" name="date" value="{{ old('date') }}">   
    </div>
   </div>

    <div class="search-form__button">
      <button class="search-form__button-submit" type="submit">検索</button>
      <button class="search-form__button-reset" type="reset">リセット</button>
    </div>
    </div>
</div>

  </form>

  <div class="search-form-subcontent">
    <div >
    <a class="csv-export-form__button-export" href="{{ route('search.export') }}">エクスポート</a>
</div>

  <div class="search-form-subcontent__pagenation">
    @if(count($contacts) >0)
     {{ $contacts?? $contacts->onEachSide(1)->links('vendor.pagination.mybootstrap-5')}}
    @endif
 
</div>
</div>

  </form>
  <div class="search-table">
    <table class="search-table__inner">
      <tr class="search-table__row">
        <th class="search-table__header" >名前</th>
        <th class="search-table__header">性別</th>
        <th class="search-table__header">メールアドレス</th>
        <th class="search-table__header">お問い合わせ</th>
        <th class="search-table__header"></th>
      </tr>
       @foreach ($contacts as $contact)
       <input type="hidden" name="id" value="{{ $contact['id'] }}">
      <tr class="search-table__row">
        <td class="search-table__item">{{$contact['last_name'].'　'.$contact['first_name']}}</td>
        <td class="search-table__item">{{$contact['gendername']}}</td>
        <td class="search-table__item">{{$contact['email']}}</td>
        <td class="search-table__item">{{$contact['category']['content']}}</td>
        <td class="search-table__item"> 
             @include('modal', ['contact' => $contact])
        </td>
      </tr>
       @endforeach
    </table>
    
  </div>
</div>
    </div>

@endsection