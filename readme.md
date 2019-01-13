# Modular Blog

Laravel 5.7 ve [nWidart/laravel-modules](https://github.com/nWidart/laravel-modules) kullanarak hazırlanmış basit bir blog projesidir.

Sadece yönetim panelinden oluşmaktadır.

## Kurulum

~~~~
$ git clone https://github.com/eylmz/ModularBlog
$ cd ModularBlog
$ cp .env.example .env
$ composer install
$ php artisan key:generate
~~~~

.env ayarlarını yaptıktan sonra
~~~~
php artisan migrate
php artisan db:seed
php artisan serve
~~~~

## Kullanıcı Hesabı
~~~~
E-Posta: admin@gmail.com
Şifre: 123654
~~~~