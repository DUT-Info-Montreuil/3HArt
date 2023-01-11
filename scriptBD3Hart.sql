/* Drop table if exists Utilisateur cascade;
Drop table if exists Image cascade;
Drop table if exists Album cascade;
Drop table if exists Publicite cascade;
Drop table if exists Regarder cascade;
Drop table if exists Appartenir cascade;
Drop table if exists Posseder cascade;
Drop table if exists Abonner cascade;
Drop table if exists Apparaitre cascade;
Drop table if exists Commenter cascade;
Drop table if exists MettreFavoris cascade;
Drop table if exists Noter cascade;


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

--Utilisateur (IdUtilisateur, Pseudo, MotDePasse, Mail, Premium)
Insert into Utilisateur values (1, 'xixi', 'xixi123', 'xixi@gmail.com', false);
Insert into Utilisateur values (2, 'hello', 'hello123', 'hello@gmail.com', 'f');
Insert into Utilisateur values (3, 'hel', 'hel123', 'hel@gmail.com', 't');
Insert into Utilisateur values (4, 'hell', 'hell123', 'hell@gmail.com', 'f');

--Image (IdImage, NomImage, MotCles, Categorie, Noir_Blanc, pathImg, IdUtilisateur)
Insert into Image values (1, 'land', 'land', 'paysage','f', '.../publicImage/images.jpeg', 2);
Insert into Image values (2, 'riviere', 'riviere', 'paysage','f', '.../publicImage/lisa.jpeg', 2);
Insert into Image values (3, 'lisa', 'lisa', 'portrait','f', '.../publicImage/lisa1.jpeg', 1);
Insert into Image values (4, 'lisa', 'lisa', 'portrait','t', '.../publicImage/lisabw.jpeg', 1);

--Album(IdAlbum, NomAlbum)
Insert into Album values (4, 'Album Paysage');
Insert into Album values (2, 'Album Paysage');
Insert into Album values (1, 'Album Portrait');


--Publicite(IdPublicite, NomEntreprise, Prix, Mail)
Insert into Publicite values (1, 'Meta', '1500', 'meta@gmail.com');
Insert into Publicite values (2, 'Amazon', '2000', 'amazon@gmail.com');


--Regarder(IdUtilisateur, IdImage, DateVisionnage, TempsVisionnage)
Insert into Regarder values (1, 2, DATE '2015-12-17', '00:00:20');
Insert into Regarder values (1, 3, DATE '2016-12-17', '00:00:20');

--Appartenir(IdUtilisateur, IdAlbum)
Insert into Appartenir values (1, 2);

--Posseder(IdImage, IdAlbum)
Insert into Appartenir values (1, 1);

--Abonner(IdUtilisateur_abonne_de, IdUtilisateur_Abonne_a)
Insert into Abonner values (1, 2);

--Apparaitre(IdImage, IdPublicite)
Insert into Apparaitre values (1, 2);

--Commenter(IdUtilisateur, IdImage, message)
Insert into Commenter values (1, 2, 'What a nice pic');
Insert into Commenter values (2, 2, 'Love this pic');

--MettreFavoris(IdUtilisateur, IdImage)
Insert into MettreFavoris values (1, 2);
Insert into MettreFavoris values (2, 3);

--Noter(IdUtilisateur, IdImage, Note)
Insert into Noter values (2, 3, 8);
Insert into Noter values (1, 3, 7);
 */





Drop table if exists Hastag;

Drop table if exists Regarder ;
Drop table if exists Appartenir ;
Drop table if exists Posseder ;
Drop table if exists Abonner ;
Drop table if exists Apparaitre ;
Drop table if exists Commenter ;
Drop table if exists MettreFavoris ;
Drop table if exists Noter ;

Drop table if exists Publicite ;

Drop table if exists Image ;
Drop table if exists Album ;
Drop table if exists Utilisateur ;


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
   MotCles TEXT,
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
   nomTag VARCHAR(50) NOT NULL,CREATE TABLE Tager(
   idTag BIGINT(20) unsigned,
   idImage BIGINT(20) unsigned,
   PRIMARY KEY(idTag, IdImage),
   FOREIGN KEY(idTag) REFERENCES Tag(idTag),
   FOREIGN KEY(idImage) REFERENCES Image(IdImage)
)

   PRIMARY KEY(idTag)
   
);

CREATE TABLE Tager(
   idTag BIGINT(20) unsigned,
   idImage BIGINT(20) unsigned,
   PRIMARY KEY(idTag, IdImage),
   FOREIGN KEY(idTag) REFERENCES Tag(idTag),
   FOREIGN KEY(idImage) REFERENCES Image(IdImage)
)

Insert into Utilisateur values (1, 'xixi', 'xixi123', 'xixi@gmail.com', false);
Insert into Utilisateur values (2, 'hello', 'hello123', 'hello@gmail.com', false);
Insert into Utilisateur values (3, 'hel', 'hel123', 'hel@gmail.com', true);
Insert into Utilisateur values (4, 'hell', 'hell123', 'hell@gmail.com', false);

Insert into Image values (1, 'land', 'land', 'paysage',false, '.../publicImage/images.jpeg', 2);
Insert into Image values (2, 'riviere', 'riviere', 'paysage',false, '.../publicImage/lisa.jpeg', 2);
Insert into Image values (3, 'lisa', 'lisa', 'portrait',true, '.../publicImage/lisa1.jpeg', 1);
Insert into Image values (4, 'lisa', 'lisa', 'portrait',true, '.../publicImage/lisabw.jpeg', 1);

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

