# Doaa-Private-Messaging-System
After downloading the project, place in in the installation directory that contain 'xampp\htdocs' as C:\xampp\htdocs.
Open the the home page is index.php with any browser as google chrome.
Replace the file:///C:/xampp/htdocs with 'localhost'.
You have two choose login if you have an account in my system and if you haven't, you must choose register.
Choosing register, we left you with a form to type a username and an email address that are not be used in the users table in the database named messages, the password must ne at least 8 and has one of uppercase,lowercase,number and special characters. Filling the form correctly will showed by a sucess message with a link to login page. Errors prevent you from completing and an error message is showed under the uncorrect field. Your username, email and you hashed password are stored in the users table.
Choosing Login will ask you for you username and password credentials if you have an account but forget your password, you can reset it by pressing Forget password, left you with the username ad email addresss you used before in the regerstration from, if you type them correctly and they already in the databased of users, you will bw asked to type a new password and confir it, then go back to the login page
After logging, you left with the welcome message that let you send a new message to others and can press inbox button to see your recieved messages or press outbox to see your sent messages, they are showed in a table. 
Messages are saved in the messages table in the database named messages as encrypted and when pressing inbox or outbox the are decrpted again.
