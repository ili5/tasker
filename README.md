# TaskeR App

Simple task application with user authorization and
authentication, projects, boards and comments system

# Instalation

  1. ``composer install``
  2. ``cp .env.exampl .env``
  3. ``cp Homestead.dist.yaml Homestead.yaml`` and change path
  4. ``php artisan key:generate``  
  5. ``npm install``
  6. ``vagrant up``
  7. on Vagrant machine run: 
    ``php artisan passport:install`` and ``php artisan key:generate``