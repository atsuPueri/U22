<?php
namespace App\Library\Helper;

class GetLostItemType
{
    /**
     * 落し物種類一覧を連想配列で取得
     * [
     *   'カテゴリー名': [
     *     '種類名',
     *     ...
     *   ]
     * ]
     * @return array<string, list<string>>
     */
    public static function get_categorys(): array
    {
        $json = file_get_contents(\resource_path() . '/json/lost_item_genre.json');
        return json_decode($json, true)['category'];
    }

    /**
     * ジャンル名のみ取得
     * @return list<string>
     */
    public static function get_genre(): array
    {
        return array_keys(self::get_categorys());
    }

    /**
     * 中身を数値添え字形式の一次元配列で返す
     * [
     *     0 => 現金,
     *     1 => ハンドバッグ
     *     2 => ビジネスバッグ,
     *     ...
     * ]
     * @return list<string>
     */
    public static function get_id_to_categorys(): array
    {
        $result = [];
        foreach (self::get_categorys() as $category) {
            $result = \array_merge($result, $category);
        }
        return $result;
    }
}
