<?php
    $table = [
        1 => ['userKey' => 'email', 'title' => 'Эл.почта'],
        ['userKey' => 'lastname', 'title' => 'Фамилия'],
        ['userKey' => 'firstname', 'title' => 'Имя'],
        ['userKey' => 'surname', 'title' => 'Отчество'],
        ['userKey' => 'birth-date', 'title' => 'Дата рождения'],
        ['userKey' => 'sex', 'title' => 'Пол'],
    ];
?>

<div>
    <h1>Общая информация</h1>
    <table class="table w-80">
      <tbody>
        @foreach ($table as $num => $row)
            <tr class="{{ $num % 2 === 0 ? 'table-light' : '' }}">
                <th scope="row">{{ $row['title'] }}</th>
                <td>{{ $user[$row['userKey']] }}</td>
            </tr>
        @endforeach
      </tbody>
    </table>
</div>