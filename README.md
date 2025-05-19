# Laravel Categories CRUD (с поддержкой вложенности)

Это тестовое Laravel-приложение реализует CRUD-интерфейс для управления категориями с поддержкой вложенности и drag & drop reorder через [Nestable2](https://github.com/RamonSmit/Nestable2).

## ⚙️ Стек

- Laravel 9+
- PHP 8.1+
- SQLite / MySQL
- Laravel Sail (Docker)
- Blade (шаблоны)
- Nestable2 (jQuery-плагин)

---

## 🚀 Быстрый старт

### 1. Клонируй репозиторий
```bash
git clone https://github.com/your-username/laravel-categories.git
cd laravel-categories
```
### 2. Скопируй .env
```bash
cp .env.example .env
```
3. Установи зависимости
```bash
composer install
```
4. Запусти Laravel Sail
Если Sail не установлен:
```bash
composer require laravel/sail --dev
php artisan sail:install
```
Затем запусти проект:
```bash
./vendor/bin/sail up -d
```
5. Сгенерируй ключ
```bash
./vendor/bin/sail artisan key:generate
```
6. Запусти миграции
```bash
./vendor/bin/sail artisan migrate
```
