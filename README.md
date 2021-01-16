# Marx

## Overview

Social platform for communists to gather and promote their ideology. I made this for fun while learning PHP and Laravel.

## Installation

### Requirements

- [PHP 8](https://www.php.net/downloads.php)
- [Laravel 7](https://laravel.com/docs/7.x/installation)
- [MySQL](https://www.mysql.com/downloads/)
- [Composer](https://getcomposer.org/download/)

### Setup

```bash
  git clone https://github.com/gabrieltal/marx.git
  cd marx

  # database setup
  mysql -uroot
  CREATE DATABASE laravel

  # application setup
  composer install
  cp .env.example .env
  php artisan serve
```

You can now access the server at http://localhost:8000
