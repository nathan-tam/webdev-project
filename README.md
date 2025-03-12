# Group Project Proposal – NET3010
## Team Roles
          Team Leader:            	           	Jonathan Latkowcer
          Back End Developer:             	    Ryan Marshall
          Front End Designer:              	    Mikaela Cotter
          Front End Developer:           	    Nathan Tam
 
## Project Proposal:
          -A cataloguing web application that allows a user to catalogue books
          -The website will be a “personal library catalogue”
          -The website will be aimed at a casual home user with a friendly, simple interface
          -Users will be able to log in and view a personal profile/collection
          -Users will be able to add new books and view books that they’ve already added
          -Our website will use a publicly available API to retrieve information about the user’s entered books – retrieving book details by ISBN will likely be easiest
          -The user’s collection of book information will be saved to and loaded from a database in the backend
          -We would like to give the user the ability to search for books by title or author
          -We would like to allow the user to record notes about the book in a text field that is maintained between sessions








## DESIGN DOCUMENT
    -for a book cataloging website
    -Functionality
    -Users should be able to login and logout.
    -Once users are logged in, they should be able to search for a book to add it to their list of ‘completed’ books.
    -This search will query the ISBNdb database with their API.
    -Users should be able to access a page displaying the books they’ve completed.

## Pages
    -index.html, the main landing page. Contains the login button and tool explanation.
    -login.html, the login page a user sees if they are logged out. They should not be able to access any other part of the website until they are logged in.
    -register.html, the page a user sees if they choose to register from the login page.
    -search.html, the page users access to search for books. Contains a search bar in the middle, similar to the Google homepage.
    -readlist.html, the page users access to see the books they’ve already catalogued.

## Tech Stack
    -HTML, CSS, and JavaScript for the front end.
    -PHP and SQL for the back end.
    -Back end calls
    -getBooks(string: search term)
    -addBook(string: ISBN, string: username, string: password)
    -rmBook(string: ISBN, string: username, string: password)
    -listBooks(string: username, string: password)

