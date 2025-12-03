# Laravel Role-Based Starter (PHP 8.1+)

This repository contains a Laravel 10 starter designed for:

1. Email/password login
2. Role-wise sidebar permissions
3. A simple dashboard
4. A super-admin role with full access

> **Heads up:** Composer downloads are still blocked in this environment. You can still view and modify the code here, but to run it you must install dependencies in an environment with internet access or a pre-populated `vendor/` directory.

## Quick start (once you have Composer access)

```bash
# 1) Install dependencies
composer install

# 2) Copy environment file and generate an app key
cp .env.example .env
php artisan key:generate

# 3) Configure your database in .env, then migrate and seed
php artisan migrate --seed

# 4) Run the dev server
php artisan serve
```

You can sign in with the seeded super-admin account:

```
Email: superadmin@example.com
Password: password
```

## Feature overview
- **Authentication:** Traditional email/password login with remember-me support.
- **Roles:** `super-admin`, `admin`, `editor`, and `viewer` roles are seeded. Users can have multiple roles.
- **Sidebar permissions:** Links render conditionally based on the authenticated user’s roles (see `resources/views/partials/sidebar.blade.php`).
- **Super-admin:** Protected routes (e.g., `/admin/roles`) are guarded by the `EnsureUserHasRole` middleware.
- **Dashboard:** Shows the logged-in user and assigned roles.

## Where things live
- Routes: `routes/web.php`
- Controllers: `app/Http/Controllers/Auth/LoginController.php`, `app/Http/Controllers/DashboardController.php`
- Middleware: `app/Http/Middleware/EnsureUserHasRole.php`
- Models: `app/Models/User.php`, `app/Models/Role.php`
- Migrations: `database/migrations/*`
- Seeders: `database/seeders/*`
- Views: `resources/views/*`

## Integrating with a fresh Laravel install
If you prefer to start from a new Laravel project, you can scaffold one with `composer create-project laravel/laravel .` and then copy the files from this repo over the generated structure. After copying, register the `EnsureUserHasRole` middleware alias in `app/Http/Kernel.php`, ensure `HasApiTokens` and Sanctum are present in `User.php`, and run `php artisan migrate --seed` to populate roles and users.
