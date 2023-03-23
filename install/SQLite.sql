CREATE TABLE owo_comments ( "coid" INTEGER NOT NULL PRIMARY KEY,
"cid" int(10) default '0' ,
"created" int(10) default '0' ,
"author" varchar(150) default NULL ,
"authorId" int(10) default '0' ,
"ownerId" int(10) default '0' ,
"mail" varchar(150) default NULL ,
"url" varchar(255) default NULL ,
"ip" varchar(64) default NULL , 
"agent" varchar(511) default NULL ,
"text" text , 
"type" varchar(16) default 'comment' , 
"status" varchar(16) default 'approved' , 
"parent" int(10) default '0' );

CREATE INDEX owo_comments_cid ON owo_comments ("cid");
CREATE INDEX owo_comments_created ON owo_comments ("created");

CREATE TABLE owo_contents ( "cid" INTEGER NOT NULL PRIMARY KEY, 
"title" varchar(150) default NULL ,
"slug" varchar(150) default NULL ,
"created" int(10) default '0' , 
"modified" int(10) default '0' , 
"text" text , 
"order" int(10) default '0' , 
"authorId" int(10) default '0' , 
"template" varchar(32) default NULL , 
"type" varchar(16) default 'post' , 
"status" varchar(16) default 'publish' , 
"password" varchar(32) default NULL , 
"commentsNum" int(10) default '0' , 
"allowComment" char(1) default '0' , 
"allowPing" char(1) default '0' , 
"allowFeed" char(1) default '0' ,
"parent" int(10) default '0' );

CREATE UNIQUE INDEX owo_contents_slug ON owo_contents ("slug");
CREATE INDEX owo_contents_created ON owo_contents ("created");

CREATE TABLE "owo_fields" ("cid" INTEGER NOT NULL,
  "name" varchar(150) NOT NULL,
  "type" varchar(8) default 'str',
  "str_value" text,
  "int_value" int(10) default '0',
  "float_value" real default '0'
);

CREATE UNIQUE INDEX owo_fields_cid_name ON owo_fields ("cid", "name");
CREATE INDEX owo_fields_int_value ON owo_fields ("int_value");
CREATE INDEX owo_fields_float_value ON owo_fields ("float_value");

CREATE TABLE owo_metas ( "mid" INTEGER NOT NULL PRIMARY KEY, 
"name" varchar(150) default NULL ,
"slug" varchar(150) default NULL ,
"type" varchar(32) NOT NULL , 
"description" varchar(150) default NULL ,
"count" int(10) default '0' , 
"order" int(10) default '0' ,
"parent" int(10) default '0');

CREATE INDEX owo_metas_slug ON owo_metas ("slug");

CREATE TABLE owo_options ( "name" varchar(32) NOT NULL , 
"user" int(10) NOT NULL default '0' , 
"value" text );

CREATE UNIQUE INDEX owo_options_name_user ON owo_options ("name", "user");

CREATE TABLE owo_relationships ( "cid" int(10) NOT NULL , 
"mid" int(10) NOT NULL );

CREATE UNIQUE INDEX owo_relationships_cid_mid ON owo_relationships ("cid", "mid");

CREATE TABLE owo_users ( "uid" INTEGER NOT NULL PRIMARY KEY, 
"name" varchar(32) default NULL ,
"password" varchar(64) default NULL , 
"mail" varchar(150) default NULL ,
"url" varchar(150) default NULL ,
"screenName" varchar(32) default NULL , 
"created" int(10) default '0' , 
"activated" int(10) default '0' , 
"logged" int(10) default '0' , 
"group" varchar(16) default 'visitor' , 
"authCode" varchar(64) default NULL);

CREATE UNIQUE INDEX owo_users_name ON owo_users ("name");
CREATE UNIQUE INDEX owo_users_mail ON owo_users ("mail");
