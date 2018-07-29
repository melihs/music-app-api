
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
- git clone http://github.com/onerciller/music-app-api    
- cd music-app-api && composer install 
- php artisan migrate 
- php artisan passport:install 
- php artisan db:seed

### Tests 
For tests, you should write command the following in project directory. 
I hopefully, all tests will be pass successfuly :)

``` 
./vendor/bin/phpunit 
```
