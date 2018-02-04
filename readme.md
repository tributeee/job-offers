# Job Board Project
# Author: Uros Mancic

# Installation

### Copy the .env.example to .env file

### Set up your Mailtrap credentials in the .env file

### Set up APP_URL in the .env file

### Install dependencies and dump-autoload
```sh
composer install
composer dump-autoload
```
### DB migration
```sh
php artisan migrate
```
### Seed database with moderator credentials and example job posts
```sh
php artisan db:seed
```
### You can login as moderator to review job posts on the ```/login``` route (e.g. http://job-board.test/login) using following credentials:
```sh
mail: moderator@job-offers.com
password: secret
```