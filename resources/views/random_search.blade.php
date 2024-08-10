<!DOCTYPE html>
<html>
<head>
    <title>地方ID選択</title>
</head>
<body>
    <h1>地方IDを選択してください</h1>
    <form action="{{ url('/random-search') }}" method="GET">
        <select name="region_id">
            <option value="">すべての都道府県</option> <!-- すべてを選ぶオプション -->
            @foreach($regions as $region)
                <option value="{{ $region->region_id }}">地方ID: {{ $region->region_id }}</option>
            @endforeach
        </select>
        <button type="submit">ランダム検索</button>
    </form>
</body>
</html>