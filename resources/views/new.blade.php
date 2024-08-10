<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <p>郵便番号：<input id="zip" type="text" name="zip" size="7">例：1020072（半角数字）</p>
    <button class="api-address" type="button">住所を自動入力</button>
    <p>住所：<input id="address" type="text" name="address" size="30"></p>
</body>
<script>
    //イベントリスナの設置：ボタンをクリックしたら反応する
    document.querySelector('.api-address').addEventListener('click', () => {
        //郵便番号を入力するテキストフィールドから値を取得
        const elem = document.querySelector('#zip');
        const zip = elem.value;
        //fetchでAPIからJSON文字列を取得する
        fetch('../api/address/' + zip)
            .then((data) => data.json())
            .then((obj) => {
                //郵便番号が存在しない場合，空のオブジェクトが返ってくる
                //オブジェクトが空かどうかを判定
                if (!Object.keys(obj).length) {
                    //オブジェクトが空の場合
                    txt = '住所が存在しません。'
                } else {
                    //オブジェクトが存在する場合
                    //住所は分割されたデータとして返ってくるので連結する
                    txt = obj.pref + obj.city + obj.town;
                }
                //住所を入力するテキストフィールドに文字列を書き込む
                document.querySelector('#address').value = txt;
            });
    });
</script>
</html>