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
* `index.html`, the main landing page. Contains the login button and tool explanation.
* `login.html`, the login page a user sees if they are logged out. Users are not be able to access any other part of the website until they are logged in.
* `register.html`, the page a user sees if they choose to register from the login page.
* `search.html`, the page users access to search for books. Contains a search bar in the middle, similar to the Google homepage.
* `readlist.html`, the page users access to see the books they’ve already catalogued.

Below are the outlines of our functions used to make back end calls:
* `getBooks(string: search term)`
* `addBook(string: ISBN, string: username, string: password)`
* `rmBook(string: ISBN, string: username, string: password)`
* `listBooks(string: username, string: password)`
