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
type_id INT NOT NULL,
title VARCHAR(255) NOT NULL,
create_date DATETIME NOT NULL
)ENGINE=MyISAM;

CREATE TABLE study_page_elements (
id SERIAL PRIMARY KEY,
name VARCHAR (255) NOT NULL,
form_template VARCHAR (255) NOT NULL,
template VARCHAR (255) NOT NULL,
position INT NOT NULL
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
  id_element INT NOT NULL
)ENGINE=MyISAM;

