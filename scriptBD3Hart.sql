Drop table if exists Abonner;
Drop table if exists Album;
Drop table if exists Apparaitre;
Drop table if exists Appartenir;
Drop table if exists Commenter;
Drop table if exists Image;
Drop table if exists MettreFavoris;
Drop table if exists Noter;
Drop table if exists Posseder;
Drop table if exists Publicite;
Drop table if exists Regarder;
Drop table if exists Tag;
Drop table if exists Tager;
Drop table if exists Utilisateur;


CREATE TABLE Utilisateur(
   IdUtilisateur SERIAL,
   Pseudo VARCHAR(50)  NOT NULL,
   MotDePasse VARCHAR(50)  NOT NULL,
   Mail VARCHAR(100)  NOT NULL,
   Premium BOOLEAN,
   PRIMARY KEY(IdUtilisateur)
);

CREATE TABLE Image(
   IdImage SERIAL,
   NomImage VARCHAR(50)  NOT NULL,
   dateCreation datetime DEFAULT CURRENT_TIMESTAMP,
   Categorie VARCHAR(50),
   pathImg VARCHAR(50) NOT NULL,
   IdUtilisateur bigint(20) unsigned NOT NULL,
   FOREIGN KEY(IdUtilisateur) REFERENCES Utilisateur(IdUtilisateur)
);

CREATE TABLE Album(
   IdAlbum SERIAL,
   NomAlbum VARCHAR(50)  NOT NULL,
   PRIMARY KEY(IdAlbum)
);

CREATE TABLE Publicite(
   IdPublicite SERIAL,
   NomEntreprise VARCHAR(50)  NOT NULL,
   Prix Numeric NOT NULL,
   Mail VARCHAR(100)  NOT NULL,
   PRIMARY KEY(IdPublicite)
);

CREATE TABLE Regarder(
   IdUtilisateur bigint(20) unsigned,
   IdImage bigint(20) unsigned,
   DateVisionnage TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
   TempsVisionnage TIME,
   PRIMARY KEY(IdUtilisateur, IdImage),
   FOREIGN KEY(IdUtilisateur) REFERENCES Utilisateur(IdUtilisateur),
   FOREIGN KEY(IdImage) REFERENCES Image(IdImage)
);

CREATE TABLE Appartenir(
   IdUtilisateur bigint(20) unsigned,
   IdAlbum bigint(20) unsigned,
   PRIMARY KEY(IdUtilisateur, IdAlbum),
   FOREIGN KEY(IdUtilisateur) REFERENCES Utilisateur(IdUtilisateur),
   FOREIGN KEY(IdAlbum) REFERENCES Album(IdAlbum)
);

CREATE TABLE Posseder(
   IdImage bigint(20) unsigned,
   IdAlbum bigint(20) unsigned,
   PRIMARY KEY(IdImage, IdAlbum),
   FOREIGN KEY(IdImage) REFERENCES Image(IdImage),
   FOREIGN KEY(IdAlbum) REFERENCES Album(IdAlbum)
);

CREATE TABLE Abonner(
   IdUtilisateur_abonne_de bigint(20) unsigned,
   IdUtilisateur_Abonne_a bigint(20) unsigned,
   PRIMARY KEY(IdUtilisateur_abonne_de, IdUtilisateur_Abonne_a),
   FOREIGN KEY(IdUtilisateur_abonne_de) REFERENCES Utilisateur(IdUtilisateur),
   FOREIGN KEY(IdUtilisateur_Abonne_a) REFERENCES Utilisateur(IdUtilisateur)
);

CREATE TABLE Apparaitre(
   IdImage bigint(20) unsigned,
   IdPublicite bigint(20) unsigned,
   PRIMARY KEY(IdImage, IdPublicite),
   FOREIGN KEY(IdImage) REFERENCES Image(IdImage),
   FOREIGN KEY(IdPublicite) REFERENCES Publicite(IdPublicite)
);

CREATE TABLE Commenter(
   IdCommentaire bigint(20) unsigned,
   IdUtilisateur bigint(20) unsigned,
   IdImage bigint(20) unsigned,
   Message VARCHAR(500),
   dateCreation datetime DEFAULT CURRENT_TIMESTAMP,
   PRIMARY KEY(IdCommentaire, IdUtilisateur, IdImage),
   FOREIGN KEY(IdUtilisateur) REFERENCES Utilisateur(IdUtilisateur),
   FOREIGN KEY(IdImage) REFERENCES Image(IdImage)
);

CREATE TABLE MettreFavoris(
   IdUtilisateur bigint(20) unsigned,
   IdImage bigint(20) unsigned,
   PRIMARY KEY(IdUtilisateur, IdImage),
   FOREIGN KEY(IdUtilisateur) REFERENCES Utilisateur(IdUtilisateur),
   FOREIGN KEY(IdImage) REFERENCES Image(IdImage)
);

CREATE TABLE Noter(
   IdUtilisateur bigint(20) unsigned,
   IdImage bigint(20) unsigned,
   Note SMALLINT,
   PRIMARY KEY(IdUtilisateur, IdImage),
   FOREIGN KEY(IdUtilisateur) REFERENCES Utilisateur(IdUtilisateur),
   FOREIGN KEY(IdImage) REFERENCES Image(IdImage)
);
CREATE TABLE Tag(
   idTag SERIAL,
   nomTag VARCHAR(50) NOT NULL,
   PRIMARY KEY(idTag)
);

CREATE TABLE Tager(
   idTag BIGINT(20) unsigned,
   idImage BIGINT(20) unsigned,
   PRIMARY KEY(idTag, IdImage),
   FOREIGN KEY(idTag) REFERENCES Tag(idTag),
   FOREIGN KEY(idImage) REFERENCES Image(IdImage)
)
Insert into Utilisateur (IdUtilisateur, Pseudo, MotDePasse, Mail, Premium) values
   (1, 'admin', 'admin123', 'admin@gmail.com', true),
   (2, 'hello', 'hello123', 'hello@gmail.com', false),
   (3, 'nono', 'nono', 'nono@gmail.com', true),
   (4, 'pepe', 'pepe', 'pepe@gmail.com', false);

Insert into Image (IdImage, NomImage, Categorie, pathImg, IdUtilisateur) values
   (1, 'everythings fine', 'dessin', '.../publicImage/images.jpeg', 2),
   (2, 'draft', 'dessin', '.../publicImage/lisa.jpeg', 2),
   (3, 'CahierDesCharges', 'photo', '.../publicImage/lisa1.jpeg', 1),
   (4, 'lisa', 'photo', '.../publicImage/lisabw.jpeg', 1);

Insert into Album values (1, 'Album Paysage');
Insert into Album values (2, 'Contemplation');
Insert into Album values (3, 'Album Portrait');


Insert into Publicite values (1, 'Meta', '1500', 'meta@gmail.com');
Insert into Publicite values (2, 'Amazon', '2000', 'amazon@gmail.com');


Insert into Regarder values (1, 2, DATE '2015-12-17', TIME '00:00:20');
Insert into Regarder values (1, 3, DATE '2016-12-17', TIME '00:00:20');

Insert into Appartenir values (1, 1);
Insert into Appartenir values (1, 2);
Insert into Appartenir values (3, 3);

Insert into Abonner values (1, 2);

Insert into Apparaitre values (1, 2);

   (1, 'admin', 'admin123', 'admin@gmail.com', true),
   (2, 'hello', 'hello123', 'hello@gmail.com', false),
   (3, 'nono', 'nono', 'nono@gmail.com', true),
   (4, 'pepe', 'pepe', 'pepe@gmail.com', false);
   (1, 'everythings fine', 'dessin', '.../publicImage/images.jpeg', 2),
   (2, 'draft', 'dessin', '.../publicImage/lisa.jpeg', 2),
   (3, 'CahierDesCharges', 'photo', '.../publicImage/lisa1.jpeg', 1),
   (4, 'lisa', 'photo', '.../publicImage/lisabw.jpeg', 1);
Insert into Commenter (IdCommentaire, IdUtilisateur, IdImage, Message) values 
   (1, 2, 1, "C'est pas si grave de mourrir"),
   (2, 2, 3, "Aurevoir grand soldat tu ne sauras pas oublier"),
   (3, 2, 1, "C'est pas si grave de mourrir"),

Insert into MettreFavoris values (1, 2);
Insert into MettreFavoris values (2, 3);

Insert into Noter values (2, 3, 8);
Insert into Noter values (1, 3, 7);

