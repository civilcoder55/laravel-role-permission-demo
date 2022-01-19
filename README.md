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

- [*] Registration page (Name, Email, Password).
- [*] Login page (Email, Password).
- [*] Home page for albums listing (only show public albums).
- [*] Profile page for logged user to edit personal info.
- [*] Albums page for logged user to albums management (view, add, edit, delete)
- [*] User could add two types of albums (public/private).

## ADMIN TO DO

- [*] Login page (Email, Password).
- [*] Dashboard page to show website stats (albums count, users count, etc…).
- [*] Roles page for roles & permissions management (view, add, edit, delete).
- [*] System admins page for admins management (view, add, edit, delete).
- [*] Registered users page for user management (and manage their albums).
- [*] Admin could delete not proper album.