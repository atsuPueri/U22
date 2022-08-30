<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/managerEditPropertyNotification.css">
    <title>施設占有者拾得物件届出書</title>
</head>
<body>

    <header>
        <p>施設占有者拾得物件届出書作成</p>
    </header>


    <div id="editForm">
        <form action="./managerProfileEdit">
            @csrf
            <div id="editFile">
                <div class="title">
                    <p>届出日</p>
                    <p class="errMsg">{{$edit['day']['errMsg']}}</p>
                </div>
                <input type="text" name="" value="{{$edit['day']['value']}}" class="edit">
            </div>
            <div class="editInput">
                <div class="title">
                    <p>届け先警察署名</p>
                    <p class="errMsg">{{$edit['police']['errMsg']}}</p>
                </div>
                <input type="text" name="" value="{{$edit['police']['value']}}" class="edit">
            </div>
            <div class="editInput">
                <div class="title">
                    <p>届け元店舗住所</p>
                    <p class="errMsg">{{$edit['address']['errMsg']}}</p>
                </div>
                <input type="text" name="" value="{{$edit['address']['value']}}" class="edit">
            </div>
            <div class="editInput">
                <div class="title">
                    <p>届け元店舗名</p>
                    <p class="errMsg">{{$edit['account']['errMsg']}}</p>
                </div>
                <input type="text" name="" value="{{$edit['account']['value']}}" class="edit">
            </div>
            <div class="editInput">
                <div class="title">
                    <p>届け元電話番号</p>
                    <p class="errMsg">{{$edit['tell']['errMsg']}}</p>
                </div>
                <input type="text" name="" value="{{$edit['tell']['value']}}" class="edit">
            </div>
            <div class="editInput">
                <div class="title">
                    <p>主張する権利</p>
                    <p class="errMsg"></p>
                </div>
                <ol>
                    <li><input type="radio" name="right" value="1" class="" checked>有権</li>
                    <li><input type="radio" name="right" value="2" class="">有権（法労金のみ放棄）</li>
                    <li><input type="radio" name="right" value="3" class="">有権（所有権のみ放棄）</li>
                    <li><input type="radio" name="right" value="4" class="">失棄権</li>
                </ol>
            </div>
            <div class="editInput">
                <div class="title">
                    <p>氏名等告知同意</p>
                    <p class="errMsg"></p>
                </div>
                <ol>
                    <li><input type="radio" name="nameShow" value="1" class="" checked>有</li>
                    <li><input type="radio" name="nameShow" value="2" class="">無</li>
                </ol>
            </div>
            <button type="submit" name="pdfBtn" value="pdfView">表示する</button>
            <button type="submit" name="pdfDownloadBtn" value="pdfDownload" id="downloadBtn">ダウンロード</button>
        </form>
    </div>
    <a href="./managerProfile" id="backBtn">戻る</a>
</body>
</html>
