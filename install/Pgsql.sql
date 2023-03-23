--
-- Table structure for table "owo_comments"
--
CREATE SEQUENCE "owo_comments_seq";

CREATE TABLE "owo_comments" (  "coid" INT NOT NULL DEFAULT nextval('owo_comments_seq'),
  "cid" INT NULL DEFAULT '0',
  "created" INT NULL DEFAULT '0',
  "author" VARCHAR(150) NULL DEFAULT NULL,
  "authorId" INT NULL DEFAULT '0',
  "ownerId" INT NULL DEFAULT '0',
  "mail" VARCHAR(150) NULL DEFAULT NULL,
  "url" VARCHAR(255) NULL DEFAULT NULL,
  "ip" VARCHAR(64) NULL DEFAULT NULL,
  "agent" VARCHAR(511) NULL DEFAULT NULL,
  "text" TEXT NULL DEFAULT NULL,
  "type" VARCHAR(16) NULL DEFAULT 'comment',
  "status" VARCHAR(16) NULL DEFAULT 'approved',
  "parent" INT NULL DEFAULT '0',
  PRIMARY KEY ("coid")
);

CREATE INDEX "owo_comments_cid" ON "owo_comments" ("cid");
CREATE INDEX "owo_comments_created" ON "owo_comments" ("created");


--
-- Table structure for table "owo_contents"
--

CREATE SEQUENCE "owo_contents_seq";

CREATE TABLE "owo_contents" (  "cid" INT NOT NULL DEFAULT nextval('owo_contents_seq'),
  "title" VARCHAR(150) NULL DEFAULT NULL,
  "slug" VARCHAR(150) NULL DEFAULT NULL,
  "created" INT NULL DEFAULT '0',
  "modified" INT NULL DEFAULT '0',
  "text" TEXT NULL DEFAULT NULL,
  "order" INT NULL DEFAULT '0',
  "authorId" INT NULL DEFAULT '0',
  "template" VARCHAR(32) NULL DEFAULT NULL,
  "type" VARCHAR(16) NULL DEFAULT 'post',
  "status" VARCHAR(16) NULL DEFAULT 'publish',
  "password" VARCHAR(32) NULL DEFAULT NULL,
  "commentsNum" INT NULL DEFAULT '0',
  "allowComment" CHAR(1) NULL DEFAULT '0',
  "allowPing" CHAR(1) NULL DEFAULT '0',
  "allowFeed" CHAR(1) NULL DEFAULT '0',
  "parent" INT NULL DEFAULT '0',
  PRIMARY KEY ("cid"),
  UNIQUE ("slug")
);

CREATE INDEX "owo_contents_created" ON "owo_contents" ("created");

--
-- Table structure for table "owo_fields"
--

CREATE TABLE "owo_fields" ("cid" INT NOT NULL,
  "name" VARCHAR(150) NOT NULL,
  "type" VARCHAR(8) NULL DEFAULT 'str',
  "str_value" TEXT NULL DEFAULT NULL,
  "int_value" INT NULL DEFAULT '0',
  "float_value" REAL NULL DEFAULT '0',
  PRIMARY KEY  ("cid","name")
);

CREATE INDEX "owo_fields_int_value" ON "owo_fields" ("int_value");
CREATE INDEX "owo_fields_float_value" ON "owo_fields" ("float_value");

--
-- Table structure for table "owo_metas"
--

CREATE SEQUENCE "owo_metas_seq";

CREATE TABLE "owo_metas" (  "mid" INT NOT NULL DEFAULT nextval('owo_metas_seq'),
  "name" VARCHAR(150) NULL DEFAULT NULL,
  "slug" VARCHAR(150) NULL DEFAULT NULL,
  "type" VARCHAR(16) NOT NULL DEFAULT '',
  "description" VARCHAR(150) NULL DEFAULT NULL,
  "count" INT NULL DEFAULT '0',
  "order" INT NULL DEFAULT '0',
  "parent" INT NULL DEFAULT '0',
  PRIMARY KEY ("mid")
);

CREATE INDEX "owo_metas_slug" ON "owo_metas" ("slug");


--
-- Table structure for table "owo_options"
--

CREATE TABLE "owo_options" (  "name" VARCHAR(32) NOT NULL DEFAULT '',
  "user" INT NOT NULL DEFAULT '0',
  "value" TEXT NULL DEFAULT NULL,
  PRIMARY KEY ("name","user")
);

--
-- Table structure for table "owo_relationships"
--

CREATE TABLE "owo_relationships" (  "cid" INT NOT NULL DEFAULT '0',
  "mid" INT NOT NULL DEFAULT '0',
  PRIMARY KEY ("cid","mid")
); 

--
-- Table structure for table "owo_users"
--
CREATE SEQUENCE "owo_users_seq";

CREATE TABLE "owo_users" (  "uid" INT NOT NULL DEFAULT nextval('owo_users_seq') ,
  "name" VARCHAR(32) NULL DEFAULT NULL,
  "password" VARCHAR(64) NULL DEFAULT NULL,
  "mail" VARCHAR(150) NULL DEFAULT NULL,
  "url" VARCHAR(150) NULL DEFAULT NULL,
  "screenName" VARCHAR(32) NULL DEFAULT NULL,
  "created" INT NULL DEFAULT '0',
  "activated" INT NULL DEFAULT '0',
  "logged" INT NULL DEFAULT '0',
  "group" VARCHAR(16) NULL DEFAULT 'visitor',
  "authCode" VARCHAR(64) NULL DEFAULT NULL,
  PRIMARY KEY ("uid"),
  UNIQUE ("name"),
  UNIQUE ("mail")
);
