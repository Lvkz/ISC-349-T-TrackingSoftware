CREATE TYPE personas AS (
	nombres character varying(20),
	apellidos character varying(20),
	fecha_nacimiento date,
	sexo character(1)
);

ALTER TYPE public.personas OWNER TO lukas;

SET default_tablespace = '';

SET default_with_oids = true;

CREATE TABLE mediostransporte (
    ubicacion point,
    velocidad_media numeric,
    capacidad_peso numeric,
    hora_salida date,
    hora_llegada date,
    tiempo_estimado_viaje date
);

CREATE TABLE aviones (
    modelo character varying(20)
)
INHERITS (mediostransporte);


CREATE TABLE barcos (
    modelo character varying(20)
)
INHERITS (mediostransporte);

CREATE TABLE camiones (
    modelo character varying(20)
)
INHERITS (mediostransporte);

CREATE TABLE clientes (
    documentoidentidad character varying(20),
    persona personas NOT NULL
);

CREATE TABLE contactos (
    telefono character varying(20),
    ciudad oid,
    cliente oid
);

CREATE TABLE descripcionrutas (
    ruta oid,
    orden character varying(5),
    posicion point,
    avion oid,
    barco oid,
    camion oid,
    medio_trasnporte_actual numeric(1,0)
);

CREATE TABLE envios (
    ruta oid,
    fecha_salida timestamp without time zone,
    fecha_estimada_llegada timestamp without time zone
);

CREATE TABLE paises (
    nombre character varying(20),
    nombre_ciudad character varying(20)
);

CREATE TABLE retrasos (
    envio oid,
    posicion point,
    hora_inicio timestamp without time zone,
    hora_fin timestamp without time zone,
    duracion_retraso timestamp without time zone
);

CREATE TABLE rutas (
    ciudad_origen character varying(20),
    ciudad_destino character varying(20),
    hora_salida time without time zone,
    hora_estimada_llegada time without time zone
);

INSERT INTO clientes VALUES ('031-9999991-1', '(Penelope,Dickson,2014-04-02,F)');
INSERT INTO clientes VALUES ('031-0495958-4', '(Lukas,Gomez,2014-04-14,M)');
INSERT INTO clientes VALUES ('031-023424234-2', '("Jose ",Lora,2014-04-22,M)');
INSERT INTO clientes VALUES ('031-1110290-2', '("Manuel ",Filpo,2014-04-15,M)');
INSERT INTO clientes VALUES ('12323-12312312-31233', '(Carlos,Nuñez,2014-04-29,M)');

INSERT INTO paises VALUES ('Republica Dominicana', 'Santo Domingo');
INSERT INTO paises VALUES ('Republica Dominicana', 'Santiago');
INSERT INTO paises VALUES ('Republica Dominicana', 'Puerto Plata');
INSERT INTO paises VALUES ('Republica Dominicana', 'La Romana');
INSERT INTO paises VALUES ('Estados Unidos', 'New York');
INSERT INTO paises VALUES ('Estados Unidos', 'Miami');
INSERT INTO paises VALUES ('Estados Unidos', 'Los Angeles');

ALTER TABLE ONLY aviones
    ADD CONSTRAINT aviones_pkey PRIMARY KEY (oid);

ALTER TABLE ONLY barcos
    ADD CONSTRAINT barcos_pkey PRIMARY KEY (oid);


ALTER TABLE ONLY camiones
    ADD CONSTRAINT camiones_pkey PRIMARY KEY (oid);


ALTER TABLE ONLY contactos
    ADD CONSTRAINT ciudad_pais UNIQUE (ciudad, cliente);

ALTER TABLE ONLY clientes
    ADD CONSTRAINT clientes_pkey PRIMARY KEY (oid);

ALTER TABLE ONLY descripcionrutas
    ADD CONSTRAINT descripcionrutas_pkey PRIMARY KEY (oid);

ALTER TABLE ONLY envios
    ADD CONSTRAINT envios_pkey PRIMARY KEY (oid);

ALTER TABLE ONLY paises
    ADD CONSTRAINT id_paisciudad UNIQUE (nombre, nombre_ciudad);

ALTER TABLE ONLY clientes
    ADD CONSTRAINT id_persona UNIQUE (documentoidentidad);

ALTER TABLE ONLY mediostransporte
    ADD CONSTRAINT mediostransporte_pkey PRIMARY KEY (oid);

ALTER TABLE ONLY paises
    ADD CONSTRAINT paises_pkey PRIMARY KEY (oid);

ALTER TABLE ONLY retrasos
    ADD CONSTRAINT retrasos_pkey PRIMARY KEY (oid);

ALTER TABLE ONLY rutas
    ADD CONSTRAINT rutas_pkey PRIMARY KEY (oid);

ALTER TABLE ONLY contactos
    ADD CONSTRAINT contactos_ciudad_fkey FOREIGN KEY (ciudad) REFERENCES paises(oid);

ALTER TABLE ONLY contactos
    ADD CONSTRAINT contactos_cliente_fkey FOREIGN KEY (cliente) REFERENCES clientes(oid);

ALTER TABLE ONLY descripcionrutas
    ADD CONSTRAINT descripcionrutas_avion_fkey FOREIGN KEY (avion) REFERENCES aviones(oid);

ALTER TABLE ONLY descripcionrutas
    ADD CONSTRAINT descripcionrutas_barco_fkey FOREIGN KEY (barco) REFERENCES barcos(oid);

ALTER TABLE ONLY descripcionrutas
    ADD CONSTRAINT descripcionrutas_camion_fkey FOREIGN KEY (camion) REFERENCES camiones(oid);

ALTER TABLE ONLY descripcionrutas
    ADD CONSTRAINT descripcionrutas_ruta_fkey FOREIGN KEY (ruta) REFERENCES rutas(oid);

ALTER TABLE ONLY envios
    ADD CONSTRAINT envios_ruta_fkey FOREIGN KEY (ruta) REFERENCES rutas(oid);


ALTER TABLE ONLY retrasos
    ADD CONSTRAINT retrasos_envio_fkey FOREIGN KEY (envio) REFERENCES envios(oid);

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM lukas;
GRANT ALL ON SCHEMA public TO lukas;
GRANT ALL ON SCHEMA public TO PUBLIC;


