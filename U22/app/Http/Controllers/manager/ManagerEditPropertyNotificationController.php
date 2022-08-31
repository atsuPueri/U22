<?php

namespace App\Http\Controllers\manager;

use App\Http\Controllers\Controller;
use App\Library\PDF\PDFLib;
use App\Library\PDF\PDFText;
use Illuminate\Http\Request;

class ManagerEditPropertyNotificationController extends Controller
{
    public function show()
    {
        return view('manager/managerEditPropertyNotification' , [
            'edit' => [//valueが情報,errMsgがエラー文
                'day' => ['value' => \date('Ymd') , 'errMsg' => ''],//届出日
                'police' => ['value' => '曽根崎' , 'errMsg' => ''],//届け先警察署
                'address' => ['value' => '大阪府大阪市生野区生野西2－5－14' , 'errMsg' => ''],//届け元店舗住所
                'account' => ['value' => '鳥貴族' , 'errMsg' => ''],//届け元店舗
                'tell' => ['value' => '01200000000' , 'errMsg' => ''],//届け元店舗電話番号
            ]
        ]);
    }

    public function edit(Request $request)
    {
        $day = $request->input('day');
        $y = \substr($day, 0, 4);
        $m = \substr($day, 4, 2);
        $d = \substr($day, 6, 2);

        $police_address = $request->input('police_address');
        $address = $request->input('address');
        $account = $request->input('account');

        $phone_number = $request->input('phone_number');

        $right = $request->input('right');


        $pdflib = new PDFLib();
        return $pdflib->write_pdf(\resource_path() . '/pdf/style05.pdf', [
            new PDFText(152, 9, $y, ['font_size' => 10]),
            new PDFText(166, 9, $m, ['font_size' => 10]),
            new PDFText(177, 9, $d, ['font_size' => 10]),

            new PDFText(27, 26, $police_address, ['font_size' => 9]),

            new PDFText(146, 19, $address, ['font_size' => 8]),
            new PDFText(146, 26, $account, ['font_size' => 8]),
            new PDFText(146, 33, $phone_number, ['font_size' => 8]),

            new PDFText(63, 56, '〇', ['font_size' => 15]),
            new PDFText(63, 63, '〇', ['font_size' => 15]),
            new PDFText(109, 56, '〇', ['font_size' => 15]),
            new PDFText(109, 63, '〇', ['font_size' => 15]),

            new PDFText(177, 59, '〇', ['font_size' => 17]),
            new PDFText(190, 59, '〇', ['font_size' => 17]),

            new PDFText(37, 86, '￥１００', ['font_size' => 14]),
            new PDFText(32, 102, '￥１０００', ['font_size' => 14]),
            new PDFText(27, 118, '￥１００００', ['font_size' => 14]),
            new PDFText(27 - 5, 118 + 16, '￥１０００００', ['font_size' => 14]),

            new PDFText(59, 87, '長財布'),
            new PDFText(59, 87 + 8, '指輪'),
            new PDFText(59, 87 + 16, '指輪'),
            new PDFText(59, 87 + 24, '指輪'),
            new PDFText(59, 87 + 32, '指輪'),

        ], false);
    }

}
