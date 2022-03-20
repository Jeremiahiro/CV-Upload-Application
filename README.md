## CV Upload Application

Test Site - https://cv-upload-test.herokuapp.com/login

### Local Setup
- Clone or Download a zip copy of the project
- cp .env.example .env
- php artisan key:generate
- composer install
- Update .env with necessary credentials
- php artisan migrate
- php artisan db:seed
- php artisan serve
