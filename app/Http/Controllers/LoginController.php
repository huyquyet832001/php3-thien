<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class LoginController extends Controller
{
    public function login(Request $request)
    {

        // Mail::to('huyquyet1928374655@gmail.com')
        //     ->send(
        //         app()->make(\App\Mail\SendMail::class)
        //     );
        return view('auth.login');
    }
    public function loginAdd(Request $request)
    {
        $request->validate(
            [
                'email' => 'required|email',
                'password' => 'required'
            ],
            [
                'email.required' => 'Hãy Nhập Tài Khoản',
                'email.email' => 'Không đúng định dạng email',
                'password.required' => 'Hãy nhập password'
            ]
        );
        if (
            Auth::attempt(['email' => $request->email, 'password' => $request->password])
            || Auth::attempt(['phone_number' => $request->email, 'password' => $request->password])
        ) {

            return redirect(route('account.index'));
        }

        return redirect()->back()->with('msg', "Sai Thông Tin Đăng Nhập");
    }
    public function registration()
    {
        return view('auth.registration');
    }
    public function registrationAdd(UserRequest $request)
    {
        $model = new User();
        $model->fill($request->all());
        $model->password = bcrypt($request->password);
        $model->role = 0;
        $model->save();
        return redirect('login');
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
