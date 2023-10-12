create table Pixel (
    coor_x SMALLINT unsigned,
    coor_y SMALLINT unsigned,
    hexcolor varchar(6),
    primary key (coor_x, coor_y)
);

INSERT INTO `pixel`(`coor_x`, `coor_y`, `hexcolor`) VALUES ('25','25','000000');
INSERT INTO `pixel`(`coor_x`, `coor_y`, `hexcolor`) VALUES ('400','0','FF0000');
INSERT INTO `pixel`(`coor_x`, `coor_y`, `hexcolor`) VALUES ('401','0','00FF00');
INSERT INTO `pixel`(`coor_x`, `coor_y`, `hexcolor`) VALUES ('402','0','0000FF');