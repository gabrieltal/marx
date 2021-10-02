# Marx

<img width="100%" alt="marx_homepage" src="https://user-images.githubusercontent.com/20470949/135734334-6f7b4487-e75c-465f-9fb4-27206880f933.png">

## Overview

Social platform for communists to gather and promote their ideology.

## Background

I made this site for fun, just kind of a random idea I had. I made it while learning PHP and Laravel. I really liked learning PHP and Laravel. It was kinda like the wild west since it isn't as opinionated as Rails and it is missing some bits that Rails has. It also has some nice features that I kind of liked, Request classes are interesting. I never deployed this bad boy, so if you want to play around with it you'll have to go through the [Installation](https://github.com/gabrieltal/marx#installation) section to install it locally.

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
