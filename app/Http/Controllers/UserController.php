<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Helpers\AuthToken;
use App\Helpers\DataRules;

class UserController extends Controller
{
    /**
     * Отображение страницы пользователя
     * @param {string} $id Идентификатор пользователя
     */
    public function profileRender(string $id) {
        $userIdFromToken = AuthToken::getUserId();
        $findStudent = Student::findOrFail($id);
        $isGuest = $userIdFromToken !== intval($id);
        
        return view('profile', ['user' => $findStudent, 'isGuest' => $isGuest]);
    }

    /**
     * Изменение данных пользователя
     * @param {string} $id Идентификатор пользователя
     */
    public function editOne(Request $req, string $id) {
        if (!$req->isAuthenticated) {
            return response(['message' => 'Для выполнения следующей операции необходимо авторизоваться', 'status' => 401], 401)
                ->header('Content-Type', 'application/json');
        }

        $findStudent = Student::find($id);

        if (!$findStudent) {
            return response(['message' => 'Такого пользователя не существует', 'status' => 404], 404)
                ->header('Content-Type', 'application/json');
        }

        if ($findStudent['id'] !== $req->user['id']) {
            return response(['message' => 'У вас нет прав доступа для выполнения данной операции', 'status' => 403], 403)
                ->header('Content-Type', 'application/json');
        }

        // Валидация данных
        $req->validate(
            [
                'email' => DataRules::EMAIL['optional'],
                'stackoverflow-url' => DataRules::URL['optional'],
                'github-url' => DataRules::URL['optional'],
                'telegram-url' => DataRules::URL['optional'],
                'lastname' => DataRules::LASTNAME['optional'],
                'firstname' => DataRules::FIRSTNAME['optional'],
                'surname' => DataRules::SURNAME['optional'],
                'passport-series' => DataRules::PASSPORT_SERIES['optional'],
                'passport-number' => DataRules::PASSPORT_NUMBER['optional'],
                'password' => DataRules::PASSWORD['optional'],
                'birth-date' => DataRules::BIRTH_DATE['required'],
                'sex' => DataRules::SEX['required'],
                'hobby' => DataRules::HOBBY['optional'],
                'city' => DataRules::HOBBY['optional'],
                'favorite-planet' => DataRules::HOBBY['optional']
            ],
            [
                'email.max' => DataRules::EMAIL['errors']['max'],
                'telegram-url.url' => DataRules::URL['errors']['url'],
                'github-url.url' => DataRules::URL['errors']['url'],
                'stackoverflow-url.url' => DataRules::URL['errors']['url'],
                'lastname.min' => DataRules::LASTNAME['errors']['min'],
                'firstname.min' => DataRules::FIRSTNAME['errors']['min'],
                'surname.min' => DataRules::SURNAME['errors']['min'],
                'passport-series.max' => DataRules::PASSPORT_SERIES['errors']['max'],
                'passport-series.min' => DataRules::PASSPORT_SERIES['errors']['min'],
                'passport-number.max' => DataRules::PASSPORT_NUMBER['errors']['max'],
                'passport-number.min' => DataRules::PASSPORT_NUMBER['errors']['min'],
                'password.min' => DataRules::PASSWORD['errors']['min'],
                'birth-date' => DataRules::BIRTH_DATE['errors']['required'],
                'sex' => DataRules::SEX['errors']['required'],
            ]
        );

        // Ищем пользователя с такими же данными
        $equalStudent = Student::where('email', $findStudent['email'])->first();

        if ($equalStudent && $equalStudent['id'] !== $findStudent['id']) {
            return response(['message' => 'Пользователь с такой эл. почтой уже существует', 'status' => 409], 409)
                ->header('Content-Type', 'application/json');
        }

        // Берем только те значения, которые не равны null
        $editedFields = array_filter($req->input(), function($value) {
            return $value;
        });

        // Шифруем пароль, если он приходит
        if ($req->input('password')) {
            $hashPassword = Hash::make($req->input('password'), ['rounds' => 12]);
            $editedFields = array_merge($editedFields, ['password' => $hashPassword]);
        }

        $findStudent->update($editedFields);

        return response(['message' => 'Данные отредактированы', 'status' => 200], 200)
            ->header('Content-Type', 'application/json');
    }

    /**
     * Получение пользователя из базы данных
     * @param {string} $id Идентификатор пользователя
     */
    public function getOne(Request $req, string $id) {
        $findStudent = Student::find($id);
        $resData = [
            'status' => is_null($findStudent) ? 404 : 200,
            'user' => $findStudent ?? [],
        ];

        return response($resData, $resData['status'])
            ->header('Content-Type', 'application/json');
    }

    /**
     * Удаление данных пользователя из базы данных
     * @param {string} $id Идентификатор пользователя
     */
    public function deleteOne(Request $req, string $id) {
        if (!$req->isAuthenticated) {
            return respone(['message' => 'Для выполнения следующей операции необходимо авторизоваться', 'status' => 401], 401)
                ->header('Content-Type', 'application/json');
        }

        $findStudent = Student::find($id);

        if (!$findStudent) {
            return response(['message' => 'Такого пользователя не существует', 'status' => 404], 404)
                ->header('Content-Type', 'application/json');
        }

        if ($findStudent['id'] !== $req->user['id']) {
            return response(['message' => 'У вас нет прав доступа для выполнения данной операции', 'status' => 403], 403)
                ->header('Content-Type', 'application/json');
        }

        $findStudent->delete();

        return response(['message' => 'Аккаунт удален', 'status' => 200], 200)
            ->header('Content-Type', 'application/json');
    }
}
