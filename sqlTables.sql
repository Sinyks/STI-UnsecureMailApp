DROP TABLE IF EXISTS Coworker;
CREATE TABLE Coworker(
        id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL UNIQUE,
        Username TEXT UNIQUE NOT NULL,
        Validity BOOLEAN NOT NULL,
        Password TEXT NOT NULL,
        HasAdminPrivilege BOOLEAN NOT NULL
);

DROP TABLE IF EXISTS Message;
CREATE TABLE Message(
        id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL UNIQUE,
        Sender INTEGER NOT NULL,
        Receiver INTEGER NOT NULL,
        Content TEXT,
        Subject TEXT,
        ReceptionDate INTEGER NOT NULL,
        FOREIGN KEY (Sender) REFERENCES Coworker (id)
                    ON DELETE SET NULL,
        FOREIGN KEY (Receiver) REFERENCES Coworker (id)
                    ON DELETE CASCADE

);

-- insertion

INSERT INTO Coworker (Username,Validity,Password,HasAdminPrivilege)
VALUES
    ('Sacha',1, 1234,1),
    ('Alban',1, 1234,1),
    ('Steve',1, 1234,0),
    ('Daniel',0, 1234,0),
    ('Capucine',1, 1234,0);
