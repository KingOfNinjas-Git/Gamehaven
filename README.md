# GameHaven: video game shop

A small online shop for video games, consoles and merchandise, in Portuguese. Visitors browse a promotions carousel and offers, add games to a cart and create an account (with a profile picture); an admin adds, edits and removes games and their covers.

Built with **Laravel 12, Blade, Tailwind CSS, Swiper** and SQLite, tested with **Pest**.

**Live demo:** https://gamehaven.franciscowebdev.com (the "Ver a área de admin" button opens the admin area without a password)

## What it does

- **Home page** with a promotions carousel and rows of games, consoles and merchandise (a scrolling row on phones, centred on wide screens).
- **Offers page** listing the games with discount labels, old and new price, and a category filter.
- **Cart**: add a game from the offers page and see the cart.
- **Accounts**: register, log in, change the profile picture.
- **Admin** (only for admin accounts): create, edit and delete games, with a cover image that is shrunk and stored as WebP.
- Phone friendly down to 320 px, accessible forms and keyboard-scrollable rows.

## Run it locally

```bash
composer install
cp .env.example .env
php artisan key:generate
touch database/database.sqlite
php artisan migrate --seed
npm install
npm run dev        # or npm run build
php artisan serve
```

## Tests

```bash
./vendor/bin/pest
./vendor/bin/pint --test   # code style
```

The tests use an in-memory database and a fake `public` disk, so they never touch real pictures. GitHub Actions runs them, the code style check and the front-end build on every push.

## The portfolio demo

On the live demo `DEMO_MODE=true` is set. It shows a notice bar, adds `/demo/admin` (one click, no password), puts the shop back to how it started about once an hour (games visitors added or changed are reset; accounts they registered are removed after a few hours) and asks search engines not to index the demo (`X-Robots-Tag: noindex`). With the setting off the shop behaves like a normal one.

Part of the portfolio at https://franciscowebdev.com.
