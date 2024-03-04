<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF Generator</title>
</head>

<style>
    /* dompdf日本語文字化け対策 */
    /* タグによって太さが違うため、それに応じて全てにfont-faceを書く必要あり */

    /* @font-face {
        font-family: ipaexg;
        font-style: normal;
        font-weight: normal;
        src: url('{{ storage_path('fonts/ipaexg.ttf') }}');
    }

    @font-face {
        font-family: ipaexg;
        font-style: 600;
        font-weight: 600;
        src: url('{{ storage_path('fonts/ipaexg.ttf') }}');
    }

    @font-face {
        font-family: ipaexg;
        font-style: bold;
        font-weight: bold;
        src: url('{{ storage_path('fonts/ipaexg.ttf') }}');
    }

    @page {
        margin: 10px;
    } */

    /* html,
    body,
    textarea {
        font-family: ipaexg, saÏns-serif;
    } */

    h2 {
        text-align: center;
        margin-bottom: 20px;
    }

    p {
        font-weight: bold;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    table,
    th,
    td {
        border: 1px solid black;
    }

    th,
    td {
        padding: 8px;
        text-align: left;
    }

    tbody tr:nth-child(even) {
        background-color: lightgray;
    }
</style>

<body>
    <h2>請求書</h2>
    <h2>laravel-snappy</h2>
    <p>日付: {{ $date }}</p>
    <p>会社名: {{ $company_name }}</p>
    <p>名前: {{ $name }}</p>
    <p>メールアドレス: {{ $email }}</p>
    <table border="1" style="width: 100%; max-width: 100%;">
        <thead>
            <tr>
                <th>商品名</th>
                <th>数量</th>
                <th>単価</th>
                <th>金額</th>
                <th>消費税</th>
                <th>合計</th>
                <th>支払い方法</th>
                <th>発送日</th>
                <th>注文日</th>
                <th>備考</th>
                <th>Test</th>
                <th>Test</th>
                <th>Test</th>
                <th>Test</th>
            </tr>
        </thead>
        <tbody>
            @for ($i = 1; $i <= 30; $i++)
                <tr>
                    <td>商品{{ $i }}</td>
                    <td>{{ rand(1, 10) }}</td>
                    <td>{{ rand(100, 1000) }}</td>
                    <td>{{ rand(100, 1000) * rand(1, 10) }}</td>
                    <td>{{ rand(5, 10) }}%</td>
                    <td>{{ rand(100, 1000) * rand(1, 10) }}</td>
                    <td>クレジットカード</td>
                    <td>{{ now()->addDays(rand(1, 10))->format('Y-m-d') }}</td>
                    <td>{{ now()->subDays(rand(1, 30))->format('Y-m-d') }}</td>
                    <td>備考{{ $i }}</td>
                    <td>Test</td>
                    <td>Test</td>
                    <td>Test</td>
                    <td>Test</td>
                </tr>
            @endfor
        </tbody>
    </table>
    {{-- <form action="{{ route('pdf.generate-pdf') }}" method="post">
        @csrf
        <input type="hidden" name="company_name" value="{{ $company_name }}">
        <input type="hidden" name="name" value="{{ $name }}">
        <input type="hidden" name="email" value="{{ $email }}">
        <input type="hidden" name="date" value="{{ $date }}">
        <input type="submit" value="Create PDf">
    </form> --}}
</body>

</html>
