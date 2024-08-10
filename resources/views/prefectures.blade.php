<!DOCTYPE html>
<html>
<head>
    <title>ランダム住所結果</title>
</head>
<body>
    <h1>ランダムに選ばれた住所</h1>
    <p>都道府県: {{ $data->prefectures }}</p>
    <p>地域ID: {{ $data->region_id }}</p>

    <a href="{{ url('/') }}">もう一度検索</a>
</body>
</html>