# Doaa-Private-Messaging-System
After downloading the project, place it in the installation directory that contain 'xampp\htdocs' as C:\xampp\htdocs.
Start MYSQL from the XAMPP control panel.
In the browser type http://localhost/phpmyadmin/, create a new database called messages and import the attaches (messages.sql) in it.
Open the the home page index.php with google chrome.
Replace the file:///C:/xampp/htdocs with 'localhost'.
You have two choose login if you have an account in my system and if you haven't, you must choose register.
Choosing register, left you with a form to type a username and an email address that are not be used in the users table in the database named messages, the password must ne at least 8 and has a combination of (uppercase letter,lowercase letter,number and special characters). Filling the form correctly will showed by a sucess message with a link to login page. Errors prevent you from completing and an error message is showed under the uncorrect field. Your username, email and you hashed password are stored in the users table.
Choosing Login will ask you for you username and password credentials. If you have an account but forgets your password, you can reset it by pressing Forget password, left you with the username ad email addresss you used in the regerstration from, if you type them correctly and they already in the databased of users, you will bw asked to type a new password and confir it, then go back to the login page
After logging, you left with the welcome page that let you send a new message to others and can press inbox button to see your recieved messages or press outbox to see your sent messages, they are showed in a table. 
Messages are saved in the messages table in the database named messages as encrypted and when pressing inbox or outbox the are decrpted again.

