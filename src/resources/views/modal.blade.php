
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Attendance Management</title>
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
<link rel="stylesheet" href="{{ asset('css/modal.css') }}">
</head>
<body>
    <label for="modalToggle" class="btn">詳細</label>
    <input type="checkbox" id="modalToggle">
    <div class="modal">

        <div class="modal-content">
            <label for="modalToggle" class="close">&times;</label>
            <form class="confirm-form" action="/contact/delete" method="post">
            @method('DELETE')
            @csrf  
 <input type="hidden" name="id" value="{{ $contact['id'] }}">
             <div class="confirm-table">
      <table class="confirm-table__inner">
        <tr class="confirm-table__row">
          <th class="confirm-table__header">お名前</th>
          <td class="confirm-table__text">
            <input type="text" name="last_name" value="{{ $contact['last_name'] }}{{ $contact['first_name'] }}" readonly /> 
          </td>
        </tr>
         <tr class="confirm-table__row">
          <th class="confirm-table__header">性別</th>
          <td class="confirm-table__text">
            <input type="text" name="gender" value="{{ $contact['gendername'] }}" readonly />
          </td>
        </tr>
        <tr class="confirm-table__row">
          <th class="confirm-table__header">メールアドレス</th>
          <td class="confirm-table__text">
            <input type="text" name="email" value="{{ $contact['email'] }}" readonly />
          </td>
        </tr>
        <tr class="confirm-table__row">
          <th class="confirm-table__header">電話番号</th>
          <td class="confirm-table__text">
            <input type="text" name="tell" value="{{ $contact['tell'] }}" readonly />
          </td>
        </tr>
           <tr class="confirm-table__row">
          <th class="confirm-table__header">住所</th>
          <td class="confirm-table__text">
            <input type="text" name="address" value="{{ $contact['address'] }}" readonly />
          </td>
        </tr>
           <tr class="confirm-table__row">
          <th class="confirm-table__header">住所</th>
          <td class="confirm-table__text">
            <input type="text" name="building" value="{{ $contact['building'] }}" readonly />
          </td>
        </tr>
          <tr class="confirm-table__row">
          <th class="confirm-table__header">お問い合わせの種類</th>
          <td class="confirm-table__text">
            <input type="text" name="category_id" value="{{ $contact['category']['content'] }}" readonly />
          </td>
        </tr>
        <tr class="confirm-table__row ">
          <th class="confirm-table__header">お問い合わせ内容</th>
          <td class="confirm-table__text">
            <textarea name="detail" rows="5" readonly />{{ $contact['detail'] }}</textarea> 
          </td>
        </tr>
      </table>

       <button class="form__button-submit" name="send" type="submit">削除</button>
           </form>

        </div>
    </div>
</body>
</html>
