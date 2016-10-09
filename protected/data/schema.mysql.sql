CREATE TABLE tbl_user (
    id_user INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(128) NOT NULL,
    password VARCHAR(128) NOT NULL,
    email VARCHAR(128) NOT NULL,
    codigo_verificacion VARCHAR(128) NOT NULL,
    activo TINYINT(1) NOT NULL DEFAULT 0
);

INSERT INTO tbl_user (username, password, email, codigo_verificacion,activo) VALUES ('test1', 'pass1', 'test1@example.com','234234142', 1);
