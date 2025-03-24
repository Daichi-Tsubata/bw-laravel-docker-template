<?php

namespace App\Http\Controllers;
use App\Http\Requests\TodoRequest; // 追加
use App\Todo;


class TodoController extends Controller
{
    private $todo; // 追記
    public function __construct(Todo $todo)
    {
        $this->todo = $todo; // 追記
    }
    public function index()
    {

        $todos = $this->todo->all();

        return view('todo.index', ['todos' => $todos]);
    }
    public function create()
    {
        return view('todo.create');
    }
    public function store(TodoRequest $request) // 修正
    {
       
        $inputs = $request->all(); 

        $this->todo->fill($inputs); // 変更
        $this->todo->save(); // 変更
    
        return redirect()->route('todo.index');
    }
    public function show($id)
{
    $todo = $this->todo->find($id);
    return view('todo.show', ['todo' => $todo]);
}
    public function edit($id)
{
    // TODO: 編集対象のレコードの情報を持つTodoモデルのインスタンスを取得
    $todo = Todo::findOrFail($id);
    return view('todo.edit', ['todo' => $todo]);
}
public function update(TodoRequest $request, $id)  // 第1引数: リクエスト情報の取得　第2引数: ルートパラメータの取得
{
     // フォームから送信された値を取得
     $inputs = $request->all();

     // 更新対象のデータを取得
     $todo = Todo::findOrFail($id);
 
     // 更新したい値を代入して、データベースを更新
     $todo->fill($inputs)->save();
 
     // 更新後、一覧ページへリダイレクト
     return redirect()->route('todo.show', $todo->id); // 追記
}
    
}

