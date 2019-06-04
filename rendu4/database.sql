drop table utilisateur;
drop table competence;
drop table avoir;
drop table experience_pro;
drop table acquerir;
drop table projet;
drop table creer;
drop table contact;
drop table contacter;
drop table diplome;
drop table obtient;
drop table langue;
drop table parle;
drop table centre_interet;
drop table fait;


create table utilisateur(
    id_utilisateur int AUTO_INCREMENT not null,
    civilite varchar(5) not null,
    prenom varchar(17) not null,
    nom varchar(19) not null,
    date_de_naissance date not null,
    adresse_mail varchar(40) not null,
    info_addi varchar(40) null,
    qualite_personnelle varchar(20)not null,
    primary key (id_utilisateur)
);


create table competence(
    id_competence int AUTO_INCREMENT not null,
    nom_compet varchar(10) not null,
    niveau int not null,
    primary key (id_competence)
);

create table avoir(
    id_competence int not null,
    id_utilisateur int not null,
    primary key (id_competence,id_utilisateur),
    foreign key (id_competence)references competence(id_competence),
    foreign key (id_utilisateur)references utilisateur(id_utilisateur)
);


create table experience_pro(
    id_professionnelles int AUTO_INCREMENT not null,
    debut date not null,
    fin date not null,
    nom_entreprise varchar(30) not null,
    poste varchar(30) not null,
    mission varchar(30) not null,
    primary key (id_professionnelles)
   
);

create table acquerir(
    id_professionnelles int not null,
    id_utilisateur int not null,
    primary key (id_professionnelles,id_utilisateur),
    foreign key (id_professionnelles)references experience_pro(id_professionnelles),
    foreign key (id_utilisateur)references utilisateur(id_utilisateur)
);

create table projet(
    id_projet int AUTO_INCREMENT not null,
    nom_projet varchar(10) not null,
    type_projet varchar(20) not null,
    image_projet varchar(1000) not null,
    primary key (id_projet)
);

create table creer(
    id_projet int not null,
    id_utilisateur int not null,
    primary key (id_projet,id_utilisateur),
    foreign key (id_projet)references projet(id_projet),
    foreign key (id_utilisateur)references utilisateur(id_utilisateur)
);

create table diplome (
    id_diplome int AUTO_INCREMENT not null,
    type_diplome varchar(20) not null,
    obtention date not null,
    primary key (id_diplome)

);

create table obtient (
    id_diplome int not null,
    id_utilisateur int not null,
    primary key(id_diplome,id_utilisateur),
    foreign key (id_diplome) references diplome(id_diplome),
    foreign key (id_utilisateur) references utilisateur(id_utilisateur)
);

create table langue (
    id_langue int AUTO_INCREMENT not null,
    nom_langue varchar(20) not null,
    niveau_langue varchar(20) not null,
    primary key (id_langue)
);

create table parle (
    id_langue int not null,
    id_utilisateur int not null,
    primary key(id_langue,id_utilisateur),
    foreign key (id_langue) references langue(id_langue),
    foreign key (id_utilisateur) references utilisateur(id_utilisateur)
);

create table centre_interet(
    id_centre_interet int AUTO_INCREMENT not null,
    nom_centre varchar(30) not null,
    primary key (id_centre_interet)
    
);

create table fait (
    id_centre_interet int not null,
    id_utilisateur int not null,
    primary key(id_centre_interet,id_utilisateur),
    foreign key (id_centre_interet) references centre_interet(id_centre_interet),
    foreign key (id_utilisateur) references utilisateur(id_utilisateur)
);

    
