# TFA3 Submission Checklist

## Required functionality

- `/customers/new` validates and creates customers.
- `/users/new` validates and creates users.
- `/customers/{id}/edit` pre-fills and updates a customer.
- `/users/{id}/edit` pre-fills and updates a user.
- The `users` table includes an `avatar` column.
- User avatar uploads accept JPG and PNG files up to 2 MB.
- Uploaded avatars are resized to display-ready 300-by-300 images.
- Only the generated filename is saved in the database.
- User listings display the avatar or a placeholder image.
- Validation errors redisplay the form and preserve entered values.

## Submission

1. GitHub repository link containing the raw project files and database export.
2. Hosted working application link.
3. Recommended screenshots: new customer form, edit customer form, new user form, edit user form with avatar, validation error, and User Accounts page showing the avatar.

## Before submitting

- Run the updated `database/schema.sql` on a fresh database, or add the `avatar` column to an existing `users` table.
- Confirm the web server can write to `public/uploads`.
- Test an invalid file type, a file over 2 MB, and a valid JPG or PNG.
- Replace the placeholder developer information and test data where appropriate.
