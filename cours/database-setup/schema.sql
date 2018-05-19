CREATE TABLE todo (
  id SERIAL PRIMARY KEY,
  name VARCHAR(50),
  created_at TIMESTAMP default CURRENT_TIMESTAMP,
  updated_at TIMESTAMP default CURRENT_TIMESTAMP
);

CREATE TABLE task (
  id SERIAL PRIMARY KEY,
  todo_id INTEGER references todo (id),
  name VARCHAR(50),
  created_at TIMESTAMP default CURRENT_TIMESTAMP,
  updated_at TIMESTAMP default CURRENT_TIMESTAMP
);

INSERT INTO todo (name) VALUES ('Courses');
INSERT INTO todo (name) VALUES ('Etudes');
INSERT INTO todo (name) VALUES ('Php');

INSERT INTO task (todo_id, name) VALUES (1, 'patate');
INSERT INTO task (todo_id, name) VALUES (1, 'carotte');
INSERT INTO task (todo_id, name) VALUES (1, 'champignon');
INSERT INTO task (todo_id, name) VALUES (1, 'chips');
INSERT INTO task (todo_id, name) VALUES (1, 'café');

INSERT INTO task (todo_id, name) VALUES (2, 'naitre');
INSERT INTO task (todo_id, name) VALUES (2, 'maternelle');
INSERT INTO task (todo_id, name) VALUES (2, 'primaire');
INSERT INTO task (todo_id, name) VALUES (2, 'collège');
INSERT INTO task (todo_id, name) VALUES (2, 'lycée');
INSERT INTO task (todo_id, name) VALUES (2, 'prépa/IUT');
INSERT INTO task (todo_id, name) VALUES (2, 'ENSIIE');

INSERT INTO task (todo_id, name) VALUES (3, 'Apprendre le php');
INSERT INTO task (todo_id, name) VALUES (3, 'Comprendre le php');
INSERT INTO task (todo_id, name) VALUES (3, 'Vivre le php');
INSERT INTO task (todo_id, name) VALUES (3, 'Danser le php');
INSERT INTO task (todo_id, name) VALUES (3, 'Manger le php');

alter table task add column done_at timestamp default null;