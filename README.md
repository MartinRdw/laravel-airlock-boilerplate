## About Laravel Airlock

Laravel Airlock provides a featherweight authentication system for SPAs (single page applications), mobile applications, and simple, token based APIs. Airlock allows each user of your application to generate multiple API tokens for their account. These tokens may be granted abilities / scopes which specify which actions the tokens are allowed to perform.

The full documentation is available here https://laravel.com/docs/7.x/airlock

## About this project

This project is a simple boilerplate to quickly set up an API with authentification.

It is composed of 3 routes :

##### Register :
POST : `/api/user/register`

##### Login :
POST : `/api/user/login`

##### Get information (protected by airlock middleware) :
GET : `/api/user`
