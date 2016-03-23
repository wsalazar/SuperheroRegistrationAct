PRAGMA foreign_keys=OFF;
BEGIN TRANSACTION;
CREATE TABLE IF NOT EXISTS superhero_users(id INTEGER PRIMARY KEY AUTOINCREMENT,email TEXT NOT NULL,name TEXT NOT NULL,password TEXT NOT NULL,username TEXT NOT NULL,register_date datetime NOT NULL,last_login datetime);
INSERT INTO "makerbot_users" VALUES(8,'will.a.salazar@gmail.com','William Salazar','$2y$10$E8gtgKBf2/iOUMlNStfsm.gdsb/qK8ExsdJgv9G4xwabn05ht1BY6','wsalazar','2016-03-21 10:54:15','2016-03-21 11:14:06');
INSERT INTO "makerbot_users" VALUES(12,'william.salazar@ge.com','WILLIAM SALAZAR','$2y$10$rEspBwg17M4yAsfDDeWr1e5.8jou1Lq1GFs6rR5qCTMfPxgh7oVKy','williamsalazar','2016-03-21 18:54:29','2016-03-21 19:32:08');
DELETE FROM sqlite_sequence;
INSERT INTO "sqlite_sequence" VALUES('superhero_users',15);
CREATE UNIQUE INDEX IF NOT EXISTS superhero_users_username_uindex ON superhero_users(username)
COMMIT;
