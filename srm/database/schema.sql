-- SQL to create the database schema manually if needed
CREATE TABLE student (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name TEXT NOT NULL,
    email TEXT NOT NULL UNIQUE
);

CREATE TABLE result (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    subject TEXT NOT NULL,
    marks INTEGER NOT NULL,
    student_id INTEGER,
    FOREIGN KEY (student_id) REFERENCES student(id)
);
