create table categories
(
    id          bigint unsigned auto_increment
        primary key,
    title       varchar(500) null,
    descripcion text         null,
    image       varchar(255) not null,
    created_at  timestamp    null,
    updated_at  timestamp    null
);
    

create table failed_jobs
(
    id         bigint unsigned auto_increment
        primary key,
    connection text                                  not null,
    queue      text                                  not null,
    payload    longtext                              not null,
    exception  longtext                              not null,
    failed_at  timestamp default current_timestamp() not null
);
    


create table migrations
(
    id        int unsigned auto_increment
        primary key,
    migration varchar(255) not null,
    batch     int          not null
);
    

create table password_resets
(
    email      varchar(255) not null,
    token      varchar(255) not null,
    created_at timestamp    null
);
    

create index password_resets_email_index
    on password_resets (email);

create table rols
(
    id          bigint unsigned auto_increment
        primary key,
    `key`       varchar(10)  not null,
    name        varchar(100) not null,
    description varchar(500) not null,
    created_at  timestamp    null,
    updated_at  timestamp    null
);
    

create table subscription_items
(
    id              bigint unsigned auto_increment
        primary key,
    subscription_id bigint unsigned not null,
    stripe_id       varchar(255)    not null,
    stripe_plan     varchar(255)    not null,
    quantity        int             not null,
    created_at      timestamp       null,
    updated_at      timestamp       null,
    constraint subscription_items_subscription_id_stripe_plan_unique
        unique (subscription_id, stripe_plan)
);
    

create index subscription_items_stripe_id_index
    on subscription_items (stripe_id);

create table subscriptions
(
    id            bigint unsigned auto_increment
        primary key,
    user_id       bigint unsigned not null,
    name          varchar(255)    not null,
    stripe_id     varchar(255)    not null,
    stripe_status varchar(255)    not null,
    stripe_plan   varchar(255)    null,
    quantity      int             null,
    trial_ends_at timestamp       null,
    ends_at       timestamp       null,
    created_at    timestamp       null,
    updated_at    timestamp       null
);
    

create index subscriptions_user_id_stripe_status_index
    on subscriptions (user_id, stripe_status);

create table users
(
    id                bigint unsigned auto_increment
        primary key,
    name              varchar(255)    not null,
    email             varchar(255)    not null,
    email_verified_at timestamp       null,
    password          varchar(255)    not null,
    remember_token    varchar(100)    null,
    created_at        timestamp       null,
    updated_at        timestamp       null,
    rol_id            bigint unsigned not null,
    stripe_id         varchar(255)    null,
    card_brand        varchar(255)    null,
    card_last_four    varchar(4)      null,
    trial_ends_at     timestamp       null,
    constraint users_email_unique
        unique (email),
    constraint users_rol_id_foreign
        foreign key (rol_id) references rols (id)
            on delete cascade
);
    

create index users_stripe_id_index
    on users (stripe_id);

create table clases
(
    id          bigint unsigned auto_increment
        primary key,
    title       varchar(255)                   null,
    descripcion text                           null,
    image       varchar(255)                   not null,
    hora        varchar(20)                    not null,
    posted      enum ('si', 'no') default 'no' not null,
    color       varchar(20)                    not null,
    textcolor   varchar(20)                    not null,
    start       datetime                       not null,
    end         datetime                       not null,
    created_at  timestamp                      null,
    updated_at  timestamp                      null,
    category_id bigint unsigned                not null,
    precio      int                            null,
    user_id     bigint unsigned                not null,
    constraint clases_category_id_foreign
        foreign key (category_id) references categories (id)
            on delete cascade,
    constraint clases_users_id_fk
        foreign key (user_id) references users (id)
            on update cascade on delete cascade
);
    

create index clases_user_id_index
    on clases (user_id);

create table post_comments
(
    id         bigint unsigned auto_increment
        primary key,
    title      varchar(255)                not null,
    message    text                        not null,
    approved   enum ('1', '0') default '0' not null,
    created_at timestamp                   null,
    updated_at timestamp                   null,
    clase_id   bigint unsigned             not null,
    user_id    bigint unsigned             not null,
    constraint post_comments_clase_id_foreign
        foreign key (clase_id) references clases (id)
            on delete cascade,
    constraint post_comments_user_id_foreign
        foreign key (user_id) references users (id)
            on delete cascade
);
    

create table contacts
(
    id         bigint unsigned auto_increment
        primary key,
    name       varchar(255)    not null,
    email      varchar(255)    not null,
    phone      int             null,
    message    text            not null,
    created_at timestamp       null,
    updated_at timestamp       null,
    user_id    bigint unsigned not null,
    admin_id   bigint unsigned not null,
    constraint contacts_user_id_foreign
        foreign key (user_id) references users (id)
            on delete cascade
);
    

create table clase_user
(
    id       bigint unsigned auto_increment
        primary key,
    clase_id bigint unsigned not null,
    user_id  bigint unsigned not null,
    constraint clase_user_clases_id_fk
        foreign key (clase_id) references clases (id)
            on update cascade on delete cascade,
    constraint clase_user_users_id_fk
        foreign key (user_id) references users (id)
            on update cascade on delete cascade
);
    