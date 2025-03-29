# NET 3010 Final Project
The purpose of this website is to create a cataloguing web application that allows users to catalogue the books they've read.
* We use the ISBNdb API to retrieve information about a user’s entered books, allowing users to search by title or author.
* A user’s collection of book information will be saved to and loaded from our own database in the backend.
* Users can also record notes about the book that is saved with their catalogue.
## Team Roles
          Team Leader:                    Jonathan Latkowcer
          Back End Developer:             Ryan Marshall
          Front End Designer:             Mikaela Cotter
          Front End Developer:            Nathan Tam

## Tech Stack
* HTML, CSS, and JavaScript for the front end.
* PHP and SQL for the back end.
* Figma for design prototyping and page mapping.

## Technical Information
The following are the main pages that make up our website and a brief description of each.
* `index.php`, the main landing page. Contains the login button and tool explanation.
* `login.php`, the login page a user sees if they are logged out. Users are not be able to access any other part of the website until they are logged in.
* `register.php`, the page a user sees if they choose to register from the login page.
* `search.php`, the page users access to search for books. Contains a search bar in the middle, similar to the Google homepage.
* `bookshelf.php`, the page users access to see the books they’ve already catalogued.

Our Database Scheme:
* Users and their logged books are related together with a 'usersbooks' join table.
* Everytime a user logs a book, a new entry is made into the table with their user ID and the book's ISBN.
* This way, we can ensure every row is always unique.
