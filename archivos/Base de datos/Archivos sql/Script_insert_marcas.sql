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
