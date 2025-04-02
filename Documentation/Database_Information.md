# Database Design

The database is relatively simple, with only three tables. 

- A table for users, which contains their usernames and a hash of their password. The database also automatically assigns a unique userID for each user. The usernames are created by the users when they register. The users also choose their own password, which is stored as a hash in our database (this is industry standard and provides a much higher level of security).

- A table for books, which contains the following information about each book: the ISBN, the title, the author(s), the year, and a link to the book's cover image (if available). The ISBN is used to uniquely identify a book, so books without an ISBN or with a malformed/non-standard ISBN are currently unsupported. The information used to populate this table comes from the Google Books API.

- A table that is used to assign books to users. This table only contains userID-ISBN combinations, allowing the database to track if a user has a certain book in their bookshelf.

The database was designed this way for several reasons:
- The design is normalized to minimize potential errors and avoid repetitive information.
- The combination userID-books table makes assigning books to users simple to manage and allows multiple users to have the same book in their bookshelf, while the book information only needs to be stored once.
- This design also makes it easy for users to remove books without affecting other users: we can remove the specific userID-ISBN entry in the database while leaving the books table untouched. This also gives the website owner the option of preemptively loading popular books into the database or keeping removed books temporarily in case the user wants to re-add them later.

Currently there is no mechanism through the website to remove users or books. These actions can be performed by directly editing the database via a GUI tool like phpMyAdmin or via SQL commands. In the future, an administrator console could be incorporated to the website that allows authorized users (employees) to manage the database to remove stale books or unused user accounts. An account management console could also be added to the website so that users could delete their own account.


Jonathan Latkowcer
Team Leader



