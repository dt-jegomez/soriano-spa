# Laravel-Vue SPA 


## Features

- Laravel 7
- Vue + VueRouter + Vuex + VueI18n + ESlint
- Pages with dynamic import and custom layouts
- Login, register, email verification and password reset
- Authentication with JWT
- Bootstrap 4 + Font Awesome 5

## Installation

- Edite `.env` utilizando el `.env-example` : incluye las credenciales de mailtrap
- `composer install`
- `php artisan key:generate` and `php artisan jwt:secret`
- `php artisan migrate`
- `npm install`

## Usage

#### Development

```bash
# build and watch
npm run watch

# serve with hot reloading
npm run hot
```

#### Production

```bash
npm run production
```



## Email Verification

user: korni.developer@gmail.com
pass: pruebalaravel


MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=8521621dca3723
MAIL_PASSWORD=0c6f864f101f92
MAIL_ENCRYPTION=tls


