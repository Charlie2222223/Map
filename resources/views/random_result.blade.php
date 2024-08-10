<!DOCTYPE html>
<html>
<head>
    <title>Random Result</title>
</head>
<body>
    <h1>ランダム検索結果</h1>
    <p>{{ $data->address }}</p> <!-- 例として住所を表示 -->
    <a href="{{ url('/random-search') }}">もう一度ランダム検索</a>
</body>
</html>