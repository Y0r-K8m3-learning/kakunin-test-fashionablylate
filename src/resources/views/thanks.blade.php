<!-- <!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FashionablyLate</title>
<link rel="stylesheet" href="{{ asset('css/thanks.css') }}"> -->

<!-- </head>
<body>
</html> -->

@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
@endsection

@section('content')

<div class="thanks__content">
  <div class="thanks__content-background">Thank you</div>
  <div class="thanks__heading">
    <div  class="thanks__content-msg">
    お問い合わせありがとうございました
    </div>
    <div  class="thanks__content-home__link">
        <a  href="/">HOME</a>
    </div>
  </div>
 </div>
</body>
@endsection
   