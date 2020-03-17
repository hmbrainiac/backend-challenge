# Backend Coding Challenge

Gemography backend coding challenge.

## Functional Specs

- Develop a REST microservice that list the languages used by the 100 trending public repos on GitHub.
- For every language, you need to calculate the attributes below 👇:
    - Number of repos using this language
    - The list of repos using the language

## Technologies Used/ Required

- PHP (Lumen 7.0.0) preferably version >= 7.4.3
- OpenSSL PHP Extension
- Mbstring PHP Extension
- PHP Curl
- Composer

## Installation

- Clone Repo
- Navigate to project root directory and run 
- Rename .env.example to .env
- Update API_USERNAME and API_PASSWORD

```
composer install
```

## Unit Test

- Navigate to project root directory and run 

```
.\vendor\bin\phpunit .\tests\ChallengeTestCases.php
```


## Run & Test Application

- Navigate to project root directory and run 

```
php -S localhost:8000 -t public
```
This makes your application available on the port 8000 of your local device

- You can then access the solution from your browser using the url

```
http://localhost:8000/most-used-languages
```