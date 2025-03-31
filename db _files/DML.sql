INSERT INTO users(username, passwordHash) VALUES ('jonathan', '$2y$10$88wQD5dzQZ1tUVSkznVtx.BrH2gbijXGgHtqAzaAMDY2vHtmw8gaS');
INSERT INTO users(username, passwordHash) VALUES ('nathan', '$2y$10$88wQD5dzQZ1tUVSkznVtx.BrH2gbijXGgHtqAzaAMDY2vHtmw8gaS');
INSERT INTO users(username, passwordHash) VALUES ('mikaela', '$2y$10$88wQD5dzQZ1tUVSkznVtx.BrH2gbijXGgHtqAzaAMDY2vHtmw8gaS');
INSERT INTO users(username, passwordHash) VALUES ('ryan', '$2y$10$88wQD5dzQZ1tUVSkznVtx.BrH2gbijXGgHtqAzaAMDY2vHtmw8gaS');

INSERT INTO books(ISBN, title, author, year, coverImage) 
VALUES 
('1111111111111', 'How to Impress your Professor', 'Student Etudiant', '2025', 'images/bookNoCover.png'),
('2222222222222', 'Learning WebDev in 24 Hours', 'Grey Squirrel', '1998', 'images/bookNoCover.png'),
('3333333333333', 'Presentation Skills for the Busy Student', 'Power Point', '1993', 'images/bookNoCover.png'),
('9780771038525', 'Sapiens', 'Yuval Noah Harari', '2014-10-28', 'http://books.google.com/books/content?id=Y41zAwAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api'),
('9780836218053', 'The Essential Calvin And Hobbes', 'Bill Watterson', '1988', 'http://books.google.com/books/content?id=JuDInK3YtyMC&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api'),
('9780007203543', 'The Fellowship of the Ring', 'J. R. R. Tolkien', '2005', 'http://books.google.com/books/content?id=bm2cPwAACAAJ&printsec=frontcover&img=1&zoom=1&source=gbs_api'),
('9781101658055', 'Dune', 'Frank Herbert', '2003-08-26', 'http://books.google.com/books/content?id=p1MULH7JsTQC&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api');


INSERT INTO usersbooks(userID, ISBN) VALUES (1, '1111111111111');
INSERT INTO usersbooks(userID, ISBN) VALUES (1, '2222222222222');
INSERT INTO usersbooks(userID, ISBN) VALUES (1, '3333333333333');
INSERT INTO usersbooks(userID, ISBN) VALUES (1, '9780771038525');
INSERT INTO usersbooks(userID, ISBN) VALUES (1, '9780836218053');
INSERT INTO usersbooks(userID, ISBN) VALUES (1, '9780007203543');
INSERT INTO usersbooks(userID, ISBN) VALUES (1, '9781101658055');
INSERT INTO usersbooks(userID, ISBN) VALUES (2, '9780771038525');
INSERT INTO usersbooks(userID, ISBN) VALUES (2, '2222222222222');
INSERT INTO usersbooks(userID, ISBN) VALUES (2, '3333333333333');