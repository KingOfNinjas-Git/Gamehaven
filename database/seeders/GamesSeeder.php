<?php

namespace Database\Seeders;

use App\Models\Game;
use Illuminate\Database\Seeder;

/** The six games the shop starts with (also what the portfolio demo is restored to). */
class GamesSeeder extends Seeder
{
    public const GAMES = [
        ['id' => 1, 'title' => 'Digimon Story Cyber Sleuth: Complete Edition', 'cover_image' => 'game_covers/AnIiAwgMqA5GVB3W7XJvLQAjvfQiGCsDQAc1yipL.png', 'price' => 44.99, 'discount' => 14, 'old_price' => 49.99, 'category' => 'RPG'],
        ['id' => 2, 'title' => 'Super Mario Party', 'cover_image' => 'game_covers/ibB7tvUK6UMZLbWefEFAXzPtcAPh7CgVmrPf8VNS.jpg', 'price' => 46.19, 'discount' => 23, 'old_price' => 59.99, 'category' => 'Casual'],
        ['id' => 3, 'title' => 'Dragon Ball Xenoverse 2', 'cover_image' => 'game_covers/YqWbd9R3n0VNuSu36ug4jqHhmuW5DCLimNVCrS1q.jpg', 'price' => 16.79, 'discount' => 16, 'old_price' => 19.99, 'category' => 'Action'],
        ['id' => 4, 'title' => 'Sonic The Hedgehog', 'cover_image' => 'game_covers/wVhvG0l6Ix4LAHI0eiaZ03nSlONkeXYS6a8laInG.webp', 'price' => 5.99, 'discount' => 40, 'old_price' => 9.99, 'category' => 'Action-Adventure'],
        ['id' => 5, 'title' => 'Super Mario 64', 'cover_image' => 'game_covers/kcsMJP0iue4DnNXRiKBzvQlm2RX2d502F2thHWaS.png', 'price' => 5.99, 'discount' => 40, 'old_price' => 9.99, 'category' => 'Action-Adventure'],
        ['id' => 6, 'title' => 'Donkey Kong Racing', 'cover_image' => 'game_covers/NTyOix4SC2omZ33JrjRlWy1edm8nCBdBKSx0nj65.jpg', 'price' => 14.96, 'discount' => 25, 'old_price' => 19.95, 'category' => 'Racing'],
    ];

    public function run(): void
    {
        foreach (self::GAMES as $row) {
            $id = $row['id'];
            unset($row['id']);

            Game::unguarded(fn () => Game::updateOrCreate(['id' => $id], $row));
        }
    }
}
