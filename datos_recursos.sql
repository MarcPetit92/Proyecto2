/*tipo*/
INSERT INTO `tbl_tipo_recurso` (`tip_id`, `tip_nombre`) VALUES (NULL, 'Aula Teoria');
INSERT INTO `tbl_tipo_recurso` (`tip_id`, `tip_nombre`) VALUES (NULL, 'Aula Informatica');
INSERT INTO `tbl_tipo_recurso` (`tip_id`, `tip_nombre`) VALUES (NULL, 'Despacho');
INSERT INTO `tbl_tipo_recurso` (`tip_id`, `tip_nombre`) VALUES (NULL, 'Sala Reuniones');
INSERT INTO `tbl_tipo_recurso` (`tip_id`, `tip_nombre`) VALUES (NULL, 'Proyector');
INSERT INTO `tbl_tipo_recurso` (`tip_id`, `tip_nombre`) VALUES (NULL, 'Carrito');
INSERT INTO `tbl_tipo_recurso` (`tip_id`, `tip_nombre`) VALUES (NULL, 'Portatil');
INSERT INTO `tbl_tipo_recurso` (`tip_id`, `tip_nombre`) VALUES (NULL, 'Movil');

/*recursos*/
INSERT INTO `tbl_recursos` (`rec_nombre`, `rec_disponibilidad`, `rec_foto`, `tip_id`) VALUES ('Aula teoria 100', 1, '1.jpg', 1);
INSERT INTO `tbl_recursos` (`rec_nombre`, `rec_disponibilidad`, `rec_foto`, `tip_id`) VALUES ('Aula teoria 200', 1, '2.jpg', 1);
INSERT INTO `tbl_recursos` (`rec_nombre`, `rec_disponibilidad`, `rec_foto`, `tip_id`) VALUES ('Aula teoria 300', 1, '3.jpg', 1);
INSERT INTO `tbl_recursos` (`rec_nombre`, `rec_disponibilidad`, `rec_foto`, `tip_id`) VALUES ('Aula teoria 400', 1, '4.jpg', 1);

INSERT INTO `tbl_recursos` (`rec_nombre`, `rec_disponibilidad`, `rec_foto`, `tip_id`) VALUES ('Aula informatca 100', 1, '5.jpg', 2);
INSERT INTO `tbl_recursos` (`rec_nombre`, `rec_disponibilidad`, `rec_foto`, `tip_id`) VALUES ('Aula informatca 200', 1, '6.jpg', 2);

INSERT INTO `tbl_recursos` (`rec_nombre`, `rec_disponibilidad`, `rec_foto`, `tip_id`) VALUES ('Despacho A1', 1, '7.jpg', 3);
INSERT INTO `tbl_recursos` (`rec_nombre`, `rec_disponibilidad`, `rec_foto`, `tip_id`) VALUES ('Despacho A2', 1, '8.jpg', 3);

INSERT INTO `tbl_recursos` (`rec_nombre`, `rec_disponibilidad`, `rec_foto`, `tip_id`) VALUES ('Sala B1', 1, '9.jpg', 4);

INSERT INTO `tbl_recursos` (`rec_nombre`, `rec_disponibilidad`, `rec_foto`, `tip_id`) VALUES ('Proyector C1', 1, '10.jpg', 5);

INSERT INTO `tbl_recursos` (`rec_nombre`, `rec_disponibilidad`, `rec_foto`, `tip_id`) VALUES ('Carro portatiles D1', 1, '11.jpg', 6);

INSERT INTO `tbl_recursos` (`rec_nombre`, `rec_disponibilidad`, `rec_foto`, `tip_id`) VALUES ('Portail P100', 1, '12.jpg', 7);
INSERT INTO `tbl_recursos` (`rec_nombre`, `rec_disponibilidad`, `rec_foto`, `tip_id`) VALUES ('Portail P101', 1, '13.jpg', 7);
INSERT INTO `tbl_recursos` (`rec_nombre`, `rec_disponibilidad`, `rec_foto`, `tip_id`) VALUES ('Portail P102', 1, '14.jpg', 7);

INSERT INTO `tbl_recursos` (`rec_nombre`, `rec_disponibilidad`, `rec_foto`, `tip_id`) VALUES ('Movil M100', 1, '15.jpg', 8);
INSERT INTO `tbl_recursos` (`rec_nombre`, `rec_disponibilidad`, `rec_foto`, `tip_id`) VALUES ('Movil M101', 1, '16.jpg', 8);

/*usuarios*/
