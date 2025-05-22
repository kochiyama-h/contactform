<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Illuminate\Validation\ValidationException;

class CreateNewUser implements CreatesNewUsers
{
    /**
     * Create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        // バリデーションルールとエラーメッセージをここで定義
        $validator = Validator::make($input, [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'name.required' => 'お名前を入力してください',
            'email.required' => 'メールアドレスを入力してください',
            'email.email' => 'メールアドレスは「ユーザー名@ドメイン形式」で入力してください',
            'password.required' => 'パスワードを入力してください',
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        // ユーザー作成
        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
