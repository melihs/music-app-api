
## Music App Api

## Libraries in the Project
 - Laravel/passport (Laravel Passport is an OAuth2 server)

## All Endpoints
```
- GET  /api/users
- GET  /api/favorites
- POST /api/favorite/{song_id}/add
- POST /api/favorite/{song_id}/remove
- POST /api/favorite/{song_id}/play
- POST /api/favorite/{song_id}/pause
- POST /api/favorite/{song_id}/volume
- GET  /api/categories
- GET  /api/categories/:id
- GET  /api/songs 

```

### Getting Started

### Installation (Manual)
```console
$ git clone http://github.com/onerciller/music-app-api    
$ cd music-app-api && composer install 
$ php artisan migrate:fresh --seed 
$ php artisan passport:install 

```
### Installation (Docker)

```console
$ git clone http://github.com/onerciller/music-app-api    
$ cd music-app-api && composer install 
$ docker-compose run app bash
$ php artisan migrate:fresh --seed 
$ php artisan passport:install
$ docker-compose up 

```

### Tests 
For tests, you should write command the following in project directory. 
I hopefully, all tests will be pass successfully :)

``` 
./vendor/bin/phpunit 
```
