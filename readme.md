## User / Role Management CRUD for managing Simple HTTP CRUD API in Lumen 

Simple APIs to manage CRUD of users along with associated roles

## Steps to install the project on local

Run the following steps:

```
composer install
```

Edit .env file and make your changes to database credentials
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=homestead
DB_USERNAME=homestead
DB_PASSWORD=secret
```

Migrate the database tables
```
php artisan migrate
```

Seed the tables with some test data
```
php artisan db:seed
```

We are ready to serve the app on local server
```
php -S localhost:8000 -t public
```

Now you can access your api by going to localhost:8000/api/v1 on your browser

Here are the urls:
* Create user : [POST] localhost:8000/api/v1/user
    * Post Data Required: (name, email, address, role_id)
* View user : [GET] localhost:8000/api/v1/user/(user-id)
* Update user : [PUT] localhost:8000/api/v1/user/(user-id)
* Delete user : [DELETE] localhost:8000/api/v1/user/(user-id)
* View all users : [GET] localhost:8000/api/v1/users

## Testing

Run the following for testing

```
./vendor/bin/phpunit
```
