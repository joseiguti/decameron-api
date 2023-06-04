CREATE TABLE hoteles (
                         id SERIAL PRIMARY KEY,
                         nombre VARCHAR(100) NOT NULL,
                         direccion VARCHAR(100) NOT NULL,
                         ciudad VARCHAR(100) NOT NULL,
                         nit VARCHAR(20) NOT NULL,
                         num_habitaciones INTEGER NOT NULL,
                         CONSTRAINT unique_nombre UNIQUE (nombre)
);

CREATE TABLE tipos_habitacion (
                                  id SERIAL PRIMARY KEY,
                                  nombre VARCHAR(20) NOT NULL
);

CREATE TABLE acomodaciones (
                               id SERIAL PRIMARY KEY,
                               nombre VARCHAR(20) NOT NULL
);

CREATE TABLE habitaciones (
                              id SERIAL PRIMARY KEY,
                              hotel_id INTEGER REFERENCES hoteles(id),
                              tipo_habitacion_id INTEGER REFERENCES tipos_habitacion(id),
                              acomodacion_id INTEGER REFERENCES acomodaciones(id),
                              cantidad_habitaciones INTEGER
);

CREATE TABLE tipos_habitacion_acomodaciones (
                                                id SERIAL PRIMARY KEY,
                                                tipo_habitacion_id INTEGER REFERENCES tipos_habitacion(id),
                                                acomodacion_id INTEGER REFERENCES acomodaciones(id)
);

INSERT INTO tipos_habitacion (nombre) VALUES
                                          ('Estándar'),
                                          ('Junior'),
                                          ('Suite');

INSERT INTO acomodaciones (nombre) VALUES
                                       ('Sencilla'),
                                       ('Doble'),
                                       ('Triple'),
                                       ('Cuádruple');

INSERT INTO tipos_habitacion_acomodaciones (tipo_habitacion_id, acomodacion_id)
VALUES
    (1, 1), -- Estándar - Sencilla
    (1, 2), -- Estándar - Doble
    (2, 3), -- Junior - Triple
    (2, 4), -- Junior - Cuádruple
    (3, 1), -- Suite - Sencilla
    (3, 2), -- Suite - Doble
    (3, 3); -- Suite - Triple
