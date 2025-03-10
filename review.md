# Laravel Lesson レビュー①

## Todo一覧機能

### Todoモデルのallメソッドで実行しているSQLは何か
$todos = $todo->all();
全てのレコードを取得する意味を持つ。

### Todoモデルのallメソッドの返り値は何か
Illuminate、Database、Eloquent、Collectionクラスのインスタンス。

### 配列の代わりにCollectionクラスを使用するメリットは
メソッドチェーンなどを使え複雑な操作も簡潔にかけ可読性が向上するため。

### view関数の第1・第2引数の指定と何をしているか
return view('todo.index', ['todos' => $todos]);
第1引数には画面に表示したいHTMlを指定。todo.indexとはviews/todoの中にあるindex.blade.phpのことである。
第2引数には[blade内での変数名 => 代入したい値]を指定。ここではall()で全レコード取得した際に格納している$todosを代入している。

### index.blade.phpの$todos・$todoに代入されているものは何か
$todosは、TodoControllerクラスで実行された$todosが代入される。
$todoは、$todos内の複数のレコードが代入される。

## Todo作成機能

### Requestクラスのallメソッドは何をしているか
ファームから送信された値を連想配列として一括で取得している。

### fillメソッドは何をしているか
引数に指定した連想配列をモーダルに一括代入している。

### $fillableは何のために設定しているか


### saveメソッドで実行しているSQLは何か

### redirect()->route()は何をしているか
todoが新規作成された際に一覧画面へリダイレクトしている。

## その他

### テーブル構成をマイグレーションファイルで管理するメリット

### マイグレーションファイルのup()、down()は何のコマンドを実行した時に呼び出されるのか

### Seederクラスの役割は何か

### route関数の引数・返り値・使用するメリット

### @extends・@section・@yieldの関係性とbladeを分割するメリット

### @csrfは何のための記述か

### {{ }}とは何の省略系か
