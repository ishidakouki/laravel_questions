<?php

namespace App\Http\Controllers;

use App\User;

use Illuminate\Http\Request;
use App\Http\Requests\UsersRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Exception;

class UsersController extends Controller
{
    public function show($id)
    {
        try {
            if ($user = User::find($id)) {
                return view('users.show')->with('user', $user);
            }

            //例外が発生したので例外処理を投げる
            throw new Exception('例外エラーが発生しました');

        } catch(Exception $e) {

            //例外処理が発生したのでusers.errorページにエラーログを表示する
            return view('users.error')->with('e', $e);
        }
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('users.edit')->with('user',$user);
    }

    public function update(UsersRequest $request,$id)
    {
        $user = User::find($id);

        //トランザクション開始
        DB::beginTransaction();
        try {
            //ユーザー情報を更新しDBに保存してviewにユーザー情報を返す
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->password = Hash::make($request->password);
            $user->save();

            //トランザクション使用時はcommitを記述して初めてDBにセーブされる。
            DB::commit();

            return view('users.show',compact('user'));

        } catch(Exception $e) {

            //例外処理が発生したので変更をロールバックを行う
            DB::rollback();

            //失敗した原因をログに残す
            Log::error($e);

            //users/errorファイルにエラーログを記録
            return view('users.error')->with('e', $e);
        }
    }
}
