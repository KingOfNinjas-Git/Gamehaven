<?php

namespace App\Support;

use App\Models\Game;
use App\Models\User;
use Database\Seeders\GamesSeeder;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

/** Everything that only exists for the public portfolio demo (see config/demo.php). */
class DemoMode
{
    public static function enabled(): bool
    {
        return (bool) config('demo.enabled');
    }

    public static function isDemoAdmin(?User $user): bool
    {
        return $user !== null && self::enabled() && $user->email === config('demo.admin_email');
    }

    /** The account behind the "see the admin area" button: no known password. */
    public static function adminUser(): User
    {
        $user = User::firstOrCreate(
            ['email' => config('demo.admin_email')],
            ['name' => 'Demo admin', 'first_name' => 'Demo', 'surname' => 'admin', 'password' => Str::random(40)],
        );

        if (! $user->is_admin) {
            $user->forceFill(['is_admin' => true, 'email_verified_at' => now()])->save();
        }

        return $user;
    }

    /** Puts the shop back to how it started. Runs at most once an hour, after the response has been sent. */
    public static function cleanUp(): void
    {
        if (! self::enabled() || ! Cache::add('demo-cleanup', 1, 3600)) {
            return;
        }

        $disk = Storage::disk('public');
        $keepIds = array_column(GamesSeeder::GAMES, 'id');
        $keepCovers = array_column(GamesSeeder::GAMES, 'cover_image');

        // Games that visitors added go away; the original six are restored to their first details.
        Game::whereNotIn('id', $keepIds)->delete();
        (new GamesSeeder)->run();

        foreach ($disk->files('game_covers') as $file) {
            if (! in_array($file, $keepCovers, true)) {
                $disk->delete($file);
            }
        }

        // Accounts that visitors registered (with the details they typed) are removed after a few hours.
        User::where('email', '!=', config('demo.admin_email'))
            ->where('created_at', '<', now()->subHours(config('demo.keep_hours')))
            ->get()
            ->each(function (User $user) use ($disk) {
                if ($user->profile_picture) {
                    $disk->delete($user->profile_picture);
                }
                $user->delete();
            });
    }
}
