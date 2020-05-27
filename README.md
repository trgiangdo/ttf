**_This project is currently in development._**

## Boost up the website

First, you need to create all neccessary tables with seeder
```shell
php artisan migrate --seed
```
UserSeeder will create 13 users, with 3 first users are admin@gmail.com, editor@gmail.com, user@gmail.com, the rest are all random users.

Front-end for /exam/create and /exam/{exam}/edit are built on Vue. If you change anything, make sure to run
```shell
npm run dev
```
or
```shell
npm run watch
```

## Folder structure

- resources/views:
    - auth: Laravel's authentication, contain login, register ... pages use in UserController
    - components: contains master layout and orther components
    - exam: contains exams pages used in ExamController
    - homepage: contains homepage and other pages in IndexController pages
    - users: contains pages for admin to update users role in UserController@edit-update

- resources/lang: Contains language packages  // need to translate
    - en: English
    - vn: Vietnamese

- resources/js: Contains Vue components
    - create_exam.js, edit_exam.js: main components
    - components: contains childrens components
    > Whenever create new main components, you need to update webpack.mix.js to compile Vue to js file place in *public* folder

- storage/app/public: public files, access by call asset in php files or *app_url*/*relative path to resource file*

- database/factories: Contain Laravel's factories to create dummy data for seeder; read [Laravel Factories Document](https://laravel.com/docs/7.x/database-testing#generating-factories)

- database/seeds: Contain seeder when run <code>php artisan migrate --seed</code> or <code>php artisan db:seed --class=*seeder_name*</code>; read [Laravel Seeder Document](https://laravel.com/docs/7.x/seeding#writing-seeders)

- app/Http/Controllers: Contain all app's controllers

- app/User-Exam-Score: Main model

- app/User/...: User's children models that belongs to User

- app/Exam/...: Exam's children models that belongs to Exam

- app/Policies: App's policies to protect methods; read [Laravel Policies Document](https://laravel.com/docs/7.x/authorization#creating-policies)

- app/Requests: Contains request file to validate form request; read [Laravel Validation Document](https://laravel.com/docs/7.x/validation#creating-form-requests)

## TODO

- Validate data when create new exam using AJAX
- Rewrite the exam page using Vue, shuffle Part 5 6 7 questions and answers
- Change user's skill tracking when he finished one exam
- Recommend a suitable custom exam for user base on his skill
- Determine difficulty level of a question type base
- Password reset
- Add a way for user to update their information or delete the account

## License

This is an open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
