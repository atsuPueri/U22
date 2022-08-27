<?php
namespace App\Library\LostItem;

class LostItem
{
    private int $id;
    private int $shop_id;
    private int $genre_id;
    private string $name;
    private int $acquisition_date;
    private ?int $pickup_date;
    private ?int $pickup_user_id;
    private ?string $police_station_address;

    public function __construct(
        int $id,
        int $shop_id,
        int $genre_id,
        string $name,
        int $acquisition_date,
        ?int $pickup_date = null,
        ?int $pickup_user_id = null,
        ?string $police_station_address = null,
    ) {
        $this->id = $id;
        $this->shop_id = $shop_id;
        $this->genre_id = $genre_id;
        $this->name = $name;
        $this->acquisition_date = $acquisition_date;
        $this->pickup_date = $pickup_date;
        $this->pickup_user_id = $pickup_user_id;
        $this->police_station_address = $police_station_address;
    }

    public static function from_array(array $info): LostItem
    {
        return new LostItem(
            $info['id'],
            $info['shop_id'],
            $info['genre_id'],
            $info['name'],
            $info['acquisition_date'],
            $info['pickup_date'] ?? null,
            $info['pickup_user_id'] ?? null,
            $info['police_station_address'] ?? null,
        );
    }


}
