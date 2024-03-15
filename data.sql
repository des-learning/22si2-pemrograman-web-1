drop database if exists web;
create database if not exists web;

use web;

create table if not exists todos (
  id bigint primary key auto_increment,
  title varchar(200) not null,
  state int default 0, -- 0: todo, 1: in progress, 2: done
  created_at datetime,
  updated_at datetime
);

create table if not exists todo_logs (
  todo_id bigint,
  operation text, 
  created_at datetime
);
