Drop table if exists Utilisateur ;
Drop table if exists Image ;
Drop table if exists Album ;
Drop table if exists Publicite ;
Drop table if exists Regarder ;
Drop table if exists Appartenir ;
Drop table if exists Posseder ;
Drop table if exists Abonner ;
Drop table if exists Apparaitre ;
Drop table if exists Commenter ;
Drop table if exists MettreFavoris ;
Drop table if exists Noter ;


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
   MotCles TEXT,
   Categorie VARCHAR(50) ,
   Noir_Blanc BOOLEAN,
   pathImg VARCHAR NOT NULL,
   IdUtilisateur INTEGER NOT NULL,
   PRIMARY KEY(IdImage),
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
   IdUtilisateur INTEGER,
   IdImage INTEGER,
   DateVisionnage TIMESTAMP NOT NULL,
   TempsVisionnage TIME,
   PRIMARY KEY(IdUtilisateur, IdImage),
   FOREIGN KEY(IdUtilisateur) REFERENCES Utilisateur(IdUtilisateur),
   FOREIGN KEY(IdImage) REFERENCES Image(IdImage)
);

CREATE TABLE Appartenir(
   IdUtilisateur INTEGER,
   IdAlbum INTEGER,
   PRIMARY KEY(IdUtilisateur, IdAlbum),
   FOREIGN KEY(IdUtilisateur) REFERENCES Utilisateur(IdUtilisateur),
   FOREIGN KEY(IdAlbum) REFERENCES Album(IdAlbum)
);

CREATE TABLE Posseder(
   IdImage INTEGER,
   IdAlbum INTEGER,
   PRIMARY KEY(IdImage, IdAlbum),
   FOREIGN KEY(IdImage) REFERENCES Image(IdImage),
   FOREIGN KEY(IdAlbum) REFERENCES Album(IdAlbum)
);

CREATE TABLE Abonner(
   IdUtilisateur_abonne_de INTEGER,
   IdUtilisateur_Abonne_a INTEGER,
   PRIMARY KEY(IdUtilisateur_abonne_de, IdUtilisateur_Abonne_a),
   FOREIGN KEY(IdUtilisateur_abonne_de) REFERENCES Utilisateur(IdUtilisateur),
   FOREIGN KEY(IdUtilisateur_Abonne_a) REFERENCES Utilisateur(IdUtilisateur)
);

CREATE TABLE Apparaitre(
   IdImage INTEGER,
   IdPublicite INTEGER,
   PRIMARY KEY(IdImage, IdPublicite),
   FOREIGN KEY(IdImage) REFERENCES Image(IdImage),
   FOREIGN KEY(IdPublicite) REFERENCES Publicite(IdPublicite)
);

CREATE TABLE Commenter(
   IdUtilisateur INTEGER,
   IdImage INTEGER,
   Message VARCHAR(500) ,
   PRIMARY KEY(IdUtilisateur, IdImage),
   FOREIGN KEY(IdUtilisateur) REFERENCES Utilisateur(IdUtilisateur),
   FOREIGN KEY(IdImage) REFERENCES Image(IdImage)
);

CREATE TABLE MettreFavoris(
   IdUtilisateur INTEGER,
   IdImage INTEGER,
   PRIMARY KEY(IdUtilisateur, IdImage),
   FOREIGN KEY(IdUtilisateur) REFERENCES Utilisateur(IdUtilisateur),
   FOREIGN KEY(IdImage) REFERENCES Image(IdImage)
);

CREATE TABLE Noter(
   IdUtilisateur INTEGER,
   IdImage INTEGER,
   Note SMALLINT,
   PRIMARY KEY(IdUtilisateur, IdImage),
   FOREIGN KEY(IdUtilisateur) REFERENCES Utilisateur(IdUtilisateur),
   FOREIGN KEY(IdImage) REFERENCES Image(IdImage)
);

Insert into Utilisateur values (1, 'xixi', 'xixi123', 'xixi@gmail.com', false);
Insert into Utilisateur values (2, 'hello', 'hello123', 'hello@gmail.com', 'f');
Insert into Utilisateur values (3, 'hel', 'hel123', 'hel@gmail.com', 't');
Insert into Utilisateur values (4, 'hell', 'hell123', 'hell@gmail.com', 'f');

Insert into Image values (1, 'land', 'land', 'paysage','f', '.../publicImage/images.jpeg', 2);
Insert into Image values (2, 'riviere', 'riviere', 'paysage','f', '.../publicImage/lisa.jpeg', 2);
Insert into Image values (3, 'lisa', 'lisa', 'portrait','f', '.../publicImage/lisa1.jpeg', 1);
Insert into Image values (4, 'lisa', 'lisa', 'portrait','t', '.../publicImage/lisabw.jpeg', 1);

Insert into Album values (4, 'Album Paysage');
Insert into Album values (2, 'Album Paysage');
Insert into Album values (1, 'Album Portrait');


Insert into Publicite values (1, 'Meta', '1500', 'meta@gmail.com');
Insert into Publicite values (2, 'Amazon', '2000', 'amazon@gmail.com');


Insert into Regarder values (1, 2, DATE '2015-12-17', '00:00:20');
Insert into Regarder values (1, 3, DATE '2016-12-17', '00:00:20');

Insert into Appartenir values (1, 2);

Insert into Appartenir values (1, 1);

Insert into Abonner values (1, 2);

Insert into Apparaitre values (1, 2);

Insert into Commenter values (1, 2, 'What a nice pic');
Insert into Commenter values (2, 2, 'Love this pic');

Insert into MettreFavoris values (1, 2);
Insert into MettreFavoris values (2, 3);

Insert into Noter values (2, 3, 8);
Insert into Noter values (1, 3, 7);


CREATE TABLE Regarder(
   IdUtilisateur INTEGER,
   IdImage INTEGER,
   DateVisionnage TIMESTAMP NOT NULL,
   TempsVisionnage TIME,
   PRIMARY KEY(IdUtilisateur, IdImage)
);
ALTER TABLE Regarder ADD FOREIGN KEY(IdUtilisateur) REFERENCES Utilisateur(IdUtilisateur) ADD FOREIGN KEY(IdImage) REFERENCES Image(IdImage);
ALTER TABLE `Regarder` ADD  CONSTRAINT `IdUtilisateur` FOREIGN KEY (`IdUtilisateur`) REFERENCES `Utilisateur`(`IdUtilisateur`) ON DELETE RESTRICT ON UPDATE RESTRICT;