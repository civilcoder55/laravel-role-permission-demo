<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">

  <h3 align="center">Album Task</h3>

  <p align="center">
   PHP WEB DEVELOPER ASSIGNMENT
  </p>
</p>

## Usage

1. Clone the repo

  ```sh
  git clone https://github.com/civilcoder55/laravel-task.git
  ```

2. install composer packages

  ```sh
  composer install
  ```

3. update env file with database connection

4. migrate database

  ```sh
  php artisan migrate
  ```
5. seed database

  ```sh
  php artisan db:seed
  ```

6. access website at and login in with  super@admin.com:Password123@
  ```sh
  http://localhost:8000 
  ```

## USER TO DO

- [x] Registration page (Name, Email, Password).
- [x] Login page (Email, Password).
- [x] Home page for albums listing (only show public albums).
- [x] Profile page for logged user to edit personal info.
- [x] Albums page for logged user to albums management (view, add, edit, delete)
- [x] User could add two types of albums (public/private).

## ADMIN TO DO

- [x] Login page (Email, Password).
- [x] Dashboard page to show website stats (albums count, users count, etc…).
- [x] Roles page for roles & permissions management (view, add, edit, delete).
- [x] System admins page for admins management (view, add, edit, delete).
- [x] Registered users page for user management (and manage their albums).
- [x] Admin could delete not proper album.