<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.
## Screenshoot
![image](https://github.com/ugunNet21/laravel-ecommerce10-jetstream/assets/45864165/215d9241-6948-43a0-9f87-f36088a5ffa0)

## Guide
*  Clone Repository ini dengan cara `git clone https://github.com/m
*   Buka folder project di terminal dan jalankan perintah composer install
*   Setup database sesuai kebutuhan (Buat database baru dan setting di .env)
*   Jalankan perintah 
```bash
php artisan key:generate untuk generate
``` 
*   Jalankan 
```bash
perintah php artisan migrate --seed
```
 untuk melakukan migration dan seeding data ke database
*   Jika ingin menambahkan fitur lainnya seperti user authentication maka dapat mengikuti tutorial pada link berikut : 
*   Jika ingin menggunakan fitur email verification maka jalankan perintah php artisan make:mail VerifyEmail
    dan pastikan file tersebut sudah diisi dengan code yang benar. Kemudian buka file App\Providers\AppServiceProvider.php
    dan pastikan file app\Mail\VerifyEmail.php sudah terisi dengan code yang benar. Kemudian buka file App\User.php dan
*   Pastikan semua konfigurasinya sudah benar lalu jalankan server local dengan perintah php artisan serve
**Note :** Untuk menampilkan data user yang telah terdaftar silahkan buka halaman /users dan masukkan username dan password yang

## Features
1. Login & Register with Email Verification
2. Forgot Password
3. Reset Password
4. User Profile
5. Admin Dashboard
6. CRUD Products
7. Shopping Cart
8. Checkout Process (Stripe Payment Gateway)
9. Categories Page
10. Blog Posts with Pagination
11. Contact Form

## Note
Untuk Stripe Payment Gateway saya gunakan package dari laravel official yaitu `Laravel\Cashier\CashierServiceProvider`. Unt
Untuk fitur payment gateway saya gunakan Stripe sebagai contoh. Untuk implementasi lainnya silahkan diganti dengan yan
Saya tidak menyertakan gambaran UI karena saya lebih fokus pada implementasi logikanya. Namun, jika Anda memer 
Untuk fitur Stripe Payment Gateway, silahkan register di [stripe.com](https://dashboard.stripe.com/register), setelah
Saya tidak menyertakan gambaran UI karena saya lebih fokus pada implementasi logikanya. Namun jika Anda ingin memb
Untuk Stripe Payment Gateway yang digunakan pada saat checkout process, silahkan register di stripe.com dan masukkan skripny
Untuk Stripe Payment Gateway saya gunakan Sandbox, jadi Anda tidak akan dikenakan biaya apapun. Namun jika ingin menggunakan produksi, Anda harus membuat account
Untuk fitur Stripe Payment Gateway, silahkan register di stripe.com dan masukkan skrip yang ada pada file `.env`</
Untuk fitur payment gateway saya gunakan Stripe sebagai contoh. Untuk implementasi lainnya silahkan ganti pada file
Saya tidak menyertakan gambaran UI karena saya lebih fokus pada implementasi logikanya. Namun jika Anda ingin memb
Untuk fitur Stripe Payment Gateway, Anda harus membuat  account di Stripe dan memasang package stripe/stripe-php versi

## langkah pembuatan
* install proyek 
```bash
laravel new laravel-ecommerce
```
```bash
composer create-project laravel/laravel nama-proyek
```
* instal Livewire, Jetstream, Mysql,  Stripe dan Composer
```bash
composer require laravel/jetstream
php artisan jetstream:install livewire

```
* konfigurasi peran
```bash
'roles' => [
    'super-admin' => 'Super Admin',
    'admin' => 'Admin',
    'pegawai' => 'Pegawai',
    'user' => 'User',
],

```
* Jalankan Migration
```bash
php artisan migrate
```
* Tambahkan Kolom Peran: Buka file database/migrations/xxxx_xx_xx_create_users_table.php dan tambahkan kolom peran ke dalam fungsi up():
```bash
Schema::create('users', function (Blueprint $table) {
    $table->id();
    // kolom-kolom lainnya
    $table->string('role')->default('user');
    $table->timestamps();
});

php artisan migrate
```
* Tambahkan Middleware, Buka file app/Http/Kernel.php dan tambahkan middleware sesuai dengan peran yang diinginkan. Contohnya:
```bash
'admin' => \App\Http\Middleware\AdminMiddleware::class,
'pegawai' => \App\Http\Middleware\PegawaiMiddleware::class,
'super-admin' => \App\Http\Middleware\SuperAdminMiddleware::class,

```
* Buat Middleware:
Buat middleware untuk masing-masing peran di dalam direktori app/Http/Middleware. Contoh untuk AdminMiddleware.php:

```bash
public function handle(Request $request, Closure $next)
{
    if (auth()->user() && auth()->user()->role == 'admin') {
        return $next($request);
    }

    abort(403, 'Unauthorized');
}
```
* Tambahkan Peran ke Model User:
Buka file app/Models/User.php dan tambahkan metode untuk menentukan apakah pengguna memiliki peran tertentu:
```bash
public function isAdmin()
{
    return $this->role === 'admin';
}

public function isPegawai()
{
    return $this->role === 'pegawai';
}

public function isSuperAdmin()
{
    return $this->role === 'super-admin';
}

```
* Gunakan Middleware pada Route:
Gunakan middleware yang telah dibuat pada rute-rute yang memerlukan autentikasi berdasarkan peran:
```bash
use App\Http\Controllers\FrontendController;

// Rute Frontend
Route::get('/', [FrontendController::class, 'index'])->name('home-fe');

// Rute Dashboard yang memerlukan autentikasi
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    // Rute Dashboard untuk User Biasa
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Rute Dashboard untuk Admin
    Route::middleware(['admin'])->group(function () {
        Route::get('/admin/dashboard', function () {
            return view('admin.dashboard');
        })->name('admin.dashboard');
    });

    // Rute Dashboard untuk Pegawai
    Route::middleware(['pegawai'])->group(function () {
        Route::get('/pegawai/dashboard', function () {
            return view('pegawai.dashboard');
        })->name('pegawai.dashboard');
    });

    // Rute Dashboard untuk Super Admin
    Route::middleware(['super-admin'])->group(function () {
        Route::get('/super-admin/dashboard', function () {
            return view('super-admin.dashboard');
        })->name('super-admin.dashboard');
    });
});

```
* Simpan Peran pada Pendaftaran:
Buka file app/Http/Controllers/Auth/RegisterController.php dan tambahkan logika untuk menyimpan peran:
```bash
protected function create(array $data)
{
    return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password']),
        'role' => $data['role'], // Simpan peran
    ]);
}

```
* Gunakan Peran pada Middleware (Opsional):
Jika Anda ingin menggunakan peran pada middleware, Anda dapat mengubah middleware sesuai dengan peran yang disimpan di sesi:
```bash
'admin' => \App\Http\Middleware\AdminMiddleware::class,
'pegawai' => \App\Http\Middleware\PegawaiMiddleware::class,
'super-admin' => \App\Http\Middleware\SuperAdminMiddleware::class,

```
## Buat Seeder
```bash
php artisan make:seeder UsersTableSeeder
```
* Edit Seeder:
Buka file database/seeders/UsersTableSeeder.php dan edit metode run seperti berikut:
```bash
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        // Super Admin
        User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@gmail.com',
            'password' => Hash::make('superadmin123456'),
            'role' => 'super-admin',
        ]);

        // Admin
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123456'),
            'role' => 'admin',
        ]);

        // Pegawai
        User::create([
            'name' => 'Pegawai',
            'email' => 'pegawai@gmail.com',
            'password' => Hash::make('pegawai123456'),
            'role' => 'pegawai',
        ]);

        // User Biasa
        User::create([
            'name' => 'User Biasa',
            'email' => 'user@gmail.com',
            'password' => Hash::make('user123456'),
            'role' => 'user',
        ]);
    }
}

```
* Jalankan Seeder:
```bash
php artisan db:seed --class=UsersTableSeeder
```
## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
