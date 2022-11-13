## About
An application for property listing.

## Requirements
- PHP >= 7.4
- Codeigniter >= 4

## Installation 
To utilizes composer to manage its dependencies. So, before using this application, make sure you have composer installed on your machine. To download all required packages run this command.
- composer install `OR` COMPOSER_MEMORY_LIMIT=-1 composer install

## Database Setup
You need to create a .env file from. env.example. For this run this command if .env not exists.
- cp env .env

Update environment variable  
- CI_ENVIRONMENT = development

Now, set your database credential against these in .env file.

- database.default.hostname = host
- database.default.database = database
- database.default.username = username
- database.default.password = password

Use these commands to create tables with data.
```
- php spark migrate
- php spark db:seed RealEstateSeeder
```

## How To Run
- php spark serve
