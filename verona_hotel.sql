
-- Developer: Mohamed Amin
-- Created: 12/25/2019


--
-- Database: `hoteldb`
--

CREATE DATABASE verona_hotel;
USE verona_hotel;

/*=======================================*/
/* "1" TABLE GUEST */
/*=======================================*/

CREATE TABLE GUEST (
	GUESTNAME           varchar(20)      not null,
	ID                  int(15)          not null AUTO_INCREMENT,
	COUNTRY             varchar(20)      not null,
	CITY                varchar(20)      not null,
	EMAIL               varchar(50)              ,
	PHONENUMBER         int(15)          not null,
	primary key (ID)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*=======================================*/
/* "2" TABLE ROOM */
/*=======================================*/

CREATE TABLE ROOM (
	NUMBER         int(5)         not null,
	CATEGORY       varchar(200)   not null,
	TODAYPRICE     double         not null,
	primary key (NUMBER)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*=======================================*/
/* "3" TABLE BILL */
/*=======================================*/

CREATE TABLE BILL (
	AMOUNT     double           not null,
	BILL_ID    int(10)          not null AUTO_INCREMENT,
	DATE       date             not null,
	GUESTID    int(15)          not null,
	primary key (BILL_ID)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*=======================================*/
/* "4" TABLE GUESTROOM */
/*=======================================*/

CREATE TABLE GUESTROOM (
	ROOMNUMBER   int(5)      not null,
	GUESTID      int(15)      not null,
	primary key (GUESTID)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*=======================================*/
/* "5" TABLE ENTERTAINMENT */
/*=======================================*/

CREATE TABLE ENTERTAINMENT (
	NAME                varchar(200)   not null,
	CATEGORY            varchar(200)   not null,
	DATE_TIME           DateTime       not null,
	NUMBER_OF_TICKETS   int            not null,
	TICKETS_SOLD        int            not null,
	PRICE               double         not null,
	primary key (NAME)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*=======================================*/
/*INSERT INTO TABLE ENTERTAINMENT*/
/*=======================================*/

INSERT INTO ENTERTAINMENT (NAME, CATEGORY, DATE_TIME, NUMBER_OF_TICKETS, TICKETS_SOLD, PRICE) 
	VALUES
		("Le Rêve – The Dream", "CURRENT & UPCOMING SHOWS", "2020-03-12 07:30:00", 500, 0, 50),
		("Darke", "CURRENT & UPCOMING SHOWS", "2020-02-03 09:30:00", 350, 0, 70),
		("Chris Tucker: One Night at Verona Hotel", "CURRENT & UPCOMING SHOWS", "2020-02-02 06:30:00", 500, 0, 100),
		("Brian McKnight", "CURRENT & UPCOMING SHOWS", "2020-03-23 07:30:00", 450, 0, 80),
		("Sarah McLachlan: An Intimate Evening", "CURRENT & UPCOMING SHOWS", "2020-01-21 09:30:00", 500, 0, 60),
		("Harry Connick Jr. presents True Love", "CURRENT & UPCOMING SHOWS", "2020-04-02 11:00:00", 600, 0, 70),
		("SiriusXM Presents Dwight Yoakam", "CURRENT & UPCOMING SHOWS", "2020-02-12 05:30:00", 500, 0, 100),
		("Lionel Richie: A Legend in Verona", "CURRENT & UPCOMING SHOWS", "2020-01-22 09:30:00", 500, 0, 120),
		("Robbie Williams: Live in Verona", "CURRENT & UPCOMING SHOWS", "2020-03-15 07:00:00", 450, 0, 90),
		("Diana Ross: An Extraordinary Evening", "CURRENT & UPCOMING SHOWS", "2020-03-01 08:30:00", 500, 0, 50),
		("Bryan Adams", "CURRENT & UPCOMING SHOWS", "2020-01-25 08:00:00", 600, 0, 70),
		("Sebastian Maniscalco", "CURRENT & UPCOMING SHOWS", "2020-03-20 09:30:00", 500, 0, 80),
		("Jo Koy: Just Kidding World Tour", "CURRENT & UPCOMING SHOWS", "2020-02-10 09:00:00", 500, 0, 60),
		
		("Le Reve - The Dream and Dinner", "DINNER & SHOW PAIRINGS", "2020-02-25 04:30:00", 60, 0, 170),
		("Chris Tucker and Dinner", "DINNER & SHOW PAIRINGS", "2020-03-02 06:30:00", 50, 0, 180),
		("Brain McKnight and Dinner", "DINNER & SHOW PAIRINGS", "2020-02-14 05:30:00", 50, 0, 160);
		
/*=======================================*/
/* "6" TABLE MEETINGROOM */
/*=======================================*/

CREATE TABLE MEETINGROOM (
	NAME                varchar(200)   not null,
	CATEGORY            varchar(200)   not null,
	MAX_NUM_of_GUESTS   int            not null,
	NUMBER_of_GUESTS    INT            NOT NULL,
	primary key (NAME, CATEGORY)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*=======================================*/
/* "7" TABLE DININGROOM */
/*=======================================*/

CREATE TABLE DININGROOM (
	NAME                varchar(200)   not null,
	CATEGORY            varchar(200)   not null,
	NUMBER_OF_TABLES    int            not null,
	TABLES_RESERVED     int            not null,
	TABLE_PRICE         double         not null,
	primary key (NAME)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*=======================================*/
/*INSERT INTO TABLE DININGROOM*/
/*=======================================*/

INSERT INTO DININGROOM (NAME, CATEGORY, NUMBER_OF_TABLES, TABLES_RESERVED, TABLE_PRICE) 
	VALUES
		("Lakeside", "FINE DINING", 30, 0, 300),
		("Costa Di Mare", "FINE DINING", 25, 0, 250),
		("Mizumi", "FINE DINING", 30, 0, 280),
		("Sinatra", "FINE DINING", 35, 0, 320),
		("SW Steakhouse", "FINE DINING", 30, 0, 500),
		("Wing Lei", "FINE DINING", 30, 0, 300),
		("Tablean", "FINE DINING", 30, 0, 350),
		
		("Allegro", "CASUAL DINING", 30, 0, 200),
		("Jardin", "CASUAL DINING", 20, 0, 300),
		("La Cave", "CASUAL DINING", 30, 0, 250);

/*=======================================*/
/* "8" TABLE GUEST_ENTERTAINMENT */
/* Mapping many to many relationship */
/*=======================================*/

CREATE TABLE GUEST_ENTERTAINMENT (
	ENTERTAINMENT_NAME          varchar(200)      not null,
	GUESTID                     int(15)           not null,
	primary key (ENTERTAINMENT_NAME, GUESTID)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*=======================================*/
/* "9" TABLE GUEST_DINING */
/* Mapping many to many relationship */
/*=======================================*/

CREATE TABLE GUEST_DINING (
	DININGROOM_NAME          varchar(200)      not null,
	GUESTID                  int(15)           not null,
	primary key (DININGROOM_NAME, GUESTID)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*=======================================*/
/* "10" TABLE GUESTMEETING */
/* Mapping many to many relationship */
/*=======================================*/

CREATE TABLE GUESTMEETING (
	GUESTID                    int(15)           not null,
	MEETING_ROOM_NAME          varchar(200)      not null,
    CATEGORY                   varchar(200)      not null,
	primary key (GUESTID, MEETING_ROOM_NAME, CATEGORY)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*=======================================*/
/* "11" TABLE ROOM */
/*=======================================*/

CREATE TABLE BOOKING (
	BOOK_NUMBER    int(5)         not null AUTO_INCREMENT,
	ROOM_NUMBER    int(5)         not null,
	CHECK_IN       Date       not null,
	CHECK_OUT      Date       not null,
	OCCUPANCY      int            not null,
	primary key (BOOK_NUMBER)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*=======================================*/
/*ALTER TABLE BOOKING*/
/*=======================================*/

ALTER TABLE BOOKING 
	add foreign key (ROOM_NUMBER) references ROOM(NUMBER);

/*=======================================*/
/*ALTER TABLE GUEST_ENTERTAINMENT*/
/*=======================================*/

ALTER TABLE GUEST_ENTERTAINMENT 
	add foreign key (ENTERTAINMENT_NAME) references ENTERTAINMENT(NAME),
	add foreign key (GUESTID) references GUEST(ID);

/*=======================================*/
/*ALTER TABLE GUESTMEETING*/
/*=======================================*/

ALTER TABLE GUESTMEETING 
	add foreign key (GUESTID) references GUEST(ID),
	add foreign key (MEETING_ROOM_NAME, CATEGORY) references MEETINGROOM(NAME, CATEGORY);
	
/*=======================================*/
/*ALTER TABLE GUEST_ENTERTAINMENT*/
/*=======================================*/

ALTER TABLE GUEST_DINING
	add foreign key (DININGROOM_NAME) references DININGROOM(NAME),
	add foreign key (GUESTID) references GUEST(ID);

/*=======================================*/
/*ALTER TABLE GUESTROOM*/
/*=======================================*/

ALTER TABLE GUESTROOM 
	add foreign key (ROOMNUMBER) references ROOM(NUMBER),
	add foreign key (GUESTID) references GUEST(ID);

/*=======================================*/
/*ALTER TABLE GUESTBILL*/
/*=======================================*/

ALTER TABLE BILL
	add foreign key (GUESTID) references GUEST(ID);

/*=======================================*/
/*INSERT INTO TABLE ROOM*/
/*=======================================*/

INSERT INTO ROOM (NUMBER, CATEGORY, TODAYPRICE) 
	VALUES
		(001, "Classic double", 500),
		(002, "Classic double", 500),
		(003, "Classic double", 500),
		(004, "Classic double", 500),
		(005, "Classic double", 500),
		(006, "Classic double", 500),
		(007, "Classic double", 500),
		(008, "Classic double", 500),
		(009, "Classic double", 500),
		(010, "Classic double", 500),
		(011, "Classic single", 300),
		(012, "Classic single", 300),
		(013, "Classic single", 300),
		(014, "Classic single", 300),
		(015, "Classic single", 300),
		(016, "Classic single", 300),
		(017, "Classic single", 300),
		(018, "Classic single", 300),
		(019, "Classic single", 300),
		(020, "Verona Panoramic View", 600),
		(021, "Verona Panoramic View", 600),
		(022, "Verona Panoramic View", 600),
		(023, "Verona Panoramic View", 600),
		(024, "Verona Panoramic View", 600),
		(025, "Verona Resort", 600),
		(026, "Verona Resort", 600),
		(027, "Verona Resort", 600),
		(028, "Verona Resort", 600),
		(029, "Verona Resort", 600),
		(030, "Verona Panoramic Corner King", 1000),
		(031, "Verona Panoramic Corner King", 1000),
		(032, "Verona Panoramic Corner King", 1000),
		(033, "Verona Panoramic Corner King", 1000),
		(034, "Verona Panoramic Corner King", 1000),
		(035, "Verona Tower Suite King", 1000),
		(036, "Verona Tower Suite King", 1000),
		(037, "Verona Tower Suite King", 1000),
		(038, "Verona Tower Suite King", 1000),
		(039, "Verona Tower Suite King", 1000),
		(040, "Verona Tower Suite Two Doubles", 1600),
		(041, "Verona Tower Suite Two Doubles", 1600),
		(042, "Verona Tower Suite Two Doubles", 1600),
		(043, "Verona Tower Suite Two Doubles", 1600),
		(044, "Verona Tower Suite Two Doubles", 1600),
		(045, "Verona Tower Suite Two Doubles", 1600),
		(046, "Verona Tower Suite Executive", 1600),
		(047, "Verona Tower Suite Executive", 1600),
		(048, "Verona Tower Suite Executive", 1600),
		(049, "Verona Tower Suite Executive", 1600),
		(050, "Verona Tower Suite Executive", 1600),
		(051, "Verona Fairway Villa", 2200),
		(052, "Verona Fairway Villa", 2200),
		(053, "Verona Fairway Villa", 2200),
		(054, "Verona Fairway Villa", 2200),
		(055, "Verona Fairway Villa", 2200),
		(056, "Verona Tower Suite Salon", 2000),
		(057, "Verona Tower Suite Salon", 2000),
		(058, "Verona Tower Suite Salon", 2000),
		(059, "Verona Tower Suite Salon", 2000),
		(060, "Verona Tower Suite Salon", 2000),
		(061, "Verona Tower Suite Parlor", 1200),
		(062, "Verona Tower Suite Parlor", 1200),
		(063, "Verona Tower Suite Parlor", 1200),
		(064, "Verona Tower Suite Parlor", 1200),
		(065, "Verona Tower Suite Parlor", 1200),
		(066, "Verona Tower Suite King Encore", 2000),
		(067, "Verona Tower Suite King Encore", 2000),
		(068, "Verona Tower Suite King Encore", 2000),
		(069, "Verona Tower Suite King Encore", 2000),
		(070, "Verona Tower Suite King Encore", 2000),
		(071, "Verona Tower Suite Two Doubles Encore", 1700),
		(072, "Verona Tower Suite Two Doubles Encore", 1700),
		(073, "Verona Tower Suite Two Doubles Encore", 1700),
		(074, "Verona Tower Suite Two Doubles Encore", 1700),
		(075, "Verona Tower Suite Two Doubles Encore", 1700),
		(076, "Encore Tower Suite King", 2500),
		(077, "Encore Tower Suite King", 2500),
		(078, "Encore Tower Suite King", 2500),
		(079, "Encore Tower Suite King", 2500),
		(080, "Encore Tower Suite King", 2500),
		(081, "Encore Tower Suite Two Queens", 3000),
		(082, "Encore Tower Suite Two Queens", 3000),
		(083, "Encore Tower Suite Two Queens", 3000),
		(084, "Encore Tower Suite Two Queens", 3000),
		(085, "Encore Tower Suite Two Queens", 3000),
		(086, "Encore Tower Suite Parlor", 2600),
		(087, "Encore Tower Suite Parlor", 2600),
		(088, "Encore Tower Suite Parlor", 2600),
		(089, "Encore Tower Suite Parlor", 2600),
		(090, "Encore Tower Suite Parlor", 2600),
		(091, "Encore Three Bedrooms Duplex", 2500),
		(092, "Encore Three Bedrooms Duplex", 2500),
		(093, "Encore Three Bedrooms Duplex", 2500),
		(094, "Encore Three Bedrooms Duplex", 2500),
		(095, "Encore Three Bedrooms Duplex", 2500),
		(096, "Encore Two Bedroom Apartment", 2600),
		(097, "Encore Two Bedroom Apartment", 2600),
		(098, "Encore Two Bedroom Apartment", 2600),
		(099, "Encore Two Bedroom Apartment", 2600),
		(100, "Encore Two Bedroom Apartment", 2600);
		