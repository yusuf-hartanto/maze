## Maze - Pola Pertama

- Menggunakan framework [Laravel](https://laravel.com/docs/)
- Menggunakan [vue.js](https://vuejs.org/)

Ketentuan:
- Input: S sebuah positive integer, ukuran maze.
- Output: sebuah pola di layar, yaitu maze berukuran S x S, dengan jalan masuk di kiri atas.
- S dapat dinyatakan dalam 4n - 1, dimana n adalah positive integer.
- Semua tembok tebalnya 1 karakter ("@"), semua jalan lebarnya 1 karakter (" ").

## Instalasi

```
composer install
copy paste .env.example ke .env
php artisan key:generate
php artisan serve
```
```
npm install
sesuaikan MIX_APP_URL dengan hasil php artisan serve
npm run watch / development / production
```