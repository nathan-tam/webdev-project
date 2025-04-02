# General Information - booked
This document provides general information about the website.

## Website general information
The purpose of this website is to create a cataloguing web application that allows users to catalogue the books they've read. The website focuses on simplicity and mobile-friendly design.
* The website is divided into two sections:
    * The first section is visible to guests (users who aren't logged in) and consists of:
        * A simple landing/welcome page
        * An AboutUs page that describes the booked team
        * A Registration page to allow users to make a new account and choose their password
        * A Login page that allows users to sign in and access the restricted user-specific section of the website
    * The second section of the website is restricted to logged-in users.
        * A bookshelf page that displays a list of the books that the user has added to their account. Users can only see their own bookshelf. Users can remove books from the list as well.
        * A search page that allows users to search for books. This page also displays the list of results and allows users to add books to their bookshelf.

## Technical information

* The website's Tech Stack is basic:
    * HTML, CSS, and JavaScript for the front end.
    * PHP and MySQL for the back end.
    * XAMPP was used to provide the webserver and database
    * Supporting programs for design and content include: VSCode, Copilot, Figma, LucidChart, Google Gemini

* `connector.php` has the

* Login and Registration information
    * The login and registration system is designed to provide a secure and user-friendly authentication process. The login.php and registration.php pages allow users to supply their credentials, while the corresponding loginScript.php and registrationScript.php handles the backend logic. This ensures that only valid users can access their accounts while providing robust error handling and security measures. 
        * Note that the user's password is hashed on the front end before being sent to the back end. The password is hashed a second time on the backend before being verified against the hashed password stored in the database.
        * If an error occurs (username already taken, wrong password), the user is shown an informational error so they can try submitting their information again.
    




## Team roles
          Team Leader:                    Jonathan Latkowcer
          Back End Developer:             Ryan Marshall
          Front End Designer:             Mikaela Cotter
          Front End Developer:            Nathan Tam

Jonathan Latkowcer and Nathan Tam
Team Leader and Front End Developer