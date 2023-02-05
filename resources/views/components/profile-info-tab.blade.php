<?php
    $table = [
        1 => ['value' => $user['email'], 'title' => 'Эл.почта'],
        ['value' => $user['lastname'], 'title' => 'Фамилия'],
        ['value' => $user['firstname'], 'title' => 'Имя'],
        ['value' => $user['surname'], 'title' => 'Отчество'],
        ['value' => $user['birth-date'], 'title' => 'Дата рождения'],
        ['value' => $user['sex'] === 'man' ? 'Мужской' : 'Женский', 'title' => 'Пол'],
    ];

    $social = [
        'Stackoverflow' => $user['stackoverflow-url'],
        'GitHub' => $user['github-url'],
        'Telegram' => $user['telegram-url'],
    ];

    $haveSocials = array_filter($social, function($value) {
        return $value;
    });
?>

<div>
    <div class="d-flex flex-column">
        <div class="col">
            <h2>Общая информация</h2>
            <table class="table w-80">
            <tbody>
                @foreach ($table as $num => $row)
                    <tr class="{{ $num % 2 === 0 ? 'table-light' : '' }}">
                        <th scope="row">{{ $row['title'] }}</th>
                        <td>{{ $row['value'] }}</td>
                    </tr>
                @endforeach
            </tbody>
            </table>
        </div>
        <div class="col">
            <h2>Контакты</h2>
            @if(count($haveSocials))
                <ul class="list-group">
                    @foreach($haveSocials as $title => $link)
                        <li class="list-group-item">
                            <a href="{{ $link }}" target="_blank">
                                {{ $title }}
                            </a>
                        </li>
                    @endforeach
                </ul>
                @else
                <p class="text-center">Ничего нет</p>
            @endif
        </div>
    </div>

</div>