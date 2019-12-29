---------------SIBD 19/20 Webify Music Player Afonso Queirós Bruno Baptista--------------
--user table--
CREATE TABLE normal_user (
  id integer PRIMARY KEY,
  email varchar,
  nick_name varchar,
  passwd varchar
);

--profile table--
CREATE TABLE profile (
  id_user integer REFERENCES normal_user,
  name_profile varchar,
  facebook_link varchar,
  status_profile integer
);

--music table--
CREATE TABLE music (
  id integer PRIMARY KEY,
  id_album integer REFERENCES album,
  name_music varchar,
  name_album varchar,
  id_artist integer references artist,
  duration integer,
  id_genre integer references genre

);

--artist table--
CREATE TABLE artist(
  id integer PRIMARY KEY,
  name varchar,
  img_path_artist varchar,
  id_genre integer references genre

);

--album table--
CREATE TABLE album(
  id integer PRIMARY KEY,
  nome_album varchar,
  id_artist integer references artist,
  number_songs integer,
  img_path varchar,
  id_genre integer references genre
);

--playlist table--
CREATE TABLE playlist (
  id integer PRIMARY KEY,
  name varchar,
  autor varchar,
  number_musics integer
);

--genre table --
CREATE TABLE genre (
  id integer PRIMARY KEY,
  gen_name varchar
);

--liked_musics table--
CREATE TABLE liked_musics (
  id_user INTEGER references normal_user,
  id_music INTEGER references music
);

--liked albums table--
CREATE TABLE liked_albums(
  id_user INTEGER references normal_user,
  id_album INTEGER references album
);

--playlist table--
CREATE TABLE playlist_musics (
  id_music integer REFERENCES music,
  id_playlist integer REFERENCES playlist
);

--friends table--
CREATE TABLE friends ( id_user integer references normal_user);

--trends table--
CREATE TABLE trends (id_album INTEGER references album);

--liked_playlists table--
CREATE TABLE liked_playlists (
  id_user  INTEGER references normal_user,
  id_playlist integer REFERENCES playlist
);

--new_releases_by_genre table --
CREATE TABLE new_releases_by_genre (
  id_music integer REFERENCES music,
  id_genre integer REFERENCES genre
);

--playlists_trends_by_genre table--
CREATE TABLE playlists_trends_by_genre (
  id_playlist INTEGER references playlist,
  id_genre INTEGER references genre
);

insert into normal_user values (1, 'admin','admin', 'admin');

insert into profile values(1, 'admin', 'link', 1);


insert into genre values(1,'Rap');
insert into genre values(2,'Hip-Hop');
insert into genre values(3,'Pop');
insert into genre values(4,'EDM');
insert into genre values(5,'Reggae');




insert into artist values(1,'Tyler, The Creator','../../images/artists/tyler/tyler.jpg',1);
insert into artist values(2,'Drake','../../images/artists/drake/drake.jpg',1);
insert into artist values(3,'Nas','../../images/artists/nas/nas.jpg',2);
insert into artist values(4,'Da Steez Brothaz','../../images/artists/steez_brothaz/steez_brothaz.jpg',2);
insert into artist values(5,'AZ','../../images/artists/az/az.jpg',2);
insert into artist values(6,'Damian Marley','../../images/artists/damian_marley/damian_marley.jpg',5);
insert into artist values(7,'Mac Miller','../../images/artists/mac_miller/mac_miller.jpg',1);

insert into album values(1,'IGOR',1,12,'../../images/artists/tyler/igor/igor.jpeg',1);
insert into album values(2,'Scorpion',2,6,'../../images/artists/drake/scorpion/scorpion.jpg',1);
insert into album values(3,'Flower Boy',1, 14, '../../images/artists/tyler/flowerboy/flowerboy.jpg',1);
insert into album values(4,'Illmatic',3,6, '../../images/artists/nas/illmatic/illmatic.jpeg',2);
insert into album values(5,'Physical Rappin',4,6, '../../images/artists/steez_brothaz/physical_rappin/physical_rappin.jpeg',2);
insert into album values(6,'Doe or Die',5,6, '../../images/artists/az/doe_or_die/doe_or_die.jpeg',2);
insert into album values(7,'Distant Relatives',6,6, '../../images/artists/damian_marley/distant_relatives/distant_relatives.jpeg',5);
insert into album values(8,'Swimming',7,6, '../../images/artists/mac_miller/swimming/swimming.png',1);
insert into album values(9,'Take Care (Deluxe)',2,6, '../../images/artists/drake/take_care/take_care.jpg',1);
insert into album values(10,'Care Package',2,6, '../../images/artists/drake/care_package/care_package.jpg',1);
insert into album values(11,'Views',2,6, '../../images/artists/drake/views/views.jpg',1);




/*IGOR;TYLER*/
insert into music values(1,1,'IGORS THEME','IGOR' ,1,201,1);
insert into music values(2,1,'EARFQUAKE','IGOR',1,201,1);
insert into music values(3,1,'I THINK','IGOR',1,201,1);
insert into music values(4,1,'Exactly What You Run From You End Up Chasing','IGOR',1,201,1);
insert into music values(5,1,'RUNNING OUT OF TIME','IGOR',1,201,1);
insert into music values(6,1,'NEW MAGIC WAND','IGOR',1,201,1);
insert into music values(7,1,'A BOY IS A GUN','IGOR',1,201,1);
insert into music values(8,1,'Puppet','IGOR',1,201,1);
insert into music values(9,1,'WHATS GOOD','IGOR',1,201,1);
insert into music values(10,1,'GONE, GONE/ THANK YOU','IGOR',1,201,1);
insert into music values(11,1,'I DONT LOVE YOU ANYMORE','IGOR',1,201,1);
insert into music values(12,1,'ARE WE STILL FRIENDS','IGOR',1,201,1);


/*SCORPION;DRAKE*/
insert into music values(13,2,'Jaded','Scorpion',2,201,1);
insert into music values(14,2,'Finesse','Scorpion',2,201,1);
insert into music values(15,2,'Peak','Scorpion',2,201,1);
insert into music values(16,2,'Mob Ties','Scorpion',2,201,1);
insert into music values(31,2,'Survival','Scorpion',2,201,1);
insert into music values(32,2,'Nonstop','Scorpion',2,201,1);


/*FLOWER BOY;TYLER*/
insert into music values(17,3,'Foreword','Flower Boy',1,201,1);
insert into music values(18,3,'Where This Flower Blooms','Flower Boy',1,201,1);
insert into music values(19,3,'Sometimes...','Flower Boy',1,201,1);
insert into music values(20,3,'See You Again','Flower Boy',1,201,1);
insert into music values(21,3,'Who Dat Boy','Flower Boy',1,201,1);
insert into music values(22,3,'Pothole','Flower Boy',1,201,1);
insert into music values(23,3,'Garden Shed','Flower Boy',1,201,1);
insert into music values(24,3,'Boredom','Flower Boy',1,201,1);
insert into music values(25,3,'I Aint Got Time','Flower Boy',1,201,1);
insert into music values(26,3,'911/Mr Lonely','Flower Boy',1,201,1);
insert into music values(27,3,'Droppin Seeds','Flower Boy',1,201,1);
insert into music values(28,3,'November','Flower Boy',1,201,1);
insert into music values(29,3,'Glitter','Flower Boy',1,201,1);
insert into music values(30,3,'Enjoy Right Now, Today','Flower Boy',1,201,1);


/*SWIMMING;MAC MILLER*/
insert into music values(58,8,'Come back to Earth','Swimming',7,201,1);
insert into music values(59,8,'Hurt Feelings','Swimming',7,201,1);
insert into music values(60,8,'What`s the Use?','Swimming',7,201,1);
insert into music values(61,8,'Perfecto','Swimming',7,201,1);
insert into music values(62,8,'Self Care','Swimming',7,201,1);
insert into music values(63,8,'Wings','Swimming',7,201,1);


/*TAKE CARE (DELUXE);DRAKE*/
insert into music values(64,9,'Marvin`s Room','Take Care (Deluxe)',2,201,1);
insert into music values(65,9,'Take Care','Take Care (Deluxe)',2,201,1);
insert into music values(66,9,'Crew Love','Take Care (Deluxe)',2,201,1);
insert into music values(67,9,'Over My Dead Body','Take Care (Deluxe)',2,201,1);
insert into music values(68,9,'Shot for Me','Take Care (Deluxe)',2,201,1);
insert into music values(69,9,'Headlines','Take Care (Deluxe)',2,201,1);

/*CARE PACKAGE;DRAKE*/
insert into music values(70,10,'The Motion','Care Package',2,201,1);
insert into music values(71,10,'Dreams Money Can Buy','Care Package',2,201,1);
insert into music values(72,10,'How Bout Now','Care Package',2,201,1);
insert into music values(73,10,'4pm in Calabasas','Care Package',2,201,1);
insert into music values(74,10,'5am in Toronto','Care Package',2,201,1);
insert into music values(75,10,'Paris Morton Music','Care Package',2,201,1);


/*CARE PACKAGE;DRAKE*/
insert into music values(76,11,'Keep The Family Close','Views',2,201,1);
insert into music values(77,11,'9','Views',2,201,1);
insert into music values(78,11,'U with Me?','Views',2,201,1);
insert into music values(79,11,'Weston Road Flows','Views',2,201,1);
insert into music values(80,11,'Grammys','Views',2,201,1);
insert into music values(81,11,'Childs Play','Views',2,201,1);


/*ILLMATIC;NAS*/

insert into music values(33,4,'The Genesis','Illmatic',3,201,2);
insert into music values(34,4,'N.Y. State of Mind','Illmatic',3,201,2);
insert into music values(35,4,'Life`s a Bitch','Illmatic',3,201,2);
insert into music values(36,4,'The World is Yours','Illmatic',3,201,2);
insert into music values(37,4,'Halftime','Illmatic',3,201,2);
insert into music values(38,4,'One Love','Illmatic',3,201,2);


/*PHYSICAL RAPPIN;DA STEEZ BROTHAZ*/

insert into music values(39,5,'Todo Sigue Igual','Physical Rappin',4,201,2);
insert into music values(40,5,'Posible es Ahora','Physical Rappin',4,201,2);
insert into music values(41,5,'Dominando el Mic','Physical Rappin',4,201,2);
insert into music values(42,5,'90`s Back','Physical Rappin',4,201,2);
insert into music values(43,5,'Ready 2 Funk','Physical Rappin',4,201,2);
insert into music values(44,5,'Mi Barrio','Physical Rappin',4,201,2);
insert into music values(45,5,'Dias Grises','Physical Rappin',4,201,2);


/*DOE OR DIE;AZ*/

insert into music values(46,6,'Uncut Raw','Doe or Die',5,201,2);
insert into music values(47,6,'Gimme Your`s','Doe or Die',5,201,2);
insert into music values(48,6,'Ho Happy Jackie','Doe or Die',5,201,2);
insert into music values(49,6,'Rather Unique','Doe or Die',5,201,2);
insert into music values(50,6,'I Feel for You','Doe or Die',5,201,2);
insert into music values(51,6,'Doe or Die','Doe or Die',5,201,2);



/*DISTANT RELATIVES;DAMIAN MARLEY*/

insert into music values(52,7,'As We Enter','Distant Relatives',6,201,5);
insert into music values(53,7,'Tribes at War','Distant Relatives',6,201,5);
insert into music values(54,7,'Strong Will Continue','Distant Relatives',6,201,5);
insert into music values(55,7,'Afrika must Wake Up','Distant Relatives',6,201,5);
insert into music values(56,7,'Patience','Distant Relatives',6,201,5);
insert into music values(57,7,'Leaders','Distant Relatives',6,201,5);








insert into trends values(1);
insert into trends values(2);
insert into trends values(3);
insert into trends values(4);
insert into trends values(5);
insert into trends values(6);
insert into trends values(7);
