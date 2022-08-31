<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/userProfileEdit.css">
    <title>プロフィール編集</title>
</head>
<body>

    <header>
        <p>プロフィール編集</p>
    </header>


    <div id="editForm">
        <form action="./userProfileEdit" method="POST">
            @csrf
            <div id="editFile">
            <div class="title">
                    <p>アイコン</p>
                    <p class="errMsg">{{$edit['icon']['errMsg']}}</p>
                </div>
                <input type="file" name="icon" value="" id="icon">
            </div>
            <div class="editInput">
                <div class="title">
                    <p>アカウント名</p>
                    <p class="errMsg">{{$edit['account']['errMsg']}}</p>
                </div>
                <input type="text" name="accountName" value="{{$edit['account']['value']}}" class="edit">
            </div>
            <div class="editInput">
            <div class="title">
                    <p>メールアドレス</p>
                    <p class="errMsg">{{$edit['mail']['errMsg']}}</p>
                </div>
                <input type="text" name="mail" value="{{$edit['mail']['value']}}" class="edit">
            </div>
            <div class="editInput">
            <div class="title">
                    <p>電話番号</p>
                    <p class="errMsg">{{$edit['tell']['errMsg']}}</p>
                </div>
                <input type="text" name="tell" value="{{$edit['tell']['value']}}" class="edit">
            </div>
            <div class="editInput">
            <div class="title">
                    <p>パスワード</p>
                    <p>変更したい場合にのみ入力してください</p>
                    <p class="errMsg">{{$edit['pass']['errMsg']}}</p>
                </div>
                <input type="password" name="password" value="{{$edit['pass']['value']}}" class="edit">
            </div>
            <button type="submit" name="editBtn">変更する</button>
        </form>
    </div>
    <a href="./userProfile" id="backBtn">戻る</a>
</body>
</html>
