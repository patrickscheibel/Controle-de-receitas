CREATE TABLE users(
            id int AUTO_INCREMENT PRIMARY KEY,
            name varchar(255) NOT NULL,
            email varchar(255) NOT NULL UNIQUE,
            password varchar(255) NOT NULL,
            status boolean DEFAULT true,
            created_at TIMESTAMP,
            updated_at TIMESTAMP);


CREATE TABLE revenues(
            id integer AUTO_INCREMENT PRIMARY KEY,
            code integer NOT NULL UNIQUE,
            description varchar(255) NOT NULL,
            version integer NOT NULL,
            status boolean DEFAULT true,
            created_at TIMESTAMP,
            updated_at TIMESTAMP);

CREATE TABLE ingredients(
            id integer AUTO_INCREMENT PRIMARY KEY,
            code integer NOT NULL UNIQUE,
            description varchar(255) NOT NULL,
            amount double NOT NULL,
            created_at TIMESTAMP,
            updated_at TIMESTAMP);

CREATE TABLE items(
            id integer AUTO_INCREMENT PRIMARY KEY,
            revenue_code integer NOT NULL,
            ingredient_code integer NOT NULL,
            version integer NOT NULL,
            position integer NOT NULL,
            created_at TIMESTAMP,
            updated_at TIMESTAMP);

INSERT INTO ingredients (code, description, amount)
VALUES ('1', 'Milho', '1.222000'), ('2', 'Farinha', '500');

INSERT INTO revenues (code, description, version)
VALUES ('1', 'Ração inicial', 1), ('2', 'Ração especial', 1);

INSERT INTO items (revenue_code, ingredient_code, version, position)
VALUES ('1', '1', 1, 1), ('1', '2', 1, 2), ('2', '1', 1, 1);