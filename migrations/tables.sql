CREATE TABLE study_users (
id SERIAL PRIMARY KEY,
user_login VARCHAR(255) NOT NULL,
user_password VARCHAR (255) NOT NULL,
user_name VARCHAR (255) NOT NULL,
user_surname VARCHAR(255) NOT NULL,
id_study_status INT NOT NULL,
create_date DATETIME NOT NULL
)ENGINE=MyISAM;

CREATE TABLE study_pages (
id SERIAL PRIMARY KEY,
id_type INT NOT NULL,
title VARCHAR(255) NOT NULL,
create_date DATETIME NOT NULL
)ENGINE=MyISAM;

CREATE TABLE study_page_elements (
id SERIAL PRIMARY KEY,
name VARCHAR (255) NOT NULL,
form_template VARCHAR (255) NOT NULL,
template VARCHAR (255) NOT NULL
)ENGINE=MyISAM;

CREATE TABLE study_page_content (
id SERIAL PRIMARY KEY,
content_key VARCHAR (255) NOT NULL,
varchar_value VARCHAR (255) NOT NULL,
text_value TEXT NOT NULL
)ENGINE=MyISAM;

CREATE TABLE study_page_types (
  id SERIAL PRIMARY KEY,
  type_name VARCHAR (255) NOT NULL,
  description TEXT NOT NULL
)ENGINE=MyISAM;

CREATE TABLE study_type_element_link (
  id_type INT NOT NULL,
  id_element INT NOT NULL,
  position INT NOT NULL
)ENGINE=MyISAM;

ALTER TABLE study_page_content ADD id_page INT NOT NULL after id;

ALTER TABLE study_page_content ADD id_element INT NOT NULL AFTER id_page;

ALTER TABLE study_pages ADD position INT NOT NULL AFTER id_type;

create table report_users (
    id serial primary key,
    login varchar(255) not null,
    user_password varchar(255) not null,
    user_name varchar(255) not null,
    user_surname varchar(255) not null,
    user_group int not null,
    create_date datetime not null
)  engine=MyISAM;

CREATE TABLE product_manufacturing_times (
  id SERIAL PRIMARY KEY ,
  entity_id BIGINT NOT NULL,
  days INT NOT NULL
)ENGINE=MyISAM;

CREATE TABLE report_user_groups (
  id SERIAL PRIMARY KEY,
  group_name VARCHAR (255) NOT NULL
);

CREATE TABLE report_routes (
  id SERIAL PRIMARY KEY,
  route VARCHAR (255) NOT NULL,
  route_name VARCHAR (255) NOT NULL,
  external TINYINT NOT NULL,
  position INT NOT NULL,
  parent BIGINT UNSIGNED NOT NULL
);

CREATE TABLE report_group_routes (
  id_route BIGINT UNSIGNED NOT NULL,
  id_group BIGINT UNSIGNED NOT NULL
);

ALTER TABLE product_manufacturing_times ADD manufacturer VARCHAR (255) NOT NULL after entity_id;
ALTER TABLE product_manufacturing_times ADD cost VARCHAR (255) NOT NULL after entity_id;
ALTER TABLE product_manufacturing_times ADD contact_name VARCHAR (255) NOT NULL after entity_id;
ALTER TABLE product_manufacturing_times ADD contact_phone VARCHAR (255) NOT NULL after entity_id;
ALTER TABLE product_manufacturing_times ADD contact_email VARCHAR (255) NOT NULL after entity_id;
ALTER TABLE product_manufacturing_times ADD minimum INT NOT NULL AFTER cost;