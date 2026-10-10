# TFA2 Submission Checklist

## Required project work

- Configure the CodeIgniter database settings in `.env`.
- Create the `pos_foundations` MySQL database.
- Run `database/schema.sql` to create and populate the `customers` and `users` tables.
- Create `CustomerModel` and `UserModel`.
- Use `findAll()` in the controllers instead of static PHP arrays.
- Confirm both views display database records in the browser.

## Evidence to submit

1. GitHub repository link: `https://github.com/Johf0210/TFA1`
2. Hosted working application link.
3. Screenshot of the database tables and sample records.
4. Screenshot of the customer accounts page showing database records.
5. Screenshot of the user accounts page showing database records.
6. Database export file: `database/schema.sql`.
7. A short reflection.

## Reflection draft

This activity helped me move the POS application from temporary PHP arrays to a real MySQL database. I learned how to configure the CodeIgniter database connection and create tables using a schema. I also learned that a CodeIgniter Model represents a database table and can retrieve records with `findAll()` through Query Builder.

The main change from the previous activity was in the source of the data. The views still display records using loops, but the controllers now call `CustomerModel` and `UserModel` instead of defining the records directly. This separation makes the application easier to update because the data is stored permanently in the database.

Before submitting, I need to verify that the database credentials are correct, that both models retrieve records successfully, and that the hosted application matches the code in my GitHub repository.
