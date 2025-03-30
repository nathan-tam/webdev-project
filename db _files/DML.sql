

INSERT INTO users(username, passwordHash) VALUES ('jonathan', '$2y$10$SvwZrUoVtZKD3r6SGnJUjOq0oY9t9a5ca91Tf/EPp/62Bq7L3H.dG');
INSERT INTO users(username, passwordHash) VALUES ('nathan', '$2y$10$SvwZrUoVtZKD3r6SGnJUjOq0oY9t9a5ca91Tf/EPp/62Bq7L3H.dG');
INSERT INTO users(username, passwordHash) VALUES ('mikaela', '$2y$10$SvwZrUoVtZKD3r6SGnJUjOq0oY9t9a5ca91Tf/EPp/62Bq7L3H.dG');
INSERT INTO users(username, passwordHash) VALUES ('ryan', '$2y$10$SvwZrUoVtZKD3r6SGnJUjOq0oY9t9a5ca91Tf/EPp/62Bq7L3H.dG');

INSERT INTO books(ISBN, title, author, year, coverImage) 
VALUES 
('1111111111111', 'How to Impress your Professor', 'Student Etudiant', '2005', 'images/bookNoCover.png'),
('2222222222222', 'Learning WebDev in 24 Hours', 'Grey Squirrel', '1045', 'images/bookNoCover.png'),
('3333333333333', 'Presentation Skills for the Busy Student', 'Power Point', '1993', 'images/bookNoCover.png');


INSERT INTO usersbooks(userID, ISBN) VALUES (1, '1111111111111');
INSERT INTO usersbooks(userID, ISBN) VALUES (1, '2222222222222');
INSERT INTO usersbooks(userID, ISBN) VALUES (1, '3333333333333');
INSERT INTO usersbooks(userID, ISBN) VALUES (2, '3333333333333');
