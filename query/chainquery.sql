CREATE TABLE if not exists classes (
	id_class INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
	name_class varchar (50) not null,
);

CREATE TABLE if not exists types (
	id_type INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
	name_type varchar (50) not null,
	fecha_creación datetime default current_timestamp
)

ALTER TABLE cards
add FOREIGN KEY (type_Id) REFERENCES types (id_type);