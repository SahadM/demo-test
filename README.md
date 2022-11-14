## Test projet vente client materiel

  # Stack:
    - Laravel 8
    - MySQL 8
    - Docker
    - PHP 7.4
    - Apache
    - ES6 Javascript
    
   
  # Utilisation sans Docker:
    Avec la stack décrite ci-dessus, executer les commandes suivantes:
    
    ```bash
     composer install
     
     php artisan migrate
     php artisan db:seed --class=DataTestTableSeeder
     php artisan serve
    ```
    
  # Utilisation avec Docker :
  
    chargement de l'image Docker
    
    ```bash
    docker build . -t demo-test
    ```
    
    lancement
    
    ```bash
    docker-compose up -d
    ```
