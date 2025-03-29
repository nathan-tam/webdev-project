

INSERT INTO users(username, passwordHash) VALUES ('jonathan', '$2y$10$SvwZrUoVtZKD3r6SGnJUjOq0oY9t9a5ca91Tf/EPp/62Bq7L3H.dG');
INSERT INTO users(username, passwordHash) VALUES ('nathan', '$2y$10$SvwZrUoVtZKD3r6SGnJUjOq0oY9t9a5ca91Tf/EPp/62Bq7L3H.dG');

INSERT INTO books(ISBN, title, author, description, coverImage) VALUES ('9780134190440', 'Java: The Complete Reference', 'Herbert Schildt', 'The Definitive Guide to Java Programming Language', 'images/bookNoCover.png');

INSERT INTO usersbooks(userID, ISBN) VALUES (1, '9780134190440');