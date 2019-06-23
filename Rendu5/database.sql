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
    description_u varchar(10000) not null,
    age int not null,
    image_u varchar(10) DEFAULT "0.png" not null,
    mot_de_passe varchar(100) not null,
    date_de_naissance date not null,
    adresse_mail varchar(40) not null,
    tel int not null,
    info_addi varchar(40) null,
    qualite_personnelle varchar(20)not null,
    admin_num int DEFAULT 0 not null,
    primary key (id_utilisateur)
);


create table competence(
    id_competence int AUTO_INCREMENT not null,
    nom_compet varchar(50) not null,
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
    nom_projet varchar(100) not null,
    type_projet varchar(100) not null,
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

INSERT INTO utilisateur VALUES(1,"M","Leo","Peyre","Je suis etudiant en 1er annee d'informatique, Je suis interesse par le dev. Je n'ai pas encore d'experience dans l'informatique, mais j'ai deja fais un stage chez GROS & DELETTREZ Entreprise de commissaire priseur, j'ai fais de la vente
                ainsi que la presentation d'objets artistiques ou esthetiques. J'ai aussi fait un stage chez CYBER STORE Entreprise de vente, reparation et d'entretien d'appareils
                informatiques et de telephone ainsi que chez EURO TECH CONSEIL Entretien et reparation d'ordinateurs, j'ai egalement fait du reseau.",20,"1.jpg","lp","1999-02-10","leo.peyre@ynov.com","0622145478","erfgh","sdfgh",1);

INSERT INTO competence VALUES (1,"python",30);
INSERT INTO competence VALUES (2,"Langage C",70);
INSERT INTO competence VALUES (3,"Linux",60);
INSERT INTO competence VALUES (4,"Windows Serveur",80);
INSERT INTO competence VALUES (5,"CCNA 1",40);
INSERT INTO competence VALUES (6,"HTML/CSS",70);
INSERT INTO competence VALUES (7,"JavaScript",40);

INSERT INTO avoir VALUES (1,1);
INSERT INTO avoir VALUES (2,1);
INSERT INTO avoir VALUES (3,1);
INSERT INTO avoir VALUES (4,1);
INSERT INTO avoir VALUES (5,1);
INSERT INTO avoir VALUES (6,1);
INSERT INTO avoir VALUES (7,1);

INSERT INTO projet VALUES (1,"Jeu de Dame","Python","1.jpg");
INSERT INTO projet VALUES (2,"Jeu de RPG textuel","Langage C","2.png");
INSERT INTO projet VALUES (3,"Site de vente de tee shirt","HTML/CSS","3.jpg");
INSERT INTO projet VALUES (4,"Site de classement musique API","JavaScript","4.jpeg");

INSERT INTO creer VALUES (1,1);
INSERT INTO creer VALUES (2,1);
INSERT INTO creer VALUES (3,1);
INSERT INTO creer VALUES (4,1);


INSERT INTO utilisateur VALUES(2,"M","Louis","Ardilly","Je suis etudiant en 1er annee d'informatique,Je n'es pas encore d'experience dans l'informatique, mais j'ai deja participe a la mise en place d'un systeme de puce electronique pour les vetement de travail chez ELIS.",21,"2.jpg","la","1998-01-22","louis.ardilly@ynov.com",0613922847,"erfgh","sdfgh",1);

INSERT INTO competence VALUES (8,"python",100);
INSERT INTO competence VALUES (9,"Langage C",90);
INSERT INTO competence VALUES (10,"Linux",60);
INSERT INTO competence VALUES (11,"Windows Serveur",80);
INSERT INTO competence VALUES (12,"CCNA 1",40);
INSERT INTO competence VALUES (13,"HTML/CSS",80);
INSERT INTO competence VALUES (14,"JavaScript",60);

INSERT INTO avoir VALUES (8,2);
INSERT INTO avoir VALUES (9,2);
INSERT INTO avoir VALUES (10,2);
INSERT INTO avoir VALUES (11,2);
INSERT INTO avoir VALUES (12,2);
INSERT INTO avoir VALUES (13,2);
INSERT INTO avoir VALUES (14,2);

INSERT INTO creer VALUES (1,2);
INSERT INTO creer VALUES (2,2);
INSERT INTO creer VALUES (3,2);
INSERT INTO creer VALUES (4,2);



INSERT INTO utilisateur VALUES(3,"Mme","Yamina","Gherbi","Je suis etudiant en 1er annee d'informatique, Je n'es pas encore d'experience dans l'informatique, mais j'ai deja ete Agent de production chez DERICHEBOURG SNG. J'ai veille a l’obtention d’une production conforme aux consignes de fabrication.
                J'ai aussi ete assistante polyvalente dans un hopital.Accueil physique et telephonique. Presente lors des interventions chirurgicales (Liposuccion, implants capillaires).",21,"3.jpg","yg","1998-12-05","yamina.gherbi@ynov.com","0613922847","erfgh","sdfgh",1);

INSERT INTO competence VALUES (15,"python",30);
INSERT INTO competence VALUES (16,"Langage C",70);
INSERT INTO competence VALUES (17,"Linux",90);
INSERT INTO competence VALUES (18,"Windows Serveur",80);
INSERT INTO competence VALUES (19,"CCNA 1",100);
INSERT INTO competence VALUES (20,"HTML/CSS",70);
INSERT INTO competence VALUES (21,"JavaScript",40);

INSERT INTO avoir VALUES (15,3);
INSERT INTO avoir VALUES (16,3);
INSERT INTO avoir VALUES (17,3);
INSERT INTO avoir VALUES (18,3);
INSERT INTO avoir VALUES (19,3);
INSERT INTO avoir VALUES (20,3);
INSERT INTO avoir VALUES (21,3);

INSERT INTO creer VALUES (1,3);
INSERT INTO creer VALUES (2,3);
INSERT INTO creer VALUES (3,3);
INSERT INTO creer VALUES (4,3);
