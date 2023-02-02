<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Helpers\AuthToken;

class UserController extends Controller
{
    public function profileRender(string $id) {
        $userIdFromToken = AuthToken::getUserId();
        $findStudent = Student::findOrFail($id);
        $isGuest = $userIdFromToken !== intval($id);
        
        return view('profile', ['user' => $findStudent, 'isGuest' => $isGuest]);
    }

    public function edit(Request $req, string $id) {
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

        $req->validate(
            [
                'email' => ['max: 40'],
                'stackoverflow-url' => ['nullable', 'url'],
                'github-url' => ['nullable', 'url'],
                'telegram-url' => ['nullable', 'url'],
                'lastname' => ['min: 3'],
                'firstname' => ['min: 3'],
                'surname' => ['min: 3'],
                'passport-series' => ['max: 4', 'min: 4'],
                'passport-number' => ['max: 6', 'min: 6'],
                'password' => ['nullable', 'min: 6'],
            ],
            [
                'telegram-url.url' => 'Это поле должно иметь ссылку на ресурс',
                'github-url.url' => 'Это поле должно иметь ссылку на ресурс',
                'stackoverflow-url.url' => 'Это поле должно иметь ссылку на ресурс',
                'lastname.min' => 'Фамилия должна иметь минимум 3 символа',
                'firstname.min' => 'Имя должно иметь минимум 3 символа',
                'surname.min' => 'Отчество должно иметь минимум 3 символа',
                'passport-series.max' => 'Серия паспорта должна содержать 4 символа',
                'passport-series.min' => 'Серия паспорта должна содержать 4 символа',
                'passport-number.max' => 'Номер паспорта должен содержать 6 символов',
                'passport-number.min' => 'Номер паспорта должен содержать 6 символов',
                'password.min' => 'Пароль должен содержать минимум 6 символов'
            ]
        );

        $editedFields = array_filter($req->input(), function($value) {
            return $value;
        });

        if ($req->input('password')) {
            $hashPassword = Hash::make($req->input('password'), ['rounds' => 12]);
            $editedFields = array_merge($editedFields, ['password' => $hashPassword]);
        }

        $findStudent->update($editedFields);

        return response(['message' => 'Данные отредактированы', 'status' => 200], 200)
            ->header('Content-Type', 'application/json');
    }

    public function getOne(Request $req, string $id) {
        $findStudent = Student::find($id);
        $resData = [
            'status' => is_null($findStudent) ? 404 : 200,
            'user' => $findStudent ?? [],
        ];

        return response($resData, $resData['status'])
            ->header('Content-Type', 'application/json');
    }

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
