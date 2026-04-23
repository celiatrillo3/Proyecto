USE museo_ciclomotor;

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
INSERT INTO imagen (ruta_imagen, moto_id) VALUES ('imgs_motos/guzzi_dingo/1.JPG', (SELECT m.id_moto FROM moto m INNER JOIN marca ma ON m.marca_id = ma.id_marca WHERE m.modelo = 'Dingo' AND ma.nombre = 'Moto Guzzi'));
INSERT INTO imagen (ruta_imagen, moto_id) VALUES ('imgs_motos/guzzi_dingo/2.JPG', (SELECT m.id_moto FROM moto m INNER JOIN marca ma ON m.marca_id = ma.id_marca WHERE m.modelo = 'Dingo' AND ma.nombre = 'Moto Guzzi'));
INSERT INTO imagen (ruta_imagen, moto_id) VALUES ('imgs_motos/guzzi_dingo/3.JPG', (SELECT m.id_moto FROM moto m INNER JOIN marca ma ON m.marca_id = ma.id_marca WHERE m.modelo = 'Dingo' AND ma.nombre = 'Moto Guzzi'));
INSERT INTO imagen (ruta_imagen, moto_id) VALUES ('imgs_motos/guzzi_dingo/4.JPG', (SELECT m.id_moto FROM moto m INNER JOIN marca ma ON m.marca_id = ma.id_marca WHERE m.modelo = 'Dingo' AND ma.nombre = 'Moto Guzzi'));

-- Inserts para la carpeta: guzzi_hispania_dingo (Moto: Moto Guzzi - Hispania dingo)
INSERT INTO imagen (ruta_imagen, moto_id) VALUES ('imgs_motos/guzzi_hispania_dingo/1.JPG', (SELECT m.id_moto FROM moto m INNER JOIN marca ma ON m.marca_id = ma.id_marca WHERE m.modelo = 'Hispania dingo' AND ma.nombre = 'Moto Guzzi'));
INSERT INTO imagen (ruta_imagen, moto_id) VALUES ('imgs_motos/guzzi_hispania_dingo/2.JPG', (SELECT m.id_moto FROM moto m INNER JOIN marca ma ON m.marca_id = ma.id_marca WHERE m.modelo = 'Hispania dingo' AND ma.nombre = 'Moto Guzzi'));
INSERT INTO imagen (ruta_imagen, moto_id) VALUES ('imgs_motos/guzzi_hispania_dingo/3.JPG', (SELECT m.id_moto FROM moto m INNER JOIN marca ma ON m.marca_id = ma.id_marca WHERE m.modelo = 'Hispania dingo' AND ma.nombre = 'Moto Guzzi'));

-- Inserts para la carpeta: makal_dakar_junior (Moto: Macal - Dakar junior)
INSERT INTO imagen (ruta_imagen, moto_id) VALUES ('imgs_motos/makal_dakar_junior/1.JPG', (SELECT m.id_moto FROM moto m INNER JOIN marca ma ON m.marca_id = ma.id_marca WHERE m.modelo = 'Dakar junior' AND ma.nombre = 'Macal'));
INSERT INTO imagen (ruta_imagen, moto_id) VALUES ('imgs_motos/makal_dakar_junior/2.JPG', (SELECT m.id_moto FROM moto m INNER JOIN marca ma ON m.marca_id = ma.id_marca WHERE m.modelo = 'Dakar junior' AND ma.nombre = 'Macal'));
INSERT INTO imagen (ruta_imagen, moto_id) VALUES ('imgs_motos/makal_dakar_junior/3.JPG', (SELECT m.id_moto FROM moto m INNER JOIN marca ma ON m.marca_id = ma.id_marca WHERE m.modelo = 'Dakar junior' AND ma.nombre = 'Macal'));

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