<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\Student;
use ReallySimpleJWT\Token;

class AuthController extends Controller
{
    public function registraiton(Request $req) {
        $req->validate(
            [
                'email' => ['required', 'max: 40'],
                'lastname' => ['required', 'min: 3'],
                'firstname' => ['required', 'min: 3'],
                'surname' => ['required', 'min: 3'],
                'birth-date' => ['required'],
                'sex' => ['required'],
                'passport-series' => ['required', 'max: 4', 'min: 4'],
                'passport-number' => ['required', 'max: 6', 'min: 6'],
                'password' => ['required', 'min: 6']
            ],
            [
                'email.required' => 'Эл. почта является обязательной для заполнения',
                'lastname.required' => 'Фамилия является обязательной для заполнения',
                'lastname.min' => 'Фамилия должна иметь минимум 3 символа',
                'firstname.required' => 'Имя является обязательным для заполнения',
                'firstname.min' => 'Имя должно иметь минимум 3 символа',
                'surname.required' => 'Отчество должно иметь минимум 3 символа',
                'surname.min' => 'Отчество должно иметь минимум 3 символа',
                'birth-date.required' => 'Дата рождения является обязательной для заполнения',
                'sex.required' => 'Пол является обязательным для заполнения',
                'passport-series.required' => 'Серия паспорта является обязательной для заполнения',
                'passport-series.max' => 'Серия паспорта должна содержать 4 символа',
                'passport-series.min' => 'Серия паспорта должна содержать 4 символа',
                'passport-number.required' => 'Номер паспорта является обязательным для заполнения',
                'passport-number.max' => 'Номер паспорта должен содержать 6 символов',
                'passport-number.min' => 'Номер паспорта должен содержать 6 символов',
                'password.required' => 'Пароль является обязательным для заполнения',
                'password.min' => 'Пароль должен содержать минимум 6 символов'
            ]
        );

        $hashPassword = Hash::make($req->input('password'), ['rounds' => 12]);
        $userData = array_merge($req->input(), ['password' => $hashPassword]);
        
        $equalUser = Student::where([
            'email' => $userData['email'],
            'passport-series' => $userData['passport-series'],
            'passport-number' => $userData['passport-number'],
        ])->first();

        if ($equalUser) {
            return response(['message' => 'Такой пользователь уже существует!', 'status' => 409], 409)
                ->header('Content-Type', 'application/json');
        }

        Student::create($userData);

        return response(['message' => 'Студент создан', 'status' => 200], 200)
            ->header('Content-Type', 'application/json');
    }

    public function login(Request $req) {
        $req->validate(
            [
                'email' => ['required', 'max: 40'],
                'password' => ['required', 'min: 6']
            ],
            [
                'email.required' => 'Эл. почта является обязательной для заполнения',
                'password.required' => 'Пароль является обязательным для заполнения',
                'password.min' => 'Пароль должен содержать минимум 6 символов'
            ]
        );

        $findUser = Student::where(['email' => $req->input('email')])->first();

        if (!$findUser) {
            return response(['message' => 'Такого пользователя не существует', 'status' => 404], 404)
                ->header('Content-Type', 'application/json');
        }

        $passwordIsValid = Hash::check($req->input('password'), $findUser->password);

        if (!$passwordIsValid) {
            return response(['message' => 'Неверный пароль', 'status' => 422], 422)
                ->header('Content-Type', 'application/json');
        }

        $secret = env('SECRET');
        $userId = $findUser->id;
        $expiration = time() + 3600;
        $issuer = env('HOST');
        $token = Token::create($userId, $secret, $expiration, $issuer);

        return response(['message' => 'Вход прошел успешно', 'status' => 200, 'token' => $token], 200)
            ->header('Content-Type', 'application/json');
    }
}