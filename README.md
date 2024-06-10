
# Fashionablylate

## 環境構築
### Dockerのビルドからマイグレーション、シーディングまでを記述する
-Dockerビルド
  1. `git clone`
  2. `cd kakunin-test-fashionablylate`
  3. `docker-compose up -d --build`
 
　※MySQLは、OSによって起動しない場合があるのでそれぞれのPCに合わせて docker-compose.ymlファイルを編集してください。
 
-Laravel環境構築
  1. `docker-compose exec php bash`
  2. `composer install`
  3. `cp -p .env.example .env`
  4. `php artisan key:generate`
  5. `php artisan migrate`
  6. `php artisan db:seed`
　
  ※OSによって、ログファイル権限エラー
 stream or flie ～ Permission deinied」）エラーが発生する場合は下記コマンドを実行してください。
  `sudo chmod 777 -R storage`

## 使用技術(実行環境)
- PHP 8.3.7
- laravel  11.10.0
- MySQL 8.0.37

  
## ER図
![ER](https://github.com/Y0r-K8m3-learning/kakunin-test-fashionablylate/assets/171590806/d02daefc-9ce3-45cd-9a2c-b8d9b582ce43)

## URL
-開発環境：http://localhost/

##未実装

-問い合わせフォームへのルーティングが正しく設定できていません。
"/"ではアクセスできません。アクセス時は "/contact"でアクセスしてください。

-確認画面から[修正]で戻った時
 電話番号の入力値が保持されていません。
 
-CSVエクスポート
 UTF-8 で出力しているため、windows環境だと文字化けします。（文字変換が上手くできていません）

-レイアウト
　解像度によってはレイアウトが崩れます。

