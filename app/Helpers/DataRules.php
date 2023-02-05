<?php
namespace App\Helpers;

class DataRules {
  public const URL = [
    'required' => [],
    'optional' => ['nullable', 'url'],
    'errors' => [
      'url' => 'Это поле должно иметь ссылку на ресурс',
    ]
  ];

  public const EMAIL = [
    'required' => ['required', 'max: 40'],
    'optional' => ['max: 40'],
    'errors' => [
      'required' => 'Эл. почта является обязательной для заполнения',
      'max' => 'Эл. почта может иметь максимум 40 символов',
    ]
  ];

  public const LASTNAME = [
    'required' => ['required', 'min: 3'],
    'optional' => ['min: 3'],
    'errors' => [
      'required' => 'Фамилия является обязательной для заполнения',
      'min' => 'Фамилия должна иметь минимум 3 символа',
    ]
  ];

  public const FIRSTNAME = [
    'required' => ['required', 'min: 3'],
    'optional' => ['min: 3'],
    'errors' => [
      'required' => 'Имя является обязательным для заполнения',
      'min' => 'Имя должно иметь минимум 3 символа',
    ]
  ];

  public const SURNAME = [
    'required' => ['required', 'min: 3'],
    'optional' => ['min: 3'],
    'errors' => [
      'required' => 'Отчество является обязательным для заполнения',
      'min' => 'Отчество должно иметь минимум 3 символа',
    ]
  ];

  public const BIRTH_DATE = [
    'required' => ['required'],
    'errors' => [
      'required' => 'Дата рождения является обязательной для заполнения',
    ]
  ];

  public const SEX = [
    'required' => ['required'],
    'errors' => [
      'required' => 'Пол является обязательным для заполнения',
    ]
  ];

  public const PASSPORT_SERIES = [
    'required' => ['required', 'max: 4', 'min: 4'],
    'optional' => ['max: 4', 'min: 4'],
    'errors' => [
      'required' => 'Серия паспорта является обязательной для заполнения',
      'max' => 'Серия паспорта должна содержать 4 символа',
      'min' => 'Серия паспорта должна содержать 4 символа',
    ]
  ];

  public const PASSPORT_NUMBER = [
    'required' => ['required', 'max: 6', 'min: 6'],
    'optional' => ['max: 6', 'min: 6'],
    'errors' => [
      'required' => 'Номер паспорта является обязательным для заполнения',
      'max' => 'Номер паспорта должен содержать 6 символов',
      'min' => 'Номер паспорта должен содержать 6 символов',
    ]
  ];

  public const PASSWORD = [
    'required' => ['required', 'min: 6'],
    'optional' => ['nullable', 'min: 6'],
    'errors' => [
      'required' => 'Пароль является обязательным для заполнения',
      'min' => 'Пароль должен содержать минимум 6 символов'
    ]
  ];
}