<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>忘れ物一覧</title>
    <link rel="stylesheet" href="../css/destyle.css">
    <link rel="stylesheet" href="../css/userCheck.css">
</head>
<body>
    <div id="checkBody">
        <header>
            <h1>入力内容の確認</h1>
        </header>
        <main>
            <ul>
                <li>情報入力</li>
                <li id="nowPage">情報確認</li>
                <li>登録完了</li>
            </ul>

            <p>次の内容で登録を完了します。</p>
            <form action="./userRegist" method="post">
                @csrf
                <dl>
                    <dt>氏名</dt>
                    <dd><input type="text" name="userName" value="{{$userName}}" readonly></dd>

                    <dt>電話番号</dt>
                    <dd><input type="text" name="userTel" value="{{$userTel}}" readonly></dd>

                    <dt>メールアドレス</dt>
                    <dd><input type="text" name="userMail" value="{{$userMail}}" readonly></dd>

                    <dt>パスワード</dt>
                    <dd><input type="text" name="userPassword" value="{{$userPassword}}" readonly></dd>

                    <dt>使用形態</dt>
                    <dd><input type="text" name="userPassword" value="{{$profession}}" readonly></dd>

                </dl>
                <button type="submit" name="" value="">登録完了</button>
                <a href="./userInput">入力内容を変更</a>
            </form>
        </main>
    </div>
</body>
</html>
