<?php

// Public portfolio demo: a notice on every page, a one-click admin view (no password) and automatic
// clean-up of what visitors add. Off by default; a real shop leaves it off.
return [
    'enabled' => (bool) env('DEMO_MODE', false),
    'admin_email' => env('DEMO_ADMIN_EMAIL', 'demo-admin@gamehaven.demo'),

    // Accounts that visitors register are removed after this many hours.
    'keep_hours' => (int) env('DEMO_KEEP_HOURS', 3),

    'portfolio_url' => env('PORTFOLIO_URL', 'https://franciscowebdev.com'),
];
