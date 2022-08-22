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
}
