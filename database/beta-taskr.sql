/*
 * USERS
 * Note: password for all users is 123456
 */

-- admin user
insert into Users(id, first_name, last_name, email, password, is_admin, created_at)
    values (1, 'admin', 'admin', 'admin@gmail.com', '$2y$10$Nb7TVHDGRJejc9YI73BcJe95w2BeP7y32Eg8Dimv3CorB/BVB0p2m', '1', now());

-- this user has a full set of data
insert into Users(id, first_name, last_name, email, password, is_admin, created_at)
    values (2, 'test', 'user', 'test@gmail.com', '$2y$10$Nb7TVHDGRJejc9YI73BcJe95w2BeP7y32Eg8Dimv3CorB/BVB0p2m', '0', now());

-- regular users
insert into Users(id, first_name, last_name, email, password, is_admin, created_at)
    values (3, 'a1', 'a1', 'a1@gmail.com', '$2y$10$Nb7TVHDGRJejc9YI73BcJe95w2BeP7y32Eg8Dimv3CorB/BVB0p2m', '0', now());
insert into Users(id, first_name, last_name, email, password, is_admin, created_at)
    values (4, 'a2', 'a2', 'a2@gmail.com', '$2y$10$Nb7TVHDGRJejc9YI73BcJe95w2BeP7y32Eg8Dimv3CorB/BVB0p2m', '0', now());
insert into Users(id, first_name, last_name, email, password, is_admin, created_at)
    values (5,'a3', 'a3', 'a3@gmail.com', '$2y$10$Nb7TVHDGRJejc9YI73BcJe95w2BeP7y32Eg8Dimv3CorB/BVB0p2m', '0', now());
insert into Users(id, first_name, last_name, email, password, is_admin, created_at)
    values (6,'a4', 'a4', 'a4@gmail.com', '$2y$10$Nb7TVHDGRJejc9YI73BcJe95w2BeP7y32Eg8Dimv3CorB/BVB0p2m', '0', now());
insert into Users(id, first_name, last_name, email, password, is_admin, created_at)
    values (7,'a5', 'a5', 'a5@gmail.com', '$2y$10$Nb7TVHDGRJejc9YI73BcJe95w2BeP7y32Eg8Dimv3CorB/BVB0p2m', '0', now());
insert into Users(id, first_name, last_name, email, password, is_admin, created_at)
    values (8,'a6', 'a6', 'a6@gmail.com', '$2y$10$Nb7TVHDGRJejc9YI73BcJe95w2BeP7y32Eg8Dimv3CorB/BVB0p2m', '0', now());
insert into Users(id, first_name, last_name, email, password, is_admin, created_at)
    values (9,'a7', 'a7', 'a7@gmail.com', '$2y$10$Nb7TVHDGRJejc9YI73BcJe95w2BeP7y32Eg8Dimv3CorB/BVB0p2m', '0', now());
insert into Users(id, first_name, last_name, email, password, is_admin, created_at)
    values (10, 'a8', 'a8', 'a8@gmail.com', '$2y$10$Nb7TVHDGRJejc9YI73BcJe95w2BeP7y32Eg8Dimv3CorB/BVB0p2m', '0', now());
insert into Users(id, first_name, last_name, email, password, is_admin, created_at)
    values (11, 'a9', 'a9', 'a9@gmail.com', '$2y$10$Nb7TVHDGRJejc9YI73BcJe95w2BeP7y32Eg8Dimv3CorB/BVB0p2m', '0', now());
insert into Users(id, first_name, last_name, email, password, is_admin, created_at)
    values (12, 'a10', 'a10', 'a10@gmail.com', '$2y$10$Nb7TVHDGRJejc9YI73BcJe95w2BeP7y32Eg8Dimv3CorB/BVB0p2m', '0', now());
insert into Users(id, first_name, last_name, email, password, is_admin, created_at)
    values (13, 'a11', 'a11', 'a11@gmail.com', '$2y$10$Nb7TVHDGRJejc9YI73BcJe95w2BeP7y32Eg8Dimv3CorB/BVB0p2m', '0', now());
insert into Users(id, first_name, last_name, email, password, is_admin, created_at)
    values (14, 'a12', 'a12', 'a12@gmail.com', '$2y$10$Nb7TVHDGRJejc9YI73BcJe95w2BeP7y32Eg8Dimv3CorB/BVB0p2m', '0', now());
insert into Users(id, first_name, last_name, email, password, is_admin, created_at)
    values (15, 'a13', 'a13', 'a13@gmail.com', '$2y$10$Nb7TVHDGRJejc9YI73BcJe95w2BeP7y32Eg8Dimv3CorB/BVB0p2m', '0', now());
insert into Users(id, first_name, last_name, email, password, is_admin, created_at)
    values (16, 'a14', 'a14', 'a14@gmail.com', '$2y$10$Nb7TVHDGRJejc9YI73BcJe95w2BeP7y32Eg8Dimv3CorB/BVB0p2m', '0', now());
insert into Users(id, first_name, last_name, email, password, is_admin, created_at)
    values (17, 'a15', 'a15', 'a15@gmail.com', '$2y$10$Nb7TVHDGRJejc9YI73BcJe95w2BeP7y32Eg8Dimv3CorB/BVB0p2m', '0', now());
insert into Users(id, first_name, last_name, email, password, is_admin, created_at)
    values (18, 'a16', 'a16', 'a16@gmail.com', '$2y$10$Nb7TVHDGRJejc9YI73BcJe95w2BeP7y32Eg8Dimv3CorB/BVB0p2m', '0', now());
insert into Users(id, first_name, last_name, email, password, is_admin, created_at)
    values (19, 'a17', 'a17', 'a17@gmail.com', '$2y$10$Nb7TVHDGRJejc9YI73BcJe95w2BeP7y32Eg8Dimv3CorB/BVB0p2m', '0', now());
insert into Users(id, first_name, last_name, email, password, is_admin, created_at)
    values (20, 'a18', 'a18', 'a18@gmail.com', '$2y$10$Nb7TVHDGRJejc9YI73BcJe95w2BeP7y32Eg8Dimv3CorB/BVB0p2m', '0', now());
insert into Users(id, first_name, last_name, email, password, is_admin, created_at)
    values (21, 'a19', 'a19', 'a19@gmail.com', '$2y$10$Nb7TVHDGRJejc9YI73BcJe95w2BeP7y32Eg8Dimv3CorB/BVB0p2m', '0', now());
insert into Users(id, first_name, last_name, email, password, is_admin, created_at)
    values (22, 'a20', 'a20', 'a20@gmail.com', '$2y$10$Nb7TVHDGRJejc9YI73BcJe95w2BeP7y32Eg8Dimv3CorB/BVB0p2m', '0', now());

/*
 * GENERIC TASKS
 */

insert into generic_tasks (name, category) values ('Clean my washroom', 'Clean');
insert into generic_tasks (name, category) values ('Clean my toilet', 'Clean');
insert into generic_tasks (name, category) values ('Clean my tub', 'Clean');
insert into generic_tasks (name, category) values ('Clean my sink', 'Clean');
insert into generic_tasks (name, category) values ('Clean my kitchen', 'Clean');
insert into generic_tasks (name, category) values ('Wash my car', 'Car Maintenance');
insert into generic_tasks (name, category) values ('Vacuum my car', 'Car Maintenance');
insert into generic_tasks (name, category) values ('Change oil', 'Car Maintenance');
insert into generic_tasks (name, category) values ('Change tires', 'Car Maintenance');
insert into generic_tasks (name, category) values ('Buy eggs', 'Groceries');
insert into generic_tasks (name, category) values ('Buy chicken breast', 'Groceries');
insert into generic_tasks (name, category) values ('Buy fruits', 'Groceries');
insert into generic_tasks (name, category) values ('Walk my dog', 'Pet Care');
insert into generic_tasks (name, category) values ('Walk my cat', 'Pet Care');
insert into generic_tasks (name, category) values ('Groom my dog', 'Pet Care');
insert into generic_tasks (name, category) values ('Groom my cat', 'Pet Care');
insert into generic_tasks (name, category) values ('Mow lawn', 'Yard Work');
insert into generic_tasks (name, category) values ('Trim bushes', 'Yard Work');
insert into generic_tasks (name, category) values ('Cut trees', 'Yard Work');
insert into generic_tasks (name, category) values ('Rake leaves', 'Yard Work');

/*
 * TASKS
 */

-- open tasks
insert into tasks (id, title, description, category, owner, status, start_date, end_date)
    values (1,'Walk barney', 'barney is my dog', 'Pet Care', 1, 0, now(), '2017-05-05 11:11:11');
insert into tasks (id, title, description, category, owner, status, start_date, end_date)
    values (2,'Wash barney', 'barney is my dog', 'Pet Care', 1, 0, now(), '2017-05-05 11:11:11');
insert into tasks (id, title, description, category, owner, status, start_date, end_date)
    values (3,'Groom barney', 'barney is my dog', 'Pet Care', 1, 0, now(), '2017-12-05 11:11:11');
insert into tasks (id, title, description, category, owner, status, start_date, end_date)
    values (4,'Feed barney', 'barney is my dog', 'Pet Care', 1, 0, now(), '2017-12-05 11:11:11');
insert into tasks (id, title, description, category, owner, status, start_date, end_date)
    values (5,'Clean my civic', 'civic is a honda', 'Honda tasks', 2, 0, now(), '2017-08-05 11:11:11');
insert into tasks (id, title, description, category, owner, status, start_date, end_date)
    values (6,'Change the tires on my civic', 'winter tires', 'Car', 2, 0, now(), '2017-05-05 11:11:11');
insert into tasks (id, title, description, category, owner, status, start_date, end_date)
    values (7,'Change the seats in my hummer', 'leather seats preferred', 'Hummer', 2, 0, now(), '2017-05-05 11:11:11');
insert into tasks (id, title, description, category, owner, status, start_date, end_date)
    values (8,'Help me prepare dinner', 'I cannot cook', 'Cooking', 3, 0, now(), '2017-05-05 11:11:11');
insert into tasks (id, title, description, category, owner, status, start_date, end_date)
    values (9,'Help me find my goggles', 'i lost them in my house', 'Find a lost item', 4, 0, now(), '2017-05-05 11:11:11');
insert into tasks (id, title, description, category, owner, status, start_date, end_date)
    values (10,'Help me find my dog', 'barney is my dog', 'Missing dog', 4, 0, now(), '2017-05-05 11:11:11');
insert into tasks (id, title, description, category, owner, status, start_date, end_date)
    values (11,'Help me find my cat', 'barney is my cat', 'Missing cat', 4, 0, now(), '2017-05-05 11:11:11');
insert into tasks (id, title, description, category, owner, status, start_date, end_date)
    values (12,'Fix my speakers', 'speakers are broken', 'Repairs', 5, 0, now(), '2017-05-05 11:11:11');
insert into tasks (id, title, description, category, owner, status, start_date, end_date)
    values (13,'Fix my ipod', 'it is broken', 'Repairs', 5, 0, now(), '2017-05-05 11:11:11');
insert into tasks (id, title, description, category, owner, status, start_date, end_date)
    values (14,'Help me sell my broken ipod', 'it is broken and i do not want it', 'Kijiji', 5, 0, now(), '2017-05-05 11:11:11');

-- tasks that are open but have bids

insert into tasks (id, title, description, category, owner, status, start_date, end_date)
    values (15,'Help me with my homework', 'i am exchange', 'NUS', 6, 0, now(), '2017-06-05 11:11:11');
insert into tasks (id, title, description, category, owner, status, start_date, end_date)
    values (16,'Help me pass cs2102', 'too hard', 'NUS', 7, 0, now(), '2017-07-05 11:11:11');
insert into tasks (id, title, description, category, owner, status, start_date, end_date)
    values (17,'Build a task app', 'for cs2102', 'Homework', 7, 0, now(), '2017-09-05 11:11:11');
insert into tasks (id, title, description, category, owner, status, start_date, end_date)
    values (18,'Build uber app', 'for cs2102', 'Homework', 7, 0, now(), '2017-01-05 11:11:11');
insert into tasks (id, title, description, category, owner, status, start_date, end_date)
    values (19, 'Build an app', 'for cs2102', 'Projects', 7, 0, now(), '2017-05-05 11:11:11');

-- tasks with bids

insert into tasks (id, title, description, category, owner, status, start_date, end_date)
    values (20,'Teach me how to not be deadweight', 'i am a deadweight', 'Help', 7, 1, now(), '2017-05-05 11:11:11');
insert into tasks (id, title, description, category, owner, status, start_date, end_date)
    values (21,'Walk barney and bart', 'barney and bart are my dogs', 'Pet Care', 2, 1, now(), '2017-05-05 11:11:11');
insert into tasks (id, title, description, category, owner, status, start_date, end_date)
    values (22,'Wash barney and bart', 'barney is my dog', 'Pet Care', 1, 1, now(), '2017-11-05 11:11:11');
insert into tasks (id, title, description, category, owner, status, start_date, end_date)
    values (23,'Help me pass nus', 'i am exchange', 'nus', 10, 1, now(), '2017-05-05 11:11:11');
insert into tasks (id, title, description, category, owner, status, start_date, end_date)
    values (24,'Feed my baby', 'i am a bad parent', 'family', 11, 1, now(), '2017-12-05 11:11:11');
insert into tasks (id, title, description, category, owner, status, start_date, end_date)
    values (25,'Help me find my computer', 'i left it at the r4 lounge in pgp and somebody took it', 'pgp', 14, 1, now(), '2017-05-05 11:11:11');
insert into tasks (id, title, description, category, owner, status, start_date, end_date)
    values (26,'Help me reserve a table at pines foodcourt', 'i do not have any more tissues', 'pines foodcourt', 2, 1, now(), '2017-05-05 11:11:11');
insert into tasks (id, title, description, category, owner, status, start_date, end_date)
    values (27,'Enroll in cs2102', 'it was really hard to get into this course', 'cs2102', 13, 1, now(), '2017-05-05 11:11:11');
insert into tasks (id, title, description, category, owner, status, start_date, end_date)
    values (28,'Help me write a todo app', 'for cs2103', 'cs2103', 13, 1, now(), '2017-12-05 11:11:11');
insert into tasks (id, title, description, category, owner, status, start_date, end_date)
    values (29,'Buy chicken thighs', 'cause gains', 'gains', 4, 1, now(), '2017-05-05 11:11:11');
insert into tasks (id, title, description, category, owner, status, start_date, end_date)
    values (30,'Buy chicken breasts', 'for gains', 'Missing dog', 4, 1, now(), '2017-05-05 11:11:11');
insert into tasks (id, title, description, category, owner, status, start_date, end_date)
    values (31,'Buy steak', 'for gains', 'Missing cat', 17, 1, now(), '2017-01-05 11:11:11');

-- completed tasks

insert into tasks (id, title, description, category, owner, status, start_date, end_date)
    values (32,'Fix my biceps', 'biceps are torn', 'Repairs', 5, 2, now(), '2017-05-05 11:11:11');
insert into tasks (id, title, description, category, owner, status, start_date, end_date)
    values (33,'Repair my windows', 'it is broken', 'Repairs', 15, 2, now(), '2017-05-05 11:11:11');
insert into tasks (id, title, description, category, owner, status, start_date, end_date)
    values (34,'Paint my garage', 'cause I do not want to do it myself', 'lazy', 5, 2, now(), '2017-05-05 11:11:11');
insert into tasks (id, title, description, category, owner, status, start_date, end_date)
    values (35,'Setup vpn', 'for security', 'security', 2, 2, now(), '2017-05-05 11:11:11');
insert into tasks (id, title, description, category, owner, status, start_date, end_date)
    values (36,'Install firefox', 'for privacy', 'privacy', 17, 2, now(), '2017-05-05 11:11:11');
insert into tasks (id, title, description, category, owner, status, start_date, end_date)
    values (37,'Install ubuntu', 'for privacy', 'privacy', 2, 2, now(), '2017-03-05 11:11:11');
insert into tasks (id, title, description, category, owner, status, start_date, end_date)
    values (38,'Install datagrip', 'for cs2102', 'Homework', 19, 2, now(), '2017-05-05 11:11:11');
insert into tasks (id, title, description, category, owner, status, start_date, end_date)
    values (39,'Teach me sql', 'for cs2102', 'lazy', 10, 2, now(), '2017-05-05 11:11:11');
insert into tasks (id, title, description, category, owner, status, start_date, end_date)
    values (40,'Teach me how to not be deadweight again', 'i am a deadweight', 'Help', 20, 2, now(), '2017-02-05 11:11:11');

/*
 * BIDS
 */

-- bids that have been selected
insert into bids (id, user_id, task_id, price, selected, created_at)
    values (1, 20, 20, 12, true, now());
insert into bids (id, user_id, task_id, price, selected, created_at)
    values (2, 1, 21, 123, true, now());
insert into bids (id, user_id, task_id, price, selected, created_at)
    values (3, 3, 22, 121, true, now());
insert into bids (id, user_id, task_id, price, selected, created_at)
    values (4, 3, 23, 13, true, now());
insert into bids (id, user_id, task_id, price, selected, created_at)
    values (5, 5, 24, 1, true, now());
insert into bids (id, user_id, task_id, price, selected, created_at)
    values (6, 6, 25, 2, true, now());
insert into bids (id, user_id, task_id, price, selected, created_at)
    values (7, 1, 26, 112, true, now());
insert into bids (id, user_id, task_id, price, selected, created_at)
    values (8, 1, 27, 122, true, now());
insert into bids (id, user_id, task_id, price, selected, created_at)
    values (9, 3, 28, 124, true, now());
insert into bids (id, user_id, task_id, price, selected, created_at)
    values (10, 2, 29, 152, true, now());
insert into bids (id, user_id, task_id, price, selected, created_at)
    values (11, 2, 30, 1211, true, now());
insert into bids (id, user_id, task_id, price, selected, created_at)
    values (12, 18, 31, 3, true, now());

-- bids that have not been selected

insert into bids (id, user_id, task_id, price, selected, created_at)
    values (13, 1, 20, 123, false, now());
insert into bids (id, user_id, task_id, price, selected, created_at)
    values (14, 20, 21, 1244, false, now());
insert into bids (id, user_id, task_id, price, selected, created_at)
    values (15, 5, 22, 1, false, now());
insert into bids (id, user_id, task_id, price, selected, created_at)
    values (16, 14, 23, 134, false, now());
insert into bids (id, user_id, task_id, price, selected, created_at)
    values (17, 1, 24, 12, false, now());
insert into bids (id, user_id, task_id, price, selected, created_at)
    values (18, 1, 25, 22, false, now());
insert into bids (id, user_id, task_id, price, selected, created_at)
    values (19, 3, 26, 1122, false, now());
insert into bids (id, user_id, task_id, price, selected, created_at)
    values (20, 14, 27, 22, false, now());
insert into bids (id, user_id, task_id, price, selected, created_at)
    values (21, 2, 28, 123, false, now());
insert into bids (id, user_id, task_id, price, selected, created_at)
    values (22, 2, 29, 15, false, now());
insert into bids (id, user_id, task_id, price, selected, created_at)
    values (23, 18, 30, 11, false, now());
insert into bids (id, user_id, task_id, price, selected, created_at)
    values (24, 16, 31, 31, false, now());

-- bids that have been selected (and these tasks are already completed)

insert into bids (id, user_id, task_id, price, selected, created_at)
    values (25, 1, 32, 31, true, now());
insert into bids (id, user_id, task_id, price, selected, created_at)
    values (26, 1, 33, 31, true, now());
insert into bids (id, user_id, task_id, price, selected, created_at)
    values (27, 2, 34, 31, true, now());
insert into bids (id, user_id, task_id, price, selected, created_at)
    values (28, 3, 35, 31, true, now());
insert into bids (id, user_id, task_id, price, selected, created_at)
    values (29, 4, 36, 31, true, now());
insert into bids (id, user_id, task_id, price, selected, created_at)
    values (30, 5, 37, 31, true, now());
insert into bids (id, user_id, task_id, price, selected, created_at)
    values (31, 1, 38, 31, true, now());
insert into bids (id, user_id, task_id, price, selected, created_at)
    values (32, 3, 39, 31, true, now());
insert into bids (id, user_id, task_id, price, selected, created_at)
    values (33, 19, 40, 31, true, now());

-- bids that have not been selected for tasks that are still open

insert into bids (id, user_id, task_id, price, selected, created_at)
    values (34, 2, 15, 311, false, now());
insert into bids (id, user_id, task_id, price, selected, created_at)
    values (35, 1, 16, 3133, false, now());
insert into bids (id, user_id, task_id, price, selected, created_at)
    values (36, 2, 17, 1, false, now());
insert into bids (id, user_id, task_id, price, selected, created_at)
    values (37, 1, 18, 31, false, now());
insert into bids (id, user_id, task_id, price, selected, created_at)
    values (38, 2, 19, 131, false, now());
