<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>U22</title>
    <link rel="stylesheet" href="../css/destyle.css">
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>
    <div id="loginBody">
        <header>
            <h1>LOGIN</h1>
        </header>
        <main>
            <form action="#" method="post">
                <dl>
                    <dt><label for="tel">TEL</label></dt>
                    <dd><input type="text" name="tel" id="tel" value=""></dd>
                    <dd class="errMsg">{{$errTel}}</dd>

                    <dt><label for="password">PASSWORD</label></dt>
                    <dd><input type="text" name="password" id="password" value=""></dd>
                    <dd class="errMsg">{{$errPass}}</dd>

                </dl>
                <button type="submit" name="" value="">LOGIN</button>
            </form>
            <a href="./mailLogin" id="changeLogin">メールアドレスでログイン</a>
            <p>まだ登録を完了をしていない方は<a href="../user/userInput">こちら</a>から登録画面へ</p>
        </main>
    </div>
</body>
</html>
