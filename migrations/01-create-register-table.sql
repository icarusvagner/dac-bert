-- MySQL

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

-- MsSQL
-- CREATE TABLE users_info (
--   id BIGINT IDENTITY(1,1) PRIMARY KEY,
--   firstname NVARCHAR(128) NOT NULL,
--   lastname NVARCHAR(128) NOT NULL,
--   birthdate NVARCHAR(128) NOT NULL,
--   address NVARCHAR(128) NOT NULL,
--   compony_name NVARCHAR(128) NOT NULL,
--   purpose NVARCHAR(128) NOT NULL,
--   host NVARCHAR(128) NOT NULL,
--   wifi VARCHAR(3) NOT NULL CONSTRAINT chk_wifi CHECK (wifi IN ('yes', 'no')) DEFAULT 'yes',
--   ctime DATETIME2 NOT NULL DEFAULT GETDATE(),
--   mtime DATETIME2 NOT NULL DEFAULT GETDATE()
-- );
