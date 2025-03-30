

INSERT INTO users(username, passwordHash) VALUES ('jonathan', '$2y$10$SvwZrUoVtZKD3r6SGnJUjOq0oY9t9a5ca91Tf/EPp/62Bq7L3H.dG');
INSERT INTO users(username, passwordHash) VALUES ('nathan', '$2y$10$SvwZrUoVtZKD3r6SGnJUjOq0oY9t9a5ca91Tf/EPp/62Bq7L3H.dG');
INSERT INTO users(username, passwordHash) VALUES ('mikaela', '$2y$10$SvwZrUoVtZKD3r6SGnJUjOq0oY9t9a5ca91Tf/EPp/62Bq7L3H.dG');
INSERT INTO users(username, passwordHash) VALUES ('ryan', '$2y$10$SvwZrUoVtZKD3r6SGnJUjOq0oY9t9a5ca91Tf/EPp/62Bq7L3H.dG');

INSERT INTO books(ISBN, title, author, description, coverImage) 
VALUES 
('1111111111111', 'How to Impress your Professor', 'Student Etudiant', 'A groundbreaking guide to submitting assignments 5 minutes before the deadline.', 'images/bookNoCover.png'),
('2222222222222', 'Learning WebDev in 24 Hours', 'Grey Squirrel', 'After one sleepless night, you too can have a website that technically works!', 'images/bookNoCover.png'),
('3333333333333', 'Presentation Skills for the Busy Student', 'Power Point', 'Master the art of reading slides word-for-word while pretending to make eye contact.', 'images/bookNoCover.png');


INSERT INTO usersbooks(userID, ISBN) VALUES (1, '1111111111111');
INSERT INTO usersbooks(userID, ISBN) VALUES (1, '2222222222222');
INSERT INTO usersbooks(userID, ISBN) VALUES (1, '3333333333333');
