create table users_info(
  id BIGINT AUTO_INCREMENT PRIMARY KEY,
  firstname varchar(128) not null,
  lastname varchar(128) not null,
  birthdate varchar(128) not null,
  address varchar(128) not null,
  compony_name varchar(128) not null,
  purpose varchar(128) not null,
  host varchar(128) not null,
  wifi enum('yes','no') not null default 'yes',
  ctime TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  mtime TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);
