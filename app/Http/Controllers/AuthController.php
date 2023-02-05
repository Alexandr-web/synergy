<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\Student;
use ReallySimpleJWT\Token;
use App\Helpers\DataRules;

class AuthController extends Controller
{
    public function registraiton(Request $req) {
        $req->validate(
            [
                'email' => DataRules::EMAIL['required'],
                'lastname' => DataRules::LASTNAME['required'],
                'firstname' => DataRules::FIRSTNAME['required'],
                'surname' => DataRules::SURNAME['required'],
                'birth-date' => DataRules::BIRTH_DATE['required'],
                'sex' => DataRules::SEX['required'],
                'passport-series' => DataRules::PASSPORT_SERIES['required'],
                'passport-number' => DataRules::PASSPORT_NUMBER['required'],
                'password' => DataRules::PASSWORD['required'],
            ],
            [
                'email.required' => DataRules::EMAIL['errors']['required'],
                'email.max' => DataRules::EMAIL['errors']['max'],
                'lastname.required' => DataRules::LASTNAME['errors']['required'],
                'lastname.min' => DataRules::LASTNAME['errors']['min'],
                'firstname.required' => DataRules::FIRSTNAME['errors']['required'],
                'firstname.min' => DataRules::FIRSTNAME['errors']['min'],
                'surname.required' => DataRules::SURNAME['errors']['required'],
                'surname.min' => DataRules::SURNAME['errors']['min'],
                'birth-date.required' => DataRules::BIRTH_DATE['errors']['required'],
                'sex.required' => DataRules::SEX['errors']['required'],
                'passport-series.required' => DataRules::PASSPORT_SERIES['errors']['required'],
                'passport-series.max' => DataRules::PASSPORT_SERIES['errors']['max'],
                'passport-series.min' => DataRules::PASSPORT_SERIES['errors']['min'],
                'passport-number.required' => DataRules::PASSPORT_NUMBER['errors']['required'],
                'passport-number.max' => DataRules::PASSPORT_NUMBER['errors']['max'],
                'passport-number.min' => DataRules::PASSPORT_NUMBER['errors']['min'],
                'password.required' => DataRules::PASSWORD['errors']['required'],
                'password.min' => DataRules::PASSWORD['errors']['min'],
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