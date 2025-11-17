-- db/schema.sql
pragma foreign_keys = on;

create table if not exists users (
  id integer primary key autoincrement,
  email text not null unique,
  password text not null
);

create table if not exists books (
  id integer primary key autoincrement,
  title text not null,
  author text not null,
  year integer
);

create table if not exists comments (
  id integer primary key autoincrement,
  description text not null,
  book_id integer not null,
  foreign key (book_id) references books(id) on delete cascade
);
