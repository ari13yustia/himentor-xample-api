## Instalasi
- composer install
- copy .env.xample and rename
- set database in env
- php artisan migrate
- php artisan db:seed

## Cara Kerja
Get data Order
- GET : /order

Store data Order
- POST : /order/store
body : ['price','account_id','mentor_id']

Show data Order
- GET : /order/show/{id}

Update data Order
- POST : /oredr/update/{id}
body : ['price','account_id','mentor_id']

Delete data Order
- POST : /order/destroy/{id}
