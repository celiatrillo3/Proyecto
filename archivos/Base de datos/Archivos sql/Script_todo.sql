-- Script base de datos
DROP SCHEMA IF EXISTS museo_ciclomotor;

CREATE SCHEMA museo_ciclomotor CHARSET latin1 COLLATE latin1_general_ci;

USE museo_ciclomotor;

CREATE TABLE moto(
  id_moto INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
  modelo VARCHAR(20) NOT NULL,
  año NUMERIC NULL,
  color VARCHAR(20) NOT NULL,
  historia VARCHAR(1000) NULL,
  tipo VARCHAR(20) NULL DEFAULT "Ciclomotor",
  marca_id INTEGER NOT NULL
) ENGINE InnoDB;

CREATE TABLE imagen(
  id_imagen INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
  ruta_imagen VARCHAR(500) NOT NULL,
  moto_id INTEGER NULL
) ENGINE InnoDB;

CREATE TABLE marca(
  id_marca INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
  nombre VARCHAR(20) NOT NULL,
  pais_id INTEGER NOT NULL
) ENGINE InnoDB;

CREATE TABLE pais(
  id_pais INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
  nombre_pais VARCHAR(50) NOT NULL,
  continente VARCHAR(20) NOT NULL
) ENGINE InnoDB;

CREATE TABLE comentario(
  id_comentario INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
  usuario_id INTEGER NOT NULL,
  moto_id INTEGER NOT NULL,
  texto VARCHAR(1000) NOT NULL,
  puntuacion NUMERIC NULL,
  fecha TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE InnoDB;

CREATE TABLE usuarios(
  id_usuario INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
  usuario VARCHAR(20) NOT NULL,
  email VARCHAR(30) NOT NULL,
  contraseña VARCHAR(50) NOT NULL,
  administrador VARCHAR(20) NOT NULL DEFAULT FALSE
) ENGINE InnoDB;

CREATE TABLE favoritos(
  id_favoritos INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
  fecha TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  usuario_id INTEGER NOT NULL,
  moto_id INTEGER NOT NULL
) ENGINE InnoDB;

ALTER TABLE moto
  ADD FOREIGN KEY (marca_id) REFERENCES marca(id_marca) ON DELETE RESTRICT ON UPDATE RESTRICT;
  
ALTER TABLE imagen
  ADD FOREIGN KEY (moto_id) REFERENCES moto(id_moto) ON DELETE RESTRICT ON UPDATE RESTRICT;
  
ALTER TABLE marca
  ADD FOREIGN KEY (pais_id) REFERENCES pais(id_pais) ON DELETE RESTRICT ON UPDATE RESTRICT;
  
ALTER TABLE comentario
  ADD FOREIGN KEY (usuario_id) REFERENCES usuarios(id_usuario) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD FOREIGN KEY (moto_id) REFERENCES moto(id_moto) ON DELETE RESTRICT ON UPDATE RESTRICT;
  
ALTER TABLE favoritos
  ADD FOREIGN KEY (usuario_id) REFERENCES usuarios(id_usuario) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD FOREIGN KEY (moto_id) REFERENCES moto(id_moto) ON DELETE RESTRICT ON UPDATE RESTRICT;
  
USE museo_ciclomotor;
-- Script insert paises
INSERT INTO pais (nombre_pais, continente) VALUES
('Afganistán', 'Asia'),
('Albania', 'Europa'),
('Alemania', 'Europa'),
('Andorra', 'Europa'),
('Angola', 'África'),
('Antigua y Barbuda', 'América'),
('Arabia Saudita', 'Asia'),
('Argelia', 'África'),
('Argentina', 'América'),
('Armenia', 'Asia'),
('Australia', 'Oceanía'),
('Austria', 'Europa'),
('Azerbaiyán', 'Asia'),
('Bahamas', 'América'),
('Bangladés', 'Asia'),
('Barbados', 'América'),
('Baréin', 'Asia'),
('Bélgica', 'Europa'),
('Belice', 'América'),
('Benín', 'África'),
('Bielorrusia', 'Europa'),
('Birmania', 'Asia'),
('Bolivia', 'América'),
('Bosnia y Herzegovina', 'Europa'),
('Botsuana', 'África'),
('Brasil', 'América'),
('Brunéi', 'Asia'),
('Bulgaria', 'Europa'),
('Burkina Faso', 'África'),
('Burundi', 'África'),
('Bután', 'Asia'),
('Cabo Verde', 'África'),
('Camboya', 'Asia'),
('Camerún', 'África'),
('Canadá', 'América'),
('Catar', 'Asia'),
('Chad', 'África'),
('Chile', 'América'),
('China', 'Asia'),
('Chipre', 'Europa'),
('Colombia', 'América'),
('Comoras', 'África'),
('Congo', 'África'),
('Corea del Norte', 'Asia'),
('Corea del Sur', 'Asia'),
('Costa de Marfil', 'África'),
('Costa Rica', 'América'),
('Croacia', 'Europa'),
('Cuba', 'América'),
('Dinamarca', 'Europa'),
('Dominica', 'América'),
('Ecuador', 'América'),
('Egipto', 'África'),
('El Salvador', 'América'),
('Emiratos Árabes Unidos', 'Asia'),
('Eritrea', 'África'),
('Eslovaquia', 'Europa'),
('Eslovenia', 'Europa'),
('España', 'Europa'),
('Estados Unidos', 'América'),
('Estonia', 'Europa'),
('Esuatini', 'África'),
('Etiopía', 'África'),
('Filipinas', 'Asia'),
('Finlandia', 'Europa'),
('Fiyi', 'Oceanía'),
('Francia', 'Europa'),
('Gabón', 'África'),
('Gambia', 'África'),
('Georgia', 'Asia'),
('Ghana', 'África'),
('Granada', 'América'),
('Grecia', 'Europa'),
('Guatemala', 'América'),
('Guyana', 'América'),
('Guinea', 'África'),
('Guinea-Bisáu', 'África'),
('Guinea Ecuatorial', 'África'),
('Haití', 'América'),
('Honduras', 'América'),
('Hungría', 'Europa'),
('India', 'Asia'),
('Indonesia', 'Asia'),
('Irak', 'Asia'),
('Irán', 'Asia'),
('Irlanda', 'Europa'),
('Islandia', 'Europa'),
('Islas Marshall', 'Oceanía'),
('Islas Salomón', 'Oceanía'),
('Israel', 'Asia'),
('Italia', 'Europa'),
('Jamaica', 'América'),
('Japón', 'Asia'),
('Jordania', 'Asia'),
('Kazajistán', 'Asia'),
('Kenia', 'África'),
('Kirguistán', 'Asia'),
('Kiribati', 'Oceanía'),
('Kuwait', 'Asia'),
('Laos', 'Asia'),
('Lesoto', 'África'),
('Letonia', 'Europa'),
('Líbano', 'Asia'),
('Liberia', 'África'),
('Libia', 'África'),
('Liechtenstein', 'Europa'),
('Lituania', 'Europa'),
('Luxemburgo', 'Europa'),
('Madagascar', 'África'),
('Malasia', 'Asia'),
('Malaui', 'África'),
('Maldivas', 'Asia'),
('Malí', 'África'),
('Malta', 'Europa'),
('Marruecos', 'África'),
('Mauricio', 'África'),
('Mauritania', 'África'),
('México', 'América'),
('Micronesia', 'Oceanía'),
('Moldavia', 'Europa'),
('Mónaco', 'Europa'),
('Mongolia', 'Asia'),
('Montenegro', 'Europa'),
('Mozambique', 'África'),
('Namibia', 'África'),
('Nauru', 'Oceanía'),
('Nepal', 'Asia'),
('Nicaragua', 'América'),
('Níger', 'África'),
('Nigeria', 'África'),
('Noruega', 'Europa'),
('Nueva Zelanda', 'Oceanía'),
('Omán', 'Asia'),
('Países Bajos', 'Europa'),
('Pakistán', 'Asia'),
('Palaos', 'Oceanía'),
('Palestina', 'Asia'),
('Panamá', 'América'),
('Papúa Nueva Guinea', 'Oceanía'),
('Paraguay', 'América'),
('Perú', 'América'),
('Polonia', 'Europa'),
('Portugal', 'Europa'),
('Reino Unido', 'Europa'),
('República Centroafricana', 'África'),
('República Checa', 'Europa'),
('República Democrática del Congo', 'África'),
('República Dominicana', 'América'),
('Ruanda', 'África'),
('Rumania', 'Europa'),
('Rusia', 'Europa'),
('Samoa', 'Oceanía'),
('San Cristóbal y Nieves', 'América'),
('San Marino', 'Europa'),
('San Vicente y las Granadinas', 'América'),
('Santa Lucía', 'América'),
('Santo Tomé y Príncipe', 'África'),
('Senegal', 'África'),
('Serbia', 'Europa'),
('Seychelles', 'África'),
('Sierra Leona', 'África'),
('Singapur', 'Asia'),
('Siria', 'Asia'),
('Somalia', 'África'),
('Sri Lanka', 'Asia'),
('Suazilandia', 'África'),
('Sudáfrica', 'África'),
('Sudán', 'África'),
('Sudán del Sur', 'África'),
('Suecia', 'Europa'),
('Suiza', 'Europa'),
('Surinam', 'América'),
('Tailandia', 'Asia'),
('Tanzania', 'África'),
('Tayikistán', 'Asia'),
('Timor Oriental', 'Asia'),
('Togo', 'África'),
('Tonga', 'Oceanía'),
('Trinidad y Tobago', 'América'),
('Túnez', 'África'),
('Turkmenistán', 'Asia'),
('Turquía', 'Asia'),
('Tuvalu', 'Oceanía'),
('Ucrania', 'Europa'),
('Uganda', 'África'),
('Uruguay', 'América'),
('Uzbekistán', 'Asia'),
('Vanuatu', 'Oceanía'),
('Vaticano', 'Europa'),
('Venezuela', 'América'),
('Vietnam', 'Asia'),
('Yemen', 'Asia'),
('Yibuti', 'África'),
('Zambia', 'África'),
('Zimbabue', 'África');

-- INSERT de todas las marcas de ciclomotores (años 50-90)
INSERT INTO marca (pais_id, nombre) VALUES

-- ESPAÑA
((SELECT id_pais FROM pais WHERE nombre_pais = 'España'), 'Derbi'),
((SELECT id_pais FROM pais WHERE nombre_pais = 'España'), 'Rieju'),
((SELECT id_pais FROM pais WHERE nombre_pais = 'España'), 'Montesa'),
((SELECT id_pais FROM pais WHERE nombre_pais = 'España'), 'Bultaco'),
((SELECT id_pais FROM pais WHERE nombre_pais = 'España'), 'OSSA'),
((SELECT id_pais FROM pais WHERE nombre_pais = 'España'), 'Sanglas'),
((SELECT id_pais FROM pais WHERE nombre_pais = 'España'), 'Mecatecno'),
((SELECT id_pais FROM pais WHERE nombre_pais = 'España'), 'MH Motorhispania'),
((SELECT id_pais FROM pais WHERE nombre_pais = 'España'), 'Puch Avello'),
((SELECT id_pais FROM pais WHERE nombre_pais = 'España'), 'Mototrans'),
((SELECT id_pais FROM pais WHERE nombre_pais = 'España'), 'Gimson'),
((SELECT id_pais FROM pais WHERE nombre_pais = 'España'), 'Mobylette'),

-- ITALIA
((SELECT id_pais FROM pais WHERE nombre_pais = 'Italia'), 'Piaggio'),
((SELECT id_pais FROM pais WHERE nombre_pais = 'Italia'), 'Ducati'),
((SELECT id_pais FROM pais WHERE nombre_pais = 'Italia'), 'Benelli'),
((SELECT id_pais FROM pais WHERE nombre_pais = 'Italia'), 'Moto Guzzi'),
((SELECT id_pais FROM pais WHERE nombre_pais = 'Italia'), 'Laverda'),
((SELECT id_pais FROM pais WHERE nombre_pais = 'Italia'), 'Aprilia'),
((SELECT id_pais FROM pais WHERE nombre_pais = 'Italia'), 'Gilera'),
((SELECT id_pais FROM pais WHERE nombre_pais = 'Italia'), 'Cagiva'),
((SELECT id_pais FROM pais WHERE nombre_pais = 'Italia'), 'Italjet'),
((SELECT id_pais FROM pais WHERE nombre_pais = 'Italia'), 'Motori Minarelli'),
((SELECT id_pais FROM pais WHERE nombre_pais = 'Italia'), 'Franco Morini'),
((SELECT id_pais FROM pais WHERE nombre_pais = 'Italia'), 'Garelli'),
((SELECT id_pais FROM pais WHERE nombre_pais = 'Italia'), 'Malaguti'),
((SELECT id_pais FROM pais WHERE nombre_pais = 'Italia'), 'FM'),
((SELECT id_pais FROM pais WHERE nombre_pais = 'Italia'), 'Testi'),
((SELECT id_pais FROM pais WHERE nombre_pais = 'Italia'), 'Di Blasi'),
((SELECT id_pais FROM pais WHERE nombre_pais = 'Italia'), 'Casalini'),
((SELECT id_pais FROM pais WHERE nombre_pais = 'Italia'), 'Bianchi'),
((SELECT id_pais FROM pais WHERE nombre_pais = 'Italia'), 'MV Agusta'),
((SELECT id_pais FROM pais WHERE nombre_pais = 'Italia'), 'Lambretta'),
((SELECT id_pais FROM pais WHERE nombre_pais = 'Italia'), 'Innocenti'),
((SELECT id_pais FROM pais WHERE nombre_pais = 'Italia'), 'Mondial'),
((SELECT id_pais FROM pais WHERE nombre_pais = 'Italia'), 'Parilla'),
((SELECT id_pais FROM pais WHERE nombre_pais = 'Italia'), 'Nassetti'),
((SELECT id_pais FROM pais WHERE nombre_pais = 'Italia'), 'Alpino'),
((SELECT id_pais FROM pais WHERE nombre_pais = 'Italia'), 'Motobici'),
((SELECT id_pais FROM pais WHERE nombre_pais = 'Italia'), 'ITOM'),
((SELECT id_pais FROM pais WHERE nombre_pais = 'Italia'), 'DEMB'), 
((SELECT id_pais FROM pais WHERE nombre_pais = 'Italia'), 'Ardito'), 
((SELECT id_pais FROM pais WHERE nombre_pais = 'Italia'), 'Espress Werke Italia'),
((SELECT id_pais FROM pais WHERE nombre_pais = 'Italia'), 'Atala'),

-- FRANCIA
((SELECT id_pais FROM pais WHERE nombre_pais = 'Francia'), 'Motobecane'),
((SELECT id_pais FROM pais WHERE nombre_pais = 'Francia'), 'Peugeot'),
((SELECT id_pais FROM pais WHERE nombre_pais = 'Francia'), 'Solex'),

-- ALEMANIA
((SELECT id_pais FROM pais WHERE nombre_pais = 'Alemania'), 'BMW'),
((SELECT id_pais FROM pais WHERE nombre_pais = 'Alemania'), 'Kreidler'),
((SELECT id_pais FROM pais WHERE nombre_pais = 'Alemania'), 'Zündapp'),
((SELECT id_pais FROM pais WHERE nombre_pais = 'Alemania'), 'Hercules'),
((SELECT id_pais FROM pais WHERE nombre_pais = 'Alemania'), 'Sachs'),

-- AUSTRIA
((SELECT id_pais FROM pais WHERE nombre_pais = 'Austria'), 'Puch'),

-- REINO UNIDO
((SELECT id_pais FROM pais WHERE nombre_pais = 'Reino Unido'), 'BSA'),
((SELECT id_pais FROM pais WHERE nombre_pais = 'Reino Unido'), 'Triumph'),
((SELECT id_pais FROM pais WHERE nombre_pais = 'Reino Unido'), 'Norton'),
((SELECT id_pais FROM pais WHERE nombre_pais = 'Reino Unido'), 'Ariel'),
((SELECT id_pais FROM pais WHERE nombre_pais = 'Reino Unido'), 'James'),

-- JAPÓN
((SELECT id_pais FROM pais WHERE nombre_pais = 'Japón'), 'Honda'),
((SELECT id_pais FROM pais WHERE nombre_pais = 'Japón'), 'Yamaha'),
((SELECT id_pais FROM pais WHERE nombre_pais = 'Japón'), 'Suzuki'),
((SELECT id_pais FROM pais WHERE nombre_pais = 'Japón'), 'Kawasaki'),

-- ESTADOS UNIDOS
((SELECT id_pais FROM pais WHERE nombre_pais = 'Estados Unidos'), 'Harley-Davidson'),

-- PORTUGAL
((SELECT id_pais FROM pais WHERE nombre_pais = 'Portugal'), 'Casal'),
((SELECT id_pais FROM pais WHERE nombre_pais = 'Portugal'), 'Famel'),
((SELECT id_pais FROM pais WHERE nombre_pais = 'Portugal'), 'Macal');

-- insert motos
INSERT INTO moto(modelo, año, color, historia, tipo, marca_id) VALUES 
("Califfone", 1972, "Naranja", "Ciclomotor italiano muy popular en los años 70 por su bajo coste y facilidad de uso. Fue una solución de movilidad urbana en plena expansión industrial europea. Equipaba un motor de pequeña cilindrada de 2 tiempos, transmisión automática y destacaba por su ligereza y mantenimiento sencillo.", "Ciclomotor" ,(SELECT id_marca FROM marca WHERE nombre = 'Atala')),

("Diablo", 1979, "Rojo", "Modelo deportivo de Derbi muy apreciado entre los jóvenes por su estética agresiva y carácter racing. Representó la cultura juvenil de finales de los 70 en España. Incorporaba un motor de 49cc de 2 tiempos, cambio manual y ofrecía prestaciones superiores dentro de su categoría.", "Ciclomotor" ,(SELECT id_marca FROM marca WHERE nombre = 'Derbi')),

("XF-17", 1975, "Cobre", "Ciclomotor portugués de Famel conocido por su resistencia y fiabilidad en entornos rurales. Muy utilizado como herramienta de trabajo diario. Montaba un motor de 2 tiempos, estructura robusta y suspensión básica adaptada a caminos irregulares.", "Ciclomotor" ,(SELECT id_marca FROM marca WHERE nombre = 'Famel')),

("Elite 2", 1970, "Blanco, rojo y verde", "Modelo de Gimson muy popular en España durante los años 70, destacando por su diseño atractivo y accesible. Fue habitual como primer vehículo para muchos usuarios. Contaba con motor de 49cc, transmisión automática y un chasis ligero ideal para desplazamientos urbanos.", "Ciclomotor" ,(SELECT id_marca FROM marca WHERE nombre = 'Gimson')),

("Dingo", 1965, "Rojo", "Ciclomotor ligero de Moto Guzzi diseñado como transporte económico en la posguerra europea. Se convirtió en una opción fiable para trabajadores. Equipaba motor monocilíndrico de 2 tiempos, con una mecánica simple, resistente y de fácil reparación.", "Ciclomotor" ,(SELECT id_marca FROM marca WHERE nombre = 'Moto Guzzi')),

("Hispania dingo", 1965, "Rojo", "Versión española del Dingo fabricada bajo licencia, muy extendida en zonas rurales y pequeñas ciudades. Fue clave en la motorización de la población. Incorporaba motor de 49cc, transmisión sencilla y gran facilidad de mantenimiento.", "Ciclomotor" ,(SELECT id_marca FROM marca WHERE nombre = 'Moto Guzzi')),

("Dakar junior", 1988, "Amarillo y negro", "Modelo de Macal inspirado en el rally Dakar, reflejando la influencia de las competiciones en el diseño de ciclomotores. Orientado a un público joven, combinaba estética aventurera con funcionalidad. Disponía de motor de 2 tiempos, neumáticos mixtos y suspensiones elevadas.", "Ciclomotor" ,(SELECT id_marca FROM marca WHERE nombre = 'Macal')),

("Cady E14", 1980, "Negro", "Uno de los Mobylette más icónicos en España, ampliamente utilizado por su fiabilidad y bajo consumo. Fue un símbolo de movilidad económica durante décadas. Montaba motor de 49cc automático, con un sistema mecánico muy sencillo y duradero.", "Ciclomotor" ,(SELECT id_marca FROM marca WHERE nombre = 'Mobylette')),

("Moby-Cross", 1990, "Naranja", "Versión más aventurera de Mobylette pensada para caminos y terrenos mixtos, reflejando la tendencia off-road de la época. Muy popular entre jóvenes. Incorporaba motor de 2 tiempos, suspensiones reforzadas y ruedas adaptadas a terrenos irregulares.", "Ciclomotor" ,(SELECT id_marca FROM marca WHERE nombre = 'Mobylette')),

("104", 1970, "Rojo", "Ciclomotor francés de Peugeot muy difundido en Europa por su fiabilidad y facilidad de uso. Fue una opción común en entornos urbanos. Equipaba motor de 49cc, transmisión automática y un diseño compacto orientado a la practicidad.", "Ciclomotor" ,(SELECT id_marca FROM marca WHERE nombre = 'Peugeot')),

("Ape 50", 1948, "Blanco", "Vehículo ligero de Piaggio diseñado en la posguerra para transporte de carga. Jugó un papel clave en la recuperación económica en Europa. Incorporaba motor de pequeña cilindrada, tres ruedas y gran capacidad de carga para su tamaño.", "Ciclomotor" ,(SELECT id_marca FROM marca WHERE nombre = 'Piaggio')),

("Condor", 1980, "Amarillo", "Modelo emblemático de Puch Avello en España, muy popular entre jóvenes por su carácter deportivo. También se utilizó en competiciones amateur. Montaba motor de 49cc de 2 tiempos, cambio manual y chasis resistente para uso mixto.", "Ciclomotor" ,(SELECT id_marca FROM marca WHERE nombre = 'Puch Avello')),

("Vespino GL", 1973, "Rojo", "Uno de los ciclomotores más populares en España, fabricado bajo licencia de Piaggio. Marcó una generación por su accesibilidad y facilidad de uso. Equipaba motor automático de 49cc, arranque sencillo y gran eficiencia en ciudad.", "Ciclomotor" ,(SELECT id_marca FROM marca WHERE nombre = 'Piaggio'));

-- insert imagenes

-- Inserts para la carpeta: atala_califfone (Moto: Atala - Califfone)
INSERT INTO imagen (ruta_imagen, moto_id) VALUES ('imgs_motos/atala_califfone/1.JPG', (SELECT m.id_moto FROM moto m INNER JOIN marca ma ON m.marca_id = ma.id_marca WHERE m.modelo = 'Califfone' AND ma.nombre = 'Atala'));
INSERT INTO imagen (ruta_imagen, moto_id) VALUES ('imgs_motos/atala_califfone/2.JPG', (SELECT m.id_moto FROM moto m INNER JOIN marca ma ON m.marca_id = ma.id_marca WHERE m.modelo = 'Califfone' AND ma.nombre = 'Atala'));
INSERT INTO imagen (ruta_imagen, moto_id) VALUES ('imgs_motos/atala_califfone/3.JPG', (SELECT m.id_moto FROM moto m INNER JOIN marca ma ON m.marca_id = ma.id_marca WHERE m.modelo = 'Califfone' AND ma.nombre = 'Atala'));

-- Inserts para la carpeta: derbi_diablo (Moto: Derbi - Diablo)
INSERT INTO imagen (ruta_imagen, moto_id) VALUES ('imgs_motos/derbi_diablo/1.JPG', (SELECT m.id_moto FROM moto m INNER JOIN marca ma ON m.marca_id = ma.id_marca WHERE m.modelo = 'Diablo' AND ma.nombre = 'Derbi'));
INSERT INTO imagen (ruta_imagen, moto_id) VALUES ('imgs_motos/derbi_diablo/2.JPG', (SELECT m.id_moto FROM moto m INNER JOIN marca ma ON m.marca_id = ma.id_marca WHERE m.modelo = 'Diablo' AND ma.nombre = 'Derbi'));

-- Inserts para la carpeta: famel_xf_17 (Moto: Famel - XF-17)
INSERT INTO imagen (ruta_imagen, moto_id) VALUES ('imgs_motos/famel_xf_17/1.JPG', (SELECT m.id_moto FROM moto m INNER JOIN marca ma ON m.marca_id = ma.id_marca WHERE m.modelo = 'XF-17' AND ma.nombre = 'Famel'));
INSERT INTO imagen (ruta_imagen, moto_id) VALUES ('imgs_motos/famel_xf_17/2.JPG', (SELECT m.id_moto FROM moto m INNER JOIN marca ma ON m.marca_id = ma.id_marca WHERE m.modelo = 'XF-17' AND ma.nombre = 'Famel'));
INSERT INTO imagen (ruta_imagen, moto_id) VALUES ('imgs_motos/famel_xf_17/3.JPG', (SELECT m.id_moto FROM moto m INNER JOIN marca ma ON m.marca_id = ma.id_marca WHERE m.modelo = 'XF-17' AND ma.nombre = 'Famel'));

-- Inserts para la carpeta: galeria (Imágenes de galería, sin moto asociada)
INSERT INTO imagen (ruta_imagen, moto_id) VALUES ('imgs_motos/galeria/P2011189.JPG', NULL);
INSERT INTO imagen (ruta_imagen, moto_id) VALUES ('imgs_motos/galeria/P2011190.JPG', NULL);
INSERT INTO imagen (ruta_imagen, moto_id) VALUES ('imgs_motos/galeria/P2011208.JPG', NULL);
INSERT INTO imagen (ruta_imagen, moto_id) VALUES ('imgs_motos/galeria/P2011209.JPG', NULL);
INSERT INTO imagen (ruta_imagen, moto_id) VALUES ('imgs_motos/galeria/P2011210.JPG', NULL);
INSERT INTO imagen (ruta_imagen, moto_id) VALUES ('imgs_motos/galeria/P2011211.JPG', NULL);
INSERT INTO imagen (ruta_imagen, moto_id) VALUES ('imgs_motos/galeria/P2011212.JPG', NULL);
INSERT INTO imagen (ruta_imagen, moto_id) VALUES ('imgs_motos/galeria/P2011213.JPG', NULL);
INSERT INTO imagen (ruta_imagen, moto_id) VALUES ('imgs_motos/galeria/P2011214.JPG', NULL);
INSERT INTO imagen (ruta_imagen, moto_id) VALUES ('imgs_motos/galeria/P2011215.JPG', NULL);
INSERT INTO imagen (ruta_imagen, moto_id) VALUES ('imgs_motos/galeria/P2011216.JPG', NULL);
INSERT INTO imagen (ruta_imagen, moto_id) VALUES ('imgs_motos/galeria/P2011217.JPG', NULL);
INSERT INTO imagen (ruta_imagen, moto_id) VALUES ('imgs_motos/galeria/P2011218.JPG', NULL);
INSERT INTO imagen (ruta_imagen, moto_id) VALUES ('imgs_motos/galeria/P2011219.JPG', NULL);
INSERT INTO imagen (ruta_imagen, moto_id) VALUES ('imgs_motos/galeria/P2011220.JPG', NULL);
INSERT INTO imagen (ruta_imagen, moto_id) VALUES ('imgs_motos/galeria/P2011221.JPG', NULL);
INSERT INTO imagen (ruta_imagen, moto_id) VALUES ('imgs_motos/galeria/P2011222.JPG', NULL);
INSERT INTO imagen (ruta_imagen, moto_id) VALUES ('imgs_motos/galeria/P2011223.JPG', NULL);
INSERT INTO imagen (ruta_imagen, moto_id) VALUES ('imgs_motos/galeria/P2011224.JPG', NULL);
INSERT INTO imagen (ruta_imagen, moto_id) VALUES ('imgs_motos/galeria/P2011225.JPG', NULL);
INSERT INTO imagen (ruta_imagen, moto_id) VALUES ('imgs_motos/galeria/P2011226.JPG', NULL);
INSERT INTO imagen (ruta_imagen, moto_id) VALUES ('imgs_motos/galeria/P2011227.JPG', NULL);
INSERT INTO imagen (ruta_imagen, moto_id) VALUES ('imgs_motos/galeria/P2011228.JPG', NULL);
INSERT INTO imagen (ruta_imagen, moto_id) VALUES ('imgs_motos/galeria/P2011229.JPG', NULL);
INSERT INTO imagen (ruta_imagen, moto_id) VALUES ('imgs_motos/galeria/P2011230.JPG', NULL);
INSERT INTO imagen (ruta_imagen, moto_id) VALUES ('imgs_motos/galeria/P2011231.JPG', NULL);
INSERT INTO imagen (ruta_imagen, moto_id) VALUES ('imgs_motos/galeria/P2011232.JPG', NULL);
INSERT INTO imagen (ruta_imagen, moto_id) VALUES ('imgs_motos/galeria/P2011233.JPG', NULL);
INSERT INTO imagen (ruta_imagen, moto_id) VALUES ('imgs_motos/galeria/P2011234.JPG', NULL);
INSERT INTO imagen (ruta_imagen, moto_id) VALUES ('imgs_motos/galeria/P2011235.JPG', NULL);
INSERT INTO imagen (ruta_imagen, moto_id) VALUES ('imgs_motos/galeria/P2011236.JPG', NULL);
INSERT INTO imagen (ruta_imagen, moto_id) VALUES ('imgs_motos/galeria/P2011237.JPG', NULL);
INSERT INTO imagen (ruta_imagen, moto_id) VALUES ('imgs_motos/galeria/P2011238.JPG', NULL);

-- Inserts para la carpeta: gimson_elite_2 (Moto: Gimson - Elite 2)
INSERT INTO imagen (ruta_imagen, moto_id) VALUES ('imgs_motos/gimson_elite_2/1.JPG', (SELECT m.id_moto FROM moto m INNER JOIN marca ma ON m.marca_id = ma.id_marca WHERE m.modelo = 'Elite 2' AND ma.nombre = 'Gimson'));
INSERT INTO imagen (ruta_imagen, moto_id) VALUES ('imgs_motos/gimson_elite_2/2.JPG', (SELECT m.id_moto FROM moto m INNER JOIN marca ma ON m.marca_id = ma.id_marca WHERE m.modelo = 'Elite 2' AND ma.nombre = 'Gimson'));
INSERT INTO imagen (ruta_imagen, moto_id) VALUES ('imgs_motos/gimson_elite_2/3.JPG', (SELECT m.id_moto FROM moto m INNER JOIN marca ma ON m.marca_id = ma.id_marca WHERE m.modelo = 'Elite 2' AND ma.nombre = 'Gimson'));

-- Inserts para la carpeta: guzzi_dingo (Moto: Moto Guzzi - Dingo)
INSERT INTO imagen (ruta_imagen, moto_id) VALUES ('imgs_motos/moto_guzzi_dingo/1.JPG', (SELECT m.id_moto FROM moto m INNER JOIN marca ma ON m.marca_id = ma.id_marca WHERE m.modelo = 'Dingo' AND ma.nombre = 'Moto Guzzi'));
INSERT INTO imagen (ruta_imagen, moto_id) VALUES ('imgs_motos/moto_guzzi_dingo/2.JPG', (SELECT m.id_moto FROM moto m INNER JOIN marca ma ON m.marca_id = ma.id_marca WHERE m.modelo = 'Dingo' AND ma.nombre = 'Moto Guzzi'));
-- INSERT INTO imagen (ruta_imagen, moto_id) VALUES ('imgs_motos/moto_guzzi_dingo/3.JPG', (SELECT m.id_moto FROM moto m INNER JOIN marca ma ON m.marca_id = ma.id_marca WHERE m.modelo = 'Dingo' AND ma.nombre = 'Moto Guzzi'));
-- INSERT INTO imagen (ruta_imagen, moto_id) VALUES ('imgs_motos/moto_guzzi_dingo/4.JPG', (SELECT m.id_moto FROM moto m INNER JOIN marca ma ON m.marca_id = ma.id_marca WHERE m.modelo = 'Dingo' AND ma.nombre = 'Moto Guzzi'));

-- Inserts para la carpeta: guzzi_hispania_dingo (Moto: Moto Guzzi - Hispania dingo)
INSERT INTO imagen (ruta_imagen, moto_id) VALUES ('imgs_motos/guzzi_hispania_dingo/1.JPG', (SELECT m.id_moto FROM moto m INNER JOIN marca ma ON m.marca_id = ma.id_marca WHERE m.modelo = 'Hispania dingo' AND ma.nombre = 'Moto Guzzi'));
INSERT INTO imagen (ruta_imagen, moto_id) VALUES ('imgs_motos/guzzi_hispania_dingo/2.JPG', (SELECT m.id_moto FROM moto m INNER JOIN marca ma ON m.marca_id = ma.id_marca WHERE m.modelo = 'Hispania dingo' AND ma.nombre = 'Moto Guzzi'));
INSERT INTO imagen (ruta_imagen, moto_id) VALUES ('imgs_motos/guzzi_hispania_dingo/3.JPG', (SELECT m.id_moto FROM moto m INNER JOIN marca ma ON m.marca_id = ma.id_marca WHERE m.modelo = 'Hispania dingo' AND ma.nombre = 'Moto Guzzi'));

-- Inserts para la carpeta: makal_dakar_junior (Moto: Macal - Dakar junior)
INSERT INTO imagen (ruta_imagen, moto_id) VALUES ('imgs_motos/macal_dakar_junior/1.JPG', (SELECT m.id_moto FROM moto m INNER JOIN marca ma ON m.marca_id = ma.id_marca WHERE m.modelo = 'Dakar junior' AND ma.nombre = 'Macal'));
INSERT INTO imagen (ruta_imagen, moto_id) VALUES ('imgs_motos/macal_dakar_junior/2.JPG', (SELECT m.id_moto FROM moto m INNER JOIN marca ma ON m.marca_id = ma.id_marca WHERE m.modelo = 'Dakar junior' AND ma.nombre = 'Macal'));
INSERT INTO imagen (ruta_imagen, moto_id) VALUES ('imgs_motos/macal_dakar_junior/3.JPG', (SELECT m.id_moto FROM moto m INNER JOIN marca ma ON m.marca_id = ma.id_marca WHERE m.modelo = 'Dakar junior' AND ma.nombre = 'Macal'));

-- Inserts para la carpeta: mobylette_cady_e14 (Moto: Mobylette - Cady E14)
INSERT INTO imagen (ruta_imagen, moto_id) VALUES ('imgs_motos/mobylette_cady_e14/1.JPG', (SELECT m.id_moto FROM moto m INNER JOIN marca ma ON m.marca_id = ma.id_marca WHERE m.modelo = 'Cady E14' AND ma.nombre = 'Mobylette'));
INSERT INTO imagen (ruta_imagen, moto_id) VALUES ('imgs_motos/mobylette_cady_e14/2.JPG', (SELECT m.id_moto FROM moto m INNER JOIN marca ma ON m.marca_id = ma.id_marca WHERE m.modelo = 'Cady E14' AND ma.nombre = 'Mobylette'));

-- Inserts para la carpeta: mobylette_mobycross (Moto: Mobylette - Moby-Cross)
INSERT INTO imagen (ruta_imagen, moto_id) VALUES ('imgs_motos/mobylette_mobycross/1.JPG', (SELECT m.id_moto FROM moto m INNER JOIN marca ma ON m.marca_id = ma.id_marca WHERE m.modelo = 'Moby-Cross' AND ma.nombre = 'Mobylette'));
INSERT INTO imagen (ruta_imagen, moto_id) VALUES ('imgs_motos/mobylette_mobycross/2.JPG', (SELECT m.id_moto FROM moto m INNER JOIN marca ma ON m.marca_id = ma.id_marca WHERE m.modelo = 'Moby-Cross' AND ma.nombre = 'Mobylette'));

-- Inserts para la carpeta: peugeot_104 (Moto: Peugeot - 104)
INSERT INTO imagen (ruta_imagen, moto_id) VALUES ('imgs_motos/peugeot_104/1.JPG', (SELECT m.id_moto FROM moto m INNER JOIN marca ma ON m.marca_id = ma.id_marca WHERE m.modelo = '104' AND ma.nombre = 'Peugeot'));
INSERT INTO imagen (ruta_imagen, moto_id) VALUES ('imgs_motos/peugeot_104/2.JPG', (SELECT m.id_moto FROM moto m INNER JOIN marca ma ON m.marca_id = ma.id_marca WHERE m.modelo = '104' AND ma.nombre = 'Peugeot'));

-- Inserts para la carpeta: piaggio_ape_50 (Moto: Piaggio - Ape 50)
INSERT INTO imagen (ruta_imagen, moto_id) VALUES ('imgs_motos/piaggio_ape_50/1.JPG', (SELECT m.id_moto FROM moto m INNER JOIN marca ma ON m.marca_id = ma.id_marca WHERE m.modelo = 'Ape 50' AND ma.nombre = 'Piaggio'));
INSERT INTO imagen (ruta_imagen, moto_id) VALUES ('imgs_motos/piaggio_ape_50/2.JPG', (SELECT m.id_moto FROM moto m INNER JOIN marca ma ON m.marca_id = ma.id_marca WHERE m.modelo = 'Ape 50' AND ma.nombre = 'Piaggio'));

-- Inserts para la carpeta: piaggio_vespino_gl (Moto: Piaggio - Vespino GL)
INSERT INTO imagen (ruta_imagen, moto_id) VALUES ('imgs_motos/piaggio_vespino_gl/1.JPG', (SELECT m.id_moto FROM moto m INNER JOIN marca ma ON m.marca_id = ma.id_marca WHERE m.modelo = 'Vespino GL' AND ma.nombre = 'Piaggio'));
INSERT INTO imagen (ruta_imagen, moto_id) VALUES ('imgs_motos/piaggio_vespino_gl/2.JPG', (SELECT m.id_moto FROM moto m INNER JOIN marca ma ON m.marca_id = ma.id_marca WHERE m.modelo = 'Vespino GL' AND ma.nombre = 'Piaggio'));

-- Inserts para la carpeta: puch_condor (Moto: Puch Avello - Condor)
INSERT INTO imagen (ruta_imagen, moto_id) VALUES ('imgs_motos/puch_condor/1.JPG', (SELECT m.id_moto FROM moto m INNER JOIN marca ma ON m.marca_id = ma.id_marca WHERE m.modelo = 'Condor' AND ma.nombre = 'Puch Avello'));
INSERT INTO imagen (ruta_imagen, moto_id) VALUES ('imgs_motos/puch_condor/2.JPG', (SELECT m.id_moto FROM moto m INNER JOIN marca ma ON m.marca_id = ma.id_marca WHERE m.modelo = 'Condor' AND ma.nombre = 'Puch Avello'));
INSERT INTO imagen (ruta_imagen, moto_id) VALUES ('imgs_motos/puch_condor/3.JPG', (SELECT m.id_moto FROM moto m INNER JOIN marca ma ON m.marca_id = ma.id_marca WHERE m.modelo = 'Condor' AND ma.nombre = 'Puch Avello'));


-- insert admin
INSERT INTO usuarios(usuario, email, contraseña, administrador) VALUES ("administrador", "administrador@ejemplo.com", SHA1("abc123."), true);