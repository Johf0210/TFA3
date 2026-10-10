# POS Database Schema Review Draft

## Proposed schema

The database has two tables: `customers` and `users`. The `customers` table stores an ID, full name, email, phone number, and creation date. The `users` table stores an ID, username, full name, and creation date. Both tables use an auto-incrementing integer primary key. Usernames are required to be unique.

## Required ChatGPT review prompt

I am a student in Web System Technologies learning CodeIgniter 4 database models. Review my proposed POS database schema below. Do not rewrite the whole activity for me. Identify possible problems only in field naming, data types, primary keys, required fields, and whether the schema can support displaying customer accounts and user accounts in CodeIgniter views. Give your answer in three sections: 1. What is correct, 2. What needs correction, 3. Questions I should ask myself before finalizing the schema. Here is my schema: [paste the proposed schema above]

## Review response

### 1. What is correct

- The two tables match the required customer and user account pages.
- Both tables have clear primary keys: `customer_id` and `user_id`.
- `VARCHAR` is appropriate for names, emails, usernames, roles, and phone numbers.
- The username field is unique to help prevent duplicate user accounts.
- The schema contains the fields required by the CodeIgniter views.

### 2. What needs correction

- `phone` should remain a text field because phone numbers may contain leading zeroes, spaces, country codes, or symbols.
- The provided schema does not include a password field, so authentication is outside the scope of this activity.
- The email field is not unique in the provided schema; that is acceptable if the activity does not require unique customer emails.
- The CodeIgniter models should select only display-safe fields for the views.

### 3. Questions I should ask myself before finalizing the schema

- Should a customer phone number be optional?
- Do I need separate first-name and last-name fields?
- Will the application need roles or authentication in a later activity?
- Should customer email addresses be unique in a future version?
- Can my CodeIgniter models retrieve these fields and pass them to the views?
