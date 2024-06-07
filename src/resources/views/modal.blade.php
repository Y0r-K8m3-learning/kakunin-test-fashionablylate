
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
            <p>ここにモーダルの内容を表示します。</p>
            <p>{{ $data['name'] }}</p>
            <form action="post" method="/contact/delete">
            @method('DELETE')
            @csrf    
            削除</form>

        </div>
    </div>
</body>
</html>
