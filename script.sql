create table degrees
(
  id         int auto_increment
    primary key,
  series     varchar(5) null,
  year       int        null,
  created_at timestamp  null,
  updated_at timestamp  null
)
  collate = utf8_bin;

create table migrations
(
  id        int unsigned auto_increment
    primary key,
  migration varchar(255) not null,
  batch     int          not null
)
  collate = utf8_bin;

create table password_resets
(
  email      varchar(255) not null,
  token      varchar(255) not null,
  created_at timestamp    null
)
  collate = utf8_bin;

create index password_resets_email_index
  on password_resets (email);

create table responsibles
(
  tel              varchar(191)    null,
  street           varchar(191)    null,
  state            varchar(191)    null,
  city             varchar(191)    null,
  number           int             null,
  district         varchar(191)    null,
  name_responsible varchar(290)    null,
  kinship          varchar(191)    null,
  created_at       timestamp       null,
  updated_at       timestamp       null,
  divulgation      int default '0' null,
  id               int auto_increment
    primary key
)
  collate = utf8_bin;

create table students
(
  id                     int auto_increment
    primary key,
  name                   varchar(191) null,
  color                  varchar(191) null,
  birth                  date         null,
  nationality            varchar(191) null,
  naturalness            varchar(191) null,
  sex                    tinyint(1)   null,
  uf                     varchar(191) null,
  certificate_number     varchar(191) null,
  certificate_register   varchar(191) null,
  certificate_leaf       varchar(191) null,
  certificate_expedition date         null,
  name_mother            varchar(191) null,
  name_father            varchar(191) null,
  created_at             timestamp    null,
  updated_at             timestamp    null,
  nis                    varchar(191) null,
  serie                  int          null,
  responsible_id         int          null,
  enroll                 int          null,
  degree_id              varchar(6)   null,
  constraint students_responsibles_id_fk
  foreign key (responsible_id) references responsibles (id)
    on update cascade
    on delete cascade
)
  collate = utf8_bin;

create table listwait
(
  student_id int not null
    primary key,
  constraint listwait_students_id_fk
  foreign key (student_id) references students (id)
    on update cascade
    on delete cascade
);

create index students_responsibles_id_fk
  on students (responsible_id);

create table subjects
(
  id         int auto_increment
    primary key,
  c_h        int          null,
  name       varchar(191) null,
  created_at timestamp    null,
  updated_at timestamp    null,
  serie      int          null
)
  collate = utf8_bin;

create table dailies
(
  id         int        not null
    primary key,
  subject_id int        not null,
  student_id int        not null,
  frequency  int        null,
  note       int        null,
  serie      varchar(4) null,
  created_at timestamp  null,
  updated_at timestamp  null,
  constraint dailies_subject___fk
  foreign key (subject_id) references subjects (id)
)
  collate = utf8_bin;

create index student_id
  on dailies (student_id);

create index subject_id
  on dailies (subject_id);

create table degree_subject
(
  degree_id  int      null,
  subject_id int      null,
  created_at datetime null,
  uodated_at datetime null,
  id         int auto_increment
    primary key,
  constraint degree_subject_degrees_id_fk
  foreign key (degree_id) references degrees (id)
    on update cascade
    on delete cascade,
  constraint degree_subject_subjects_id_fk
  foreign key (subject_id) references subjects (id)
    on update cascade
    on delete cascade
);

create index degree_subject_degrees_id_fk
  on degree_subject (degree_id);

create index degree_subject_id__fk
  on degree_subject (subject_id, degree_id);

create table teachers
(
  name       varchar(191) null,
  id         int auto_increment
    primary key,
  cpf        varchar(191) null,
  created_at timestamp    null,
  updated_at timestamp    null,
  tel        varchar(20)  null
)
  collate = utf8_bin;

create table teams
(
  id           int auto_increment
    primary key,
  name         varchar(191) null,
  created_at   timestamp    null,
  updated_at   timestamp    null,
  qtd_students int          null,
  shift        varchar(20)  null,
  serie        int          null,
  teacher_id   int          null,
  year         int          null,
  constraint teams_teacher___fk
  foreign key (teacher_id) references teachers (id)
)
  collate = utf8_bin;

create table student_teams
(
  team_id    int       null,
  created_at timestamp null,
  updated_at timestamp null,
  degree_id  int       null,
  student_id int       null,
  id         int auto_increment
    primary key,
  qtd        int       null,
  serie      int       null,
  constraint student_team_team___fk
  foreign key (team_id) references teams (id)
    on update cascade
    on delete cascade,
  constraint student_team_degrees_id_fk
  foreign key (degree_id) references degrees (id)
    on update cascade
    on delete cascade,
  constraint student_team_students_id_fk
  foreign key (student_id) references students (id)
    on update cascade
    on delete cascade
)
  collate = utf8_bin;

create index student_team_degrees_id_fk
  on student_teams (degree_id);

create index student_team_students_id_fk
  on student_teams (student_id);

create index team_id
  on student_teams (team_id);

create index teams_teacher___fk
  on teams (teacher_id);

create table users
(
  id             int unsigned auto_increment
    primary key,
  name           varchar(255) not null,
  cpf            varchar(255) not null,
  email          varchar(255) not null,
  password       varchar(255) not null,
  access         int          not null,
  remember_token varchar(100) null,
  created_at     timestamp    null,
  updated_at     timestamp    null,
  constraint users_cpf_unique
  unique (cpf),
  constraint users_email_unique
  unique (email)
)
  collate = utf8_bin;


