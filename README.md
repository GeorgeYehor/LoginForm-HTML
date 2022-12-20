# LoginForm-HTML

**This is an website that displays a login form and a registration form on a web page.**

**The login form has two input fields: one for the email address and one for the password. It also has a submit button to send the form data to the server. The form data is sent using the HTTP POST method and is processed by the sprawdz.php script.**

**The registration form has four input fields: first name, last name, email, and password. It also has a submit button to send the form data to the server. The form data is sent using the HTTP POST method and is processed by the registration.php script.**

***Strona.php*** FILE
``` 
The script begins by starting a session using the session_start() function and then retrieves the email and password stored in the session variables $_SESSION["email"] and $_SESSION["password"].

It then establishes a connection to a MySQL database using the mysqli extension and a $connection object. The mysqli extension is a MySQL Improved Extension that provides an interface for communicating with a MySQL database.

The script then executes a SELECT query to retrieve the user's data from the users table in the database, based on the email and password provided. If a matching record is found, it displays a greeting message and sets the $user variable to the user's email.

If the $_SESSION["email"] variable is not set (i.e., the user is not logged in), the script redirects the user to the login page. Otherwise, it displays a logout button.

The script also includes a form that allows the user to add a new note by entering a description and a date and submitting the form. When the form is submitted, the script executes an INSERT query to add a new record to the notes table in the database.

The script also includes a form for each note that allows the user to delete the note by clicking a delete button. When the button is clicked, the script executes a DELETE query to remove the corresponding record from the notes table.

Finally, the script retrieves all the notes belonging to the user from the notes table and displays them on the page. If the user has no notes, it displays a message indicating that the user doesn't have any notes yet.
```

***Sprawdz.php*** FILE
``` 
This is a PHP script that handles the login functionality for a web application.

The script begins by starting a session using the session_start() function. If the $_SESSION["email"] variable is not set (i.e., the user is not logged in), the script redirects the user to the login page.

The script then establishes a connection to a MySQL database using the mysqli extension and a $connection object. The mysqli extension is a MySQL Improved Extension that provides an interface for communicating with a MySQL database.

It retrieves the email and password entered by the user in the login form from the $_POST variables $_POST["email"] and $_POST["password"], respectively.

The script then executes a SELECT query to retrieve the user's data from the users table in the database, based on the email and password provided. If a matching record is found, it sets the session variables $_SESSION["email"] and $_SESSION["password"] to the email and password provided by the user, respectively, and redirects the user to the main page of the application. If no matching record is found, it displays a message indicating that the user is not registered yet.
``` 
***Registration.php*** FILE
``` 
his is a PHP script that handles the registration functionality for a web application.

The script begins by starting a session using the session_start() function. If the $_SESSION["email"] variable is not set (i.e., the user is not logged in), the script redirects the user to the login page.

The script then establishes a connection to a MySQL database using the mysqli extension and a $connection object. The mysqli extension is a MySQL Improved Extension that provides an interface for communicating with a MySQL database.

It retrieves the first name, last name, email, and password entered by the user in the registration form from the $_POST variables $_POST["first_name"], $_POST["last_name"], $_POST["registr_email"], and $_POST["registr_password"], respectively.

The script then executes an INSERT query to add a new record to the users table in the database, with the provided first name, last name, email, and password.

Finally, it sets the session variables $_SESSION["email"] and $_SESSION["password"] to the email and password provided by the user, respectively, and redirects the user to the main page of the application.
``` 
***logout.php*** FILE
```
This is a PHP script that handles the logout functionality for a web application.

The script begins by starting a session using the session_start() function. It then destroys the current session using the session_destroy() function. This function deletes all the session variables and the session cookie.

Finally, it redirects the user to the login page using the header() function and the Location header.
```
***notes.sql*** FILE
```
This is a MySQL script that creates and populates two tables in a database: notes and users.

The notes table has four columns: id, description, date, and user. The id column is an integer column that serves as the primary key for the table. The description column is a text column that holds the description of the note. The date column is a date column that holds the date when the note was created. The user column is a varchar column that holds the email of the user who created the note.

The users table has four columns: id, first_name, last_name, and email. The id column is an integer column that serves as the primary key for the table. The first_name and last_name columns are varchar columns that hold the first name and last name of the user, respectively. The email column is a varchar column that holds the email of the user.

The script also inserts several rows of sample data into the notes and users tables.

The script should be executed using a MySQL client, such as the mysql command-line client or a graphical tool like PHPMyAdmin.
```
***index.html*** FILE
```
HTML document with two forms. The first form has two input fields: "email" and "password", and a submit button. The second form has four input fields

The first form's action attribute specifies that when the form is submitted, the data is sent to a file called "sprawdz.php" using the POST method. The second form's action attribute specifies that when the form is submitted, the data is sent to a file called "registration.php" using the POST method.

"sprawdz.php" is a script that checks the provided login credentials and "registration.php" is a script that processes user registration.
```
