# laravel-api
This API contains the endpoint for book management. This API can handle:
1. Book creation, consists of title, body and rating
2. Get all book data
3. Get book data based on the book id
4. Update book data based on the book id
5. Delete book data based on the book id

Authorization used in this API are 'Basic Auth', where the default credentials are:
Username: apiuser
Password: passapiuser123

Tech Stack used for this API are:
1. MySQL (Currently the API are connected to local database)
2. Laravel 8
Optional:
Postman to test the API

How to run the API:
1. Clone the API repository
2. Run 'php artisan serve'
3. The API will be available at 'http://127.0.0.1:8000/api/books'
