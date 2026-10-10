# Customer CRUD and Validation Submission Draft

## Draft validation rules

### Customer form

- `full_name`: required, text, 2–100 characters
- `email`: required, valid email format, maximum 100 characters
- `phone`: optional, maximum 20 characters, phone characters only

### User form

- `username`: required, 3–50 characters, approved username characters, unique
- `full_name`: required, text, 2–100 characters

## Required ChatGPT prompt

Generate a short CodeIgniter 4 CRUD workflow description for adding and editing a customer record. Do not provide complete controller, model, or view files. Include 3 possible mistakes that a beginner might make. Label the mistakes clearly so I can study and explain them.

## CRUD workflow description

To add a customer, the user opens the customer form and enters the customer's full name, email, and phone number. The form sends a POST request to a controller method. The controller validates the submitted values, preserves the form with error messages if validation fails, and passes valid data to the CustomerModel. The model inserts the record into the `customers` table, after which the controller redirects the user to the customer list with a success message.

To edit a customer, the user selects an existing record and opens an edit form containing the current values. The controller retrieves the record by its ID and sends it to the view. After the user submits changes, the controller validates the new values and asks the CustomerModel to update the matching record. If validation succeeds, the controller redirects to the customer list. If validation fails, the edit form is displayed again with the submitted values and field-specific errors.

### Beginner mistake 1: skipping server-side validation

A beginner may rely only on HTML attributes such as `required` and `type="email"`. These checks can be bypassed, so CodeIgniter must validate the request again on the server before inserting or updating database records.

### Beginner mistake 2: updating the wrong record

A beginner may use an ID from the URL without checking that the record exists or that the current user is allowed to edit it. This can cause an error or allow one user to change another user's data.

### Beginner mistake 3: forgetting to redirect after a successful POST

A beginner may return the same form directly after inserting or updating. Refreshing the page can then submit the same request again. Redirecting after success follows the POST-redirect-GET pattern and helps prevent duplicate submissions.

## Corrected validation plan

- Validate every create and edit request on the server.
- Trim text values before storing them.
- Require `full_name` and limit it to the database column length.
- Require a valid email address and limit it to 100 characters.
- Allow an empty phone number, but limit its length and accepted characters.
- Confirm the customer ID exists before editing or deleting.
- Use a uniqueness rule for usernames and handle the current record correctly when editing.
- Use CSRF protection for create, edit, and delete forms.
- Escape customer values when displaying them in views.
- Use Query Builder or model methods instead of concatenating SQL strings.
- Redirect after successful create, update, or delete operations.

## CRUD and file-upload risks

1. **Unauthorized CRUD action:** A user might change an ID in the request and edit or delete another customer's record. Authentication and authorization checks must happen before the database operation.

2. **Mass assignment:** Accepting every submitted field could let a user change protected values such as the record ID or creation date. Models should allow only intended form fields.

3. **Cross-site request forgery:** A third-party page could submit a request using a logged-in user's session. CSRF tokens should protect state-changing forms.

4. **Unsafe output:** A customer name containing HTML or JavaScript could execute in the browser if it is displayed without escaping. Views should escape user-controlled values.

5. **Unrestricted file upload:** If profile images or attachments are added later, checking only a filename extension is insufficient. The server should check MIME type, extension, size, generated filename, and storage location.

6. **Executable upload:** An uploaded script could be executed if files are stored in a web-accessible directory. Uploads should be stored safely and served as non-executable content.

## Screenshot requirement

Take screenshots of the complete ChatGPT conversation showing the draft rules, required prompt, workflow description, labeled mistakes, corrected plan, and risk list. Insert those screenshots into the final submission.
