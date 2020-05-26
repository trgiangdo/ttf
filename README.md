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

## TODO
- Validate data when create new exam using AJAX
- Rewrite the exam page using Vue, shuffle Part 5 6 7 questions and answers
- Change user's skill tracking when he finished one exam
- Recommend a suitable custom exam for user base on his skill
- Determine difficulty level of a question type base
- Password reset
- Add a way for user to update their information or delete the account

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
