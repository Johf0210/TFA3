# CodeIgniter POS Foundations

This project satisfies the IT0049 TFA2 requirements for a four-page CodeIgniter 4 POS application backed by MySQL.

## Pages

- `/` — landing page
- `/about` — project explanation
- `/customers` — customer records retrieved through `CustomerModel`
- `/users` — user records retrieved through `UserModel`

## Setup

1. Install PHP 8.0 or newer, Composer, and a local web server.
2. Create a standard CodeIgniter 4 app with `composer create-project codeigniter4/appstarter pos-foundations`.
3. Copy this folder's `app` and `public/assets` folders into the generated project, replacing matching folders.
4. Copy `.env.example` to the generated project's `.env` file.
5. Set `app.baseURL` in `.env` to `http://localhost:8080/`.
6. Create the MySQL database and tables by running `database/schema.sql`.
7. Update the database values in `.env` if your MySQL username or password is different.
8. From the generated project folder, run `php spark serve`.
9. Open `http://localhost:8080/` in a browser and test all four links.

No database is used in this module. The customer and user arrays are temporary in-memory data sources.

## Database schema draft

The `database/schema.sql` file is the database export required by TFA2 and TFA3. The controllers retrieve records through CodeIgniter Models using Query Builder's `findAll()` method.

## Validation forms

The Customer Accounts and User Accounts pages include create forms. The controllers validate submitted values on the server before inserting them. The forms also use CSRF fields and escape displayed values.

## TFA3 edit and upload workflow

Customer edit URLs use `/customers/{id}/edit`. User edit URLs use `/users/{id}/edit`. User avatar uploads accept JPG or PNG files up to 2 MB, resize them to a 300-by-300 display copy, save the file in `public/uploads`, and store only the generated filename in the `users.avatar` column. The listing uses `avatar-placeholder.svg` when no avatar exists.
