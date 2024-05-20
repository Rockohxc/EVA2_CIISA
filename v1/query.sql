CREATE DATABASE ciisa_backend_v1;
CREATE USER 'ciisa_backend_v1'@'localhost' IDENTIFIED BY 'l4cl4v3-c11s4';
GRANT ALL PRIVILEGES ON ciisa_backend_v1 . * TO 'ciisa_backend_v1'@'localhost';
FLUSH PRIVILEGES;

USE ciisa_backend_v1;

CREATE TABLE mantenedor (
    id INT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL UNIQUE, -- COSTRAINT
    activo BOOLEAN NOT NULL DEFAULT FALSE
)

-- GET / ALL
SELECT id, nombre, activo FROM mantenedor;
-- GET / BY ID
SELECT id, nombre, activo FROM mantenedor WHERE id = 3;
-- POST
INSERT INTO mantenedor (id, nombre) VALUES (1, 'Ejemplo 1'),(2, 'Ejemplo 2'),(3, 'Ejemplo 3');
-- PATCH / ENABLE
UPDATE mantenedor SET activo = true WHERE id = 3;
-- PATCH / DISABLE
UPDATE mantenedor SET activo = false WHERE id = 3;
-- PUT
UPDATE mantenedor SET nombre = 'Example 3' WHERE id = 3;
-- DELETE
DELETE FROM mantenedor WHERE id = 3;

-- Evaluacion 1
-- mision y vision
-- titulo
-- ESP
-- ENG
-- descripcion
-- ESP
-- ENG
CREATE TABLE idiomas (
    id  INT PRIMARY KEY,
    corto VARCHAR(3) NOT NULL UNIQUE,
    nombre VARCHAR(10) NOT NULL UNIQUE,
    activo BOOLEAN DEFAULT FALSE
);
INSERT INTO idiomas (id, corto, nombre, activo) VALUES 
(1, 'esp', 'Español', true),
(2, 'eng', 'Inglés', true);


CREATE TABLE about_us (
    id  INT PRIMARY KEY,
    titulo VARCHAR(50) NOT NULL UNIQUE,
    activo BOOLEAN DEFAULT FALSE
);
INSERT INTO about_us (id, titulo, activo) VALUES
(1, 'mision', true),
(2, 'vision', true);

CREATE TABLE about_us_idioma (
    id  INT PRIMARY KEY,
    idioma_id INT NOT NULL,
    about_us_id INT NOT NULL,
    valor_titulo VARCHAR(50) NOT NULL,
    valor_descripcion TEXT NOT NULL,
    activo BOOLEAN DEFAULT FALSE,
    CONSTRAINT fk_au_u FOREIGN KEY (idioma_id) REFERENCES idiomas (id),
    CONSTRAINT fk_au_au FOREIGN KEY (about_us_id) REFERENCES about_us (id)
);
INSERT INTO about_us_idioma (id, idioma_id, about_us_id, valor_titulo, valor_descripcion, activo) VALUES 
(1, 1, 1, 'Misión', 'Nuestra misión es ofrecer soluciones digitales innovadoras y de alta calidad que impulsen el éxito de nuestros clientes, ayudándolos a alcanzar sus objetivos empresariales a través de la tecnología y la creatividad.', true),
(2, 1, 2, 'Visión', 'Nos visualizamos como líderes en el campo de la consultoría y desarrollo de software, reconocidos por nuestra excelencia en el servicio al cliente, nuestra capacidad para adaptarnos a las necesidades cambiantes del mercado y nuestra contribución al crecimiento y la transformación digital de las empresas.', true);


-- EVA 2
-- CREATE
INSERT INTO mantenimiento_info (id, nombre, texto, activo) VALUES (0, 'NOMBRE', 'TEXTO', true);
INSERT INTO categoria_servicio (id, nombre, imagen, texto, activo) VALUES (0, 'NOMBRE', 'URL IMAGEN', 'TEXTO', true);
INSERT INTO info_contacto (id, nombre, texto, texto_adicional, activo) VALUES (0, 'NOMBRE', 'TEXTO', 'TEXTO ADICIONAL', true);
INSERT INTO imagen (id, nombre, imagen, activo) VALUES (0, 'NOMBRE', 'URL IMAGEN', true);
INSERT INTO historia (id, tipo, texto, activo) VALUES (0, 'TIPO', 'TEXTO', true);
INSERT INTO historia_imagen (id, historia_id, imagen_id) VALUES (0, 0, 0);
INSERT INTO equipo (id, tipo, texto, activo) VALUES (0, 'TIPO', 'TEXTO', true);
INSERT INTO equipo_imagen (id, historia_id, imagen_id) VALUES (0, 0, 0);
INSERT INTO pregunta_frecuente (id, pregunta, respuesta, activo) VALUES (0, 'PREGUNTA', 'RESPUESTA', true);

-- READ
SELECT id, nombre, texto, activo FROM mantenimiento_info;
SELECT id, nombre, imagen, texto, activo FROM categoria_servicio;
SELECT id, nombre, texto, texto_adicional, activo FROM info_contacto;
SELECT id, nombre, imagen, activo FROM imagen;
SELECT id, tipo, texto, activo FROM historia;
SELECT id, historia_id, imagen_id FROM historia_imagen;
SELECT id, tipo, texto, activo FROM equipo;
SELECT id, historia_id, imagen_id FROM equipo_imagen;
SELECT id, pregunta, respuesta, activo FROM pregunta_frecuente;

-- UPDATE
UPDATE mantenimiento_info SET nombre = 'Nuevo nombre', texto = 'Nuevo texto' WHERE id = 0;
UPDATE categoria_servicio SET nombre = 'Nuevo nombre', imagen = 'Nueva url imagen', texto = 'Nuevo texto' WHERE id = 0;
UPDATE info_contacto SET nombre = 'Nuevo nombre', texto = 'Nuevo texto', texto_adicional = 'Nuevo texto adicional' WHERE id = 0;
UPDATE imagen SET nombre = 'Nuevo nombre', imagen = 'Nueva url imagen' WHERE id = 0;
UPDATE historia SET tipo = 'Nuevo tipo', texto = 'Nuevo texto' WHERE id = 0;
UPDATE historia_imagen SET historia_id = 'Nuevo id', imagen_id = 'Nuevo id' WHERE id = 0;
UPDATE equiop SET tipo = 'Nuevo tipo', texto = 'Nuevo texto' WHERE id = 0;
UPDATE equipo_imagen SET historia_id = 'Nuevo id', imagen_id = 'Nuevo id' WHERE id = 0;
UPDATE pregunta_frecuente SET pregunta = 'Nueva pregunta', respuesta = 'Nueva respuesta' WHERE id = 0;

-- DESACTIVATE
UPDATE mantenimiento_info SET activo = false WHERE id = 0;
UPDATE categoria_servicio SET activo = false WHERE id = 0;
UPDATE info_contacto SET activo = false WHERE id = 0;
UPDATE imagen SET activo = false WHERE id = 0;
UPDATE historia SET activo = false WHERE id = 0;
UPDATE equipo SET activo = false WHERE id = 0;
UPDATE pregunta_frecuente SET activo = false WHERE id = 0;


-- ACTIVATE
UPDATE mantenimiento_info SET activo = true WHERE id = 0;
UPDATE categoria_servicio SET activo = true WHERE id = 0;
UPDATE info_contacto SET activo = true WHERE id = 0;
UPDATE imagen SET activo = true WHERE id = 0;
UPDATE historia SET activo = true WHERE id = 0;
UPDATE equipo SET activo = true WHERE id = 0;
UPDATE pregunta_frecuente SET activo = true WHERE id = 0;

-- DELETE
DELETE FROM mantenimiento_info WHERE id = 0;
DELETE FROM categoria_servicio WHERE id = 0;
DELETE FROM info_contacto WHERE id = 0;
DELETE FROM imagen WHERE id = 0;
DELETE FROM historia WHERE id = 0;
DELETE FROM historia_imagen WHERE id = 0;
DELETE FROM equipo WHERE id = 0;
DELETE FROM equipo_imagen WHERE id = 0;
DELETE FROM pregunta_frecuente WHERE id = 0; 