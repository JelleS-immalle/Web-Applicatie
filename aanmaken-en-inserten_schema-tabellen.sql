CREATE SCHEMA `Uurrooster-Web-App`;
USE `Uurrooster-Web-App`;

CREATE TABLE `Uurrooster-Web-App`.`Leerkrachten` (
  `LeerkrachtID` INT NOT NULL,
  `LeerkrachtNaam` VARCHAR(45) NULL,
  `VakNaam/Namen` VARCHAR(45) NULL,
  PRIMARY KEY (`LeerkrachtID`));

CREATE TABLE `Uurrooster-Web-App`.`Leerling` (
  `LeerlingID` INT NOT NULL,
  `LeerlingNaam` VARCHAR(45) NULL,
  `Klasnummer` INT NULL,
  `KlasNaam` VARCHAR(45) NULL,
  PRIMARY KEY (`LeerlingID`));

CREATE TABLE `Uurrooster-Web-App`.`Vakken` (
  `VakID` INT NOT NULL,
  `Leerkracht` VARCHAR(45) NULL,
  `VakNaam` VARCHAR(45) NULL,
  PRIMARY KEY (`VakID`));

INSERT INTO `Uurrooster-Web-App`.`Leerling` (`LeerlingID`, `LeerlingNaam`, `Klasnummer`, `KlasNaam`) VALUES
('1', 'Anthonissen Bert', '1', '6ITN'),
('2', 'Backx Sander', '2', '6ITN'),
('3', 'De Vry Daan', '3', '6ITN'),
('4', 'Dries Axel', '4', '6ITN'),
('5', 'Ernst Thom', '5', '6ITN'),
('6', 'Goyvaerts Remco', '6', '6ITN'),
('7', 'Peeters Wout', '7', '6ITN'),
('8', 'Present Liam', '8', '6ITN'),
('9', 'Puvrez Kathleen', '9', '6ITN'),
('10', 'Sas Cedric', '10', '6ITN'),
('11', 'Swaelen Jelle', '11', '6ITN'),
('12', 'Van den Langenbergh Arne', '12', '6ITN'),
('13', 'Van de Winckel Kenzo', '13', '6ITN'),
('14', 'Jos', '1', '5ITN'),
('15', 'Jef', '2', '5ITN'),
('16', 'Willem', '3', '5ITN');

INSERT INTO `Uurrooster-Web-App`.`Leerkrachten` (`LeerkrachtID`, `LeerkrachtNaam`, `VakNaam/Namen`) VALUES
('1', 'Cauwenberg B.', 'Systeembeheer en Wiskunde'),
('2', 'Van Broeckhoven H.', 'Software, Stage en Natuurwetenschappen'),
('3', 'Philips J.', 'Godsdienst'),
('4', 'De Schutter G.', 'Aardrijkskunde'),
('5', 'Bens M.-L.', 'Frans en Esthetica'),
('6', 'Van Dooren M.', 'Nederlands'),
('7', 'Schryvers S.', 'Engels'),
('8', 'Swaans L.', 'Bedrijfsbeheer'),
('9', 'van Bergen M.', 'Zakelijke Communicatie'),
('10', 'Vervoort K.', 'Lichamelijke Opvoeding'),
('11', 'Degrauwe W.', 'Geschiedenis');

INSERT INTO `Uurrooster-Web-App`.`Vakken` (`VakID`, `Leerkracht`, `VakNaam`) VALUES
('1', 'Van Broeckhoven H.', 'Software'),
('2', 'Degrauwe W.', 'Geschiedenis'),
('3', 'De Schutter G.', 'Aardrijkskunde'),
('4', 'Bens M.-L.', 'Esthetica'),
('5', 'Van Dooren M.', 'Nederlands'),
('6', 'Schryvers S.', 'Engels'),
('7', 'Cauwenberg B.', 'Systeembeheer'),
('8', 'Bens M.-L.', 'Frans'),
('9', 'Cauwenberg B.', 'Wiskunde'),
('10', 'Swaans L.', 'Bedrijfsbeheer'),
('11', 'Van Broeckhoven H.', 'Stage'),
('12', 'van Bergen M.', 'Zakelijke Communicatie'),
('13', 'Van Broeckhoven H.', 'Natuurwetenschappen'),
('14', 'Philips J.', 'Godsdienst'),
('15', 'Vervoort K.', 'Lichamelijke Opvoeding');
