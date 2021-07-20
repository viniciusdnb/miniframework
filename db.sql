CREATE TABLE `permClassUser` ( `idPermClassUser` INT NOT NULL AUTO_INCREMENT , `idUser` INT NOT NULL , `descClassPerm` VARCHAR(50) NOT NULL , PRIMARY KEY (`idPermClassUser`)) ENGINE = InnoDB;
CREATE TABLE `user` ( `idUser` INT NOT NULL AUTO_INCREMENT , `nameUser` VARCHAR(50) NOT NULL , PRIMARY KEY (`idUser`)) ENGINE = InnoDB;
CREATE TABLE `hash` ( `idHash` INT NOT NULL AUTO_INCREMENT , `id` VARCHAR(100) NOT NULL , `hash` VARCHAR(200) NOT NULL , PRIMARY KEY (`idHash`)) ENGINE = InnoDB;
ALTER TABLE `permClassUser` ADD CONSTRAINT `idUserKeyClassPerm` FOREIGN KEY (`idUser`) REFERENCES `user`(`idUser`) ON DELETE RESTRICT ON UPDATE RESTRICT;
CREATE TABLE `app`.`permActionUser` ( `idPermActionUser` INT NOT NULL AUTO_INCREMENT , `idUser` INT NOT NULL , `descActionPerm` VARCHAR(50) NOT NULL , PRIMARY KEY (`idPermActionUser`)) ENGINE = InnoDB;
ALTER TABLE `permActionUser` ADD CONSTRAINT `idUserKeyActionPerm` FOREIGN KEY (`idUser`) REFERENCES `user`(`idUser`) ON DELETE RESTRICT ON UPDATE RESTRICT;