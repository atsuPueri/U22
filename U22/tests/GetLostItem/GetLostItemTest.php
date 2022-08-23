<?php
namespace Tests\GetLostItem;

use Tests\TestCase;
use App\Library\LostItem\LostItem;
use App\Library\LostItem\usecase\GetLostItem\GetLostItem;
use App\Library\LostItem\usecase\GetLostItem\GetLostItemPort;

class GetLostItemTest extends TestCase
{
    public function test(): void
    {
        $GetLostItem = new GetLostItem(new class() implements GetLostItemPort
        {
            public function get_lost_item(int $id): LostItem
            {
                $lost_item_table = [
                    1 => [
                        'id' => 1,
                        'shop_id' => 1,
                        'genre_id' => 0,
                        'name' => '現金',
                        'acquisition_date' => 123123123,
                    ],
                    2 => [
                        'id' => 2,
                        'shop_id' => 2,
                        'genre_id' => 1,
                        'name' => 'ハンドバッグ',
                        'acquisition_date' => 999999,
                    ]
                ];

                return LostItem::from_array($lost_item_table[$id]);
            }
        });


        $expected = new LostItem(1, 1, 0, "現金", 123123123);
        $this->assertEquals($expected, $GetLostItem->execute(1));
        // $this->assertEquals($expected, $GetLostItem->execute(2));
    }
}
