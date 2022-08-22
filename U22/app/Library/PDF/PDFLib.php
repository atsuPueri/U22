<?php
namespace App\Library\PDF;

use Symfony\Component\HttpFoundation\Response;
use setasign\Fpdi\Tcpdf\Fpdi;
use App\Library\PDF\PDFText;

/**
 * @link 参考にしたサイト https://kumatech-lab.com/tcpdf-fpdi-phplot/
 */
class PDFLib
{
    /**
     * テンプレートとなるPDFに文字を書き込む
     * @param string $template_path
     * @param array<PDFText> $PDFText_array
     * @param bool $is_download trueならダウンロードされる、falseならインライン表示（ウェブページとして表示）する
     * @return Response
     */
    public static function write_pdf(string $template_path, array $PDFText_array, bool $is_download = true) {

        $receipt = new Fpdi();

        // PDFの余白(上左右)を設定
        $receipt->SetMargins(0, 0, 0);

        // ヘッダーフッターの無効化
        $receipt->setPrintHeader(false);
        $receipt->setPrintFooter(false);

        // ページを追加
        $receipt->AddPage();

        // テンプレートを読み込み
        $receipt->setSourceFile($template_path);

        // 読み込んだPDFの1ページ目のインデックスを取得
        $tp_index = $receipt->importPage(1);

        // 読み込んだPDFの1ページ目をテンプレートとして使用
        $receipt->useTemplate($tp_index, null, null, null, null, true);

        foreach ($PDFText_array as $PDFText) {
            $receipt = $PDFText->with_texts($receipt);
        }

        $response = new Response(
            // Output関数の第一引数にはファイル名、第二引数には出力タイプを指定する
            // 今回は文字列で返してほしいので、ファイル名はnull、出力タイプは S = String を選択する
            $receipt->Output(null, 'S'),
            200,
            ['content-type' => 'application/pdf']
        );

        if (true === $is_download) {
            // レスポンスヘッダーにContent-Dispositionをセットし、ファイル名をreceipt.pdfに指定
            $response->headers->set('Content-Disposition', 'attachment; filename="receipt.pdf"');
        }
        return $response;
    }
}
