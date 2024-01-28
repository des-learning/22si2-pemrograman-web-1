drop database web;
create database web;

use web;

create table todos (
  id bigint primary key auto_increment,
  title varchar(200) not null,
  state int default 0, -- 0: todo, 1: in progress, 2: done
  created_at datetime,
  updated_at datetime
);
