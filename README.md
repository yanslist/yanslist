## Installation

1. clone repo or download the latest releases
   at  [https://github.com/mrlinnth/yanslist](https://github.com/mrlinnth/yanslist)
2. run `composer install`
3. create `.env` file by duplicating and renaming `.env.example` file
4. create your database and update `.env` file with your database credentials
5. change `APP_URL` in `.env` file with your app url
6. setup google recaptcha
    - refer
      to [https://itnext.io/how-to-use-google-recaptcha-with-vuejs-7756244400da](https://itnext.io/how-to-use-google-recaptcha-with-vuejs-7756244400da)
    - change `MIX_RECAPTCHA_SITEKEY`, `RECAPTCHA_DOMAIN`, `RECAPTCHA_SECRET` in `.env` file with your recaptcha data
7. run `composer install`
8. run `php artisan key:generate`
9. run `php artisan migrate` for schema and table creation
10. run `php artisan ylist:import-region` to import region, district, township data
11. run `php artisan db:seed --class=PostSeeder` to generate dummy data _(optional)_
12. run `npm install`
13. run `php artisan VueTranslation:generate` to share laravel lang files with vue
14. run `npm run dev`
