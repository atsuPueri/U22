<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>忘れ物一覧</title>
    <link rel="stylesheet" href="../css/destyle.css">
    <link rel="stylesheet" href="../css/userInput.css">
</head>
<body>
    <div id="inputBody">
        <header>
            <h1>新規登録</h1>
        </header>
        <main>
            <ul>
                <li id="nowPage">情報入力</li>
                <li>情報確認</li>
                <li>登録完了</li>
            </ul>

            <form action="./userInput" method="post">
                @csrf
                <dl>
                    <dt><label for="userName">氏名<span>必須</span></label></dt>
                    <dd><input type="text" name="userName" id="userName" value=""></dd>
                    <dd class="errMsg">{{$errName}}</dd>

                    <dt><label for="userTel">電話番号<span>必須</span></label></dt>
                    <dd><input type="text" name="userTel" id="userTel" value=""></dd>
                    <dd class="errMsg">{{$errTel}}</dd>

                    <dt><label for="userMail">メールアドレス<span>必須</span></label></dt>
                    <dd><input type="text" name="userMail" id="userMail" value=""></dd>
                    <dd class="errMsg">{{$errMail}}</dd>

                    <dt><label for="userPassword">パスワード<span>必須</span></label></dt>
                    <dd><input type="text" name="userPassword" id="userPassword" value=""></dd>
                    <dd class="errMsg">{{$errPassword}}</dd>

                    <div id="address">
                        <dt><label for="userPassword">住所<span>必須</span></label></dt>
                        <dd><input type="text" name="userAddress" id="userAddress" value=""></dd>
                    </div>

                    <dt><label for="profession">使用形態</label></dt>
                    <dd><input type="radio" name="profession" value="user" id="user" checked>ユーザー</dd>
                    <dd><input type="radio" name="profession" value="manager" id="manager">店舗</dd>

                </dl>
                <button type="submit" name="" value="">確認画面へ</button>
            </form>
        </main>
    </div>

    <script src="../js/input.js"></script>
</body>
</html>
