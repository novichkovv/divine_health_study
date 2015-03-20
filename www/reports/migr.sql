CREATE TABLE low_stock_notify_emails (
id SERIAL PRIMARY KEY,
email VARCHAR (255) NOT NULL
)ENGINE=MyISAM;

CREATE TABLE reports_options (
option_key VARCHAR (255) NOT NULL PRIMARY KEY,
option_value VARCHAR (255) NOT NULL
)ENGINE=MyISAM;

CREATE TABLE reports_spreadsheets (
id SERIAL PRIMARY KEY ,
name VARCHAR (255) NOT NULL ,
position INT NOT NULL,
create_date DATETIME NOT NULL
)ENGINE=MyISAM;

CREATE TABLE reports_spreadsheet_fields (
id SERIAL PRIMARY KEY ,
id_spreadsheet BIGINT UNSIGNED NOT NULL ,
name VARCHAR (255) NOT NULL ,
position INT NOT NULL
)ENGINE=MyISAM;

CREATE TABLE reports_spreadsheet_content (
  id SERIAL PRIMARY KEY ,
  id_field BIGINT UNSIGNED NOT NULL ,
  position INT NOT NULL,
  content TEXT NOT NULL
)ENGINE=MyISAM;