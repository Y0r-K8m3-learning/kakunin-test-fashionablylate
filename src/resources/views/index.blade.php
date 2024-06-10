@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')

<div class="form__content">
  <div class="form__heading">
    Contact
  </div>
  <form class="form" action="/contact/confirm" method="post">
    @csrf
    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">お名前</span>
        <span class="form__label--required"></span>
      </div>
      <div class="form__group-content">
        <div class="form__input--text">
        <div class="form__input--text-name">
          <input type="text" name="last_name" placeholder="例)山田" class="form__input--text-input form__input--text-input-name" value="{{ old('last_name') }}" />
          <input type="text" name="first_name" placeholder="例)太郎" class="form__input--text-input form__input--text-input-name" value="{{ old('first_name') }}" />

   
        </div>

        </div>
                <div class="form__error">
          @error('last_name')
          {{ $message }}
          @enderror
          @error('first_name')
          {{ $message }}
          @enderror
        </div>
      </div>
    </div>
     <div class="form__group">
     <div class="form__group-title">
        <span class="form__label--item">性別</span>
        <span class="form__label--required"></span>
      </div>
          <div class="form__group-content">
            <div class="form__input--radio">
              @foreach($genders as $gender)
              <input type="radio"  name="gender" value="{{ $gender['id'] }}" {{ old('gender') == $gender['id'] ? 'checked' : '' }}>
               {{$gender['name']}}
              @endforeach
            </div>
          <div class="form__error">
            @error('gender')
            {{ $message }}
            @enderror
          </div>
      </div>
    </div>
    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">メールアドレス</span>
        <span class="form__label--required"></span>
      </div>
      <div class="form__group-content">
        <div class="form__input--text">
          <input type="text" name="email" placeholder="test@example.com" class="form__input--text-input" value="{{ old('email') }}" />
        </div>
        <div class="form__error">
          @error('email')
          {{ $message }}
          @enderror
        </div>
      </div>
    </div>
    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">電話番号</span>
        <span class="form__label--required"></span>
      </div>
      <div class="form__group-content">
        <div class="form__input--text">
          <input type="text"  name="tell_first" placeholder="080" class="form__input--text-input form__input--tel" value="{{ old('tell_first') }}" />
         
           -
            <input type="text"  name="tell_second" placeholder="1234" class="form__input--text-input form__input--tel" value="{{ old('tell_second') }}" />
           
             -
              <input type="text"  name="tell_third" placeholder="5678" class="form__input--text-input form__input--tel" value="{{ old('tell_third') }}" />
             
        </div>
              <div class="form__error">
         @if ($errors->any())
          @if ($errors->has('tell_first'))
                {{ $errors->first('tell_first') }}
            @elseif ($errors->has('tell_second'))
                {{ $errors->first('tell_second') }}
            @elseif ($errors->has('tell_third'))
                {{ $errors->first('tell_third') }}
            @endif
          @endif
        </div>
         
      </div>

    </div>
     
     <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">住所</span>
        <span class="form__label--required"></span>
      </div>
      <div class="form__group-content">
        <div class="form__input--text">
          <input type="text" name="address" placeholder="東京と渋谷区千駄ヶ谷1-2-3" class="form__input--text-input" value="{{ old('address') }}" />
        </div>
        <div class="form__error">
          @error('address')
          {{ $message }}
          @enderror
        </div>
      </div>
    </div>
     <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">建物</span>
      </div>
      <div class="form__group-content">
        <div class="form__input--text">
          <input type="text" name="building" placeholder="例:千駄ヶ谷マンション101" class="form__input--text-input" value="{{ old('building') }}" />
        </div>
    
      </div>
    </div>
     <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">お問い合わせの種類</span>
        <span class="form__label--required"></span>
      </div>
      <div class="form__group-content">
        <div  class="form__item-select-wrapper">
         <select  name="category_id" class="form__item-select"  >
          <option value="" selected disabled hidden>選択してください</option>
          @foreach ($categories as $category)
          <option  value="{{ $category['id']}}" {{ old('category_id') == $category['id'] ? 'selected' : '' }}>{{ $category['content'] }} </option>
           @endforeach
        </select>
         <div class="form__error">
          @error('category_id')
          {{ $message }}
          @enderror
        </div>
      </div>
      </div>
    </div>
    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">お問い合わせ内容</span>
        <span class="form__label--required"></span>
      </div>
      <div class="form__group-content">
        <div class="form__input--textarea">
          <textarea name="detail" row=5 class="form__input--text-input form__input--text-input--area" placeholder="お問い合わせ内容をご記載ください。" >{{ old('detail') }}</textarea> 
        </div>
        <div class="form__error">
          @error('detail')
          {{ $message }}
          @enderror
        </div>
      </div>
    </div>
    <div class="form__button">
      <button class="form__button-submit" type="submit">確認画面</button>
    </div>
  </form>
</div>
@endsection