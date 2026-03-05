INSERT INTO moto(modelo, año, color, tipo, marca_id) VALUES 
("Califfone", 1972, "Naranja", "Ciclomotor" ,(SELECT id_marca FROM marca WHERE nombre = 'Atala')),
("Diablo", 1979, "Rojo", "Ciclomotor" ,(SELECT id_marca FROM marca WHERE nombre = 'Derbi')),
("XF-17", 1975, "Cobre", "Ciclomotor" ,(SELECT id_marca FROM marca WHERE nombre = 'Famel')),
("Elite 2", 1970, "Blanco, rojo y verde", "Ciclomotor" ,(SELECT id_marca FROM marca WHERE nombre = 'Gimson')),
("Dingo", 1965, "Rojo", "Ciclomotor" ,(SELECT id_marca FROM marca WHERE nombre = 'Moto Guzzi')),
("Hispania dingo", 1965, "Rojo", "Ciclomotor" ,(SELECT id_marca FROM marca WHERE nombre = 'Moto Guzzi')),
("Dakar junior", 1988, "Amarillo y negro", "Ciclomotor" ,(SELECT id_marca FROM marca WHERE nombre = 'Macal')),
("Cady E14", 1980, "Negro", "Ciclomotor" ,(SELECT id_marca FROM marca WHERE nombre = 'Mobylette')),
("Moby-Cross", 1990, "Naranja", "Ciclomotor" ,(SELECT id_marca FROM marca WHERE nombre = 'Mobylette')),
("104", 1970, "Rojo", "Ciclomotor" ,(SELECT id_marca FROM marca WHERE nombre = 'Peugeot')),
("Ape 50", 1948, "Blanco", "Ciclomotor" ,(SELECT id_marca FROM marca WHERE nombre = 'Piaggio')),
("Condor", 1980, "Amarillo", "Ciclomotor" ,(SELECT id_marca FROM marca WHERE nombre = 'Puch Avello')),
("Vespino GL", 1973, "Rojo", "Ciclomotor" ,(SELECT id_marca FROM marca WHERE nombre = 'Piaggio'));

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