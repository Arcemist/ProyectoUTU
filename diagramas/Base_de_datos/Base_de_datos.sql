PRAGMA FOREIGN_KEYS=ON;

CREATE TABLE Sucursales (
	Nombre TEXT PRIMARY KEY NOT NULL
);

CREATE TABLE Administradores (
	Cedula INTEGER PRIMARY KEY NOT NULL,
	Nombre TEXT NOT NULL
);

CREATE TABLE Guardias ( /* No olvidarse que hay sucursales sin guardias */
	Cedula INTEGER PRIMARY KEY NOT NULL,
	Nombre TEXT NOT NULL
);

CREATE TABLE Trabaja_en (
	Nombre_sucursal TEXT NOT NULL,
	Cedula_guardia INTEGER NOT NULL,

	FOREIGN KEY(Nombre_sucursal) REFERENCES Sucursales(Nombre),
	FOREIGN KEY(Cedula_guardia) REFERENCES Guardias(Cedula)
);

CREATE TABLE Empresas_terciarizadas (
	Rut INTEGER PRIMARY KEY NOT NULL,
	Nombre TEXT NOT NULL
);

CREATE TABLE Documentos_empresa (
	ID INTEGER PRIMARY KEY,
	Pertenece_a INTEGER NOT NULL,
	Archivo BLOB,

	FOREIGN KEY (Pertenece_a) REFERENCES Empresas_terciarizadas(Rut) ON UPDATE CASCADE
);

CREATE TABLE Trabajadores_terciarizados (
	Cedula INTEGER PRIMARY KEY NOT NULL,
	Nombre TEXT NOT NULL,
	Trabaja_en INTEGER NOT NULL,

	FOREIGN KEY (Trabaja_en) REFERENCES Empresas_terciarizadas(Rut) ON UPDATE CASCADE
);

CREATE TABLE Documentos_trabajador ( /* Esto ta hecho como que los documentos sean solo de 1 trabajador terciarizado a la vez */
	ID INTEGER PRIMARY KEY,
	Pertenece_a INTEGER NOT NULL,
	Archivo BLOB, /* No se si guardo el archivo directamente o un camino */

	FOREIGN KEY (Pertenece_a) REFERENCES Trabajadores_terciarizados(Cedula) ON UPDATE CASCADE
);

CREATE TABLE Arreglos (
	ID INTEGER PRIMARY KEY,
	Nombre TEXT NOT NULL,
	Descripcion TEXT NOT NULL,

	Fecha_creacion DATE NOT NULL,
	Fecha_realizado DATE, /* Si es nulo es que no se ah realizado todavia */

	Creado_por INTEGER NOT NULL,
	Sucursal TEXT NOT NULL,

	FOREIGN KEY (Creado_por) REFERENCES Administradores(Cedula) ON UPDATE CASCADE,
	FOREIGN KEY (Sucursal) REFERENCES Sucursales(Nombre) ON UPDATE CASCADE
);

CREATE TABLE Solicitudes_de_arreglo (
	ID INTEGER PRIMARY KEY,
	Creada_por INTEGER NOT NULL,
	Solicita_arreglar INTEGER NOT NULL,
	Aprobada_por INTEGER, /* Si es nulo no ha sido aprobada */

	FOREIGN KEY (Creada_por) REFERENCES Empresas_terciarizadas(Rut) ON UPDATE CASCADE,
	FOREIGN KEY (Solicita_arreglar) REFERENCES Arreglos(ID) ON UPDATE CASCADE,
	FOREIGN KEY (Aprobada_por) REFERENCES Administradores(Cedula) ON UPDATE CASCADE
);

INSERT INTO Sucursales ( Nombre )
	VALUES ( 'Cerro Largo' );
INSERT INTO Sucursales ( Nombre )
	VALUES ( 'Montevideo' );
INSERT INTO Sucursales ( Nombre )
	VALUES ( 'Rivera' );

INSERT INTO Administradores ( Cedula , Nombre )
	VALUES ( 11223344 , 'Juan' );
INSERT INTO Administradores ( Cedula , Nombre )
	VALUES ( 22334455 , 'Fernando' );
INSERT INTO Administradores ( Cedula , Nombre )
	VALUES ( 33445566 , 'Juana' );

INSERT INTO Guardias ( Cedula , Nombre )
	VALUES ( 56255419 , 'Daniel' );
INSERT INTO Guardias ( Cedula , Nombre )
	VALUES ( 44339922 , 'Manuel' );
INSERT INTO Guardias ( Cedula , Nombre )
	VALUES ( 22449911 , 'Lucas' );

INSERT INTO Trabaja_en ( Cedula_guardia , Nombre_sucursal )
	VALUES ( 56255419 , 'Cerro Largo' );
INSERT INTO Trabaja_en ( Cedula_guardia , Nombre_sucursal )
	VALUES ( 22449911 , 'Cerro Largo' );
INSERT INTO Trabaja_en ( Cedula_guardia , Nombre_sucursal )
	VALUES ( 44339922 , 'Montevideo' );

INSERT INTO Empresas_terciarizadas ( Rut , Nombre )
	VALUES ( 1122334455667 , 'Arregladores de tolvas' );
INSERT INTO Documentos_empresa ( Pertenece_a , Archivo )
	VALUES ( 1122334455667 , 'Documento BPS' );
INSERT INTO Documentos_empresa ( Pertenece_a , Archivo )
	VALUES ( 1122334455667 , 'Documento del Banco de Seguros del Estado' );

INSERT INTO Empresas_terciarizadas ( Rut , Nombre )
	VALUES ( 2233445566778 , 'Tolvas y menos' );
INSERT INTO Documentos_empresa ( Pertenece_a , Archivo )
	VALUES ( 2233445566778 , 'Documento BPS' );
INSERT INTO Documentos_empresa ( Pertenece_a , Archivo )
	VALUES ( 2233445566778 , 'Documento del Banco de Seguros del Estado' );

INSERT INTO Empresas_terciarizadas ( Rut , Nombre )
	VALUES ( 3344556677889 , 'Los Pollos Hermanos' );
INSERT INTO Documentos_empresa ( Pertenece_a , Archivo )
	VALUES ( 3344556677889 , 'Documento BPS' );
INSERT INTO Documentos_empresa ( Pertenece_a , Archivo )
	VALUES ( 3344556677889 , 'Documento del Banco de Seguros del Estado' );

INSERT INTO Trabajadores_terciarizados ( Cedula , Nombre , Trabaja_en )
	VALUES ( 9988776 , 'Lario' , 1122334455667 );
INSERT INTO Documentos_trabajador ( Pertenece_a , Archivo )
	VALUES ( 9988776 , 'Imagen cedula' );
INSERT INTO Documentos_trabajador ( Pertenece_a , Archivo )
	VALUES ( 9988776 , 'Carne de salud' );

INSERT INTO Trabajadores_terciarizados ( Cedula , Nombre , Trabaja_en )
	VALUES ( 8877665 , 'Muigi' , 1122334455667 );
INSERT INTO Documentos_trabajador ( Pertenece_a , Archivo )
	VALUES ( 8877665 , 'Cedula' );
INSERT INTO Documentos_trabajador ( Pertenece_a , Archivo )
	VALUES ( 8877665 , 'Carne de salud' );

INSERT INTO Trabajadores_terciarizados ( Cedula , Nombre , Trabaja_en )
	VALUES ( 7766554 , 'Gus Fring' , 3344556677889 );
INSERT INTO Documentos_trabajador ( Pertenece_a , Archivo )
	VALUES ( 7766554 , 'Cedula' );
INSERT INTO Documentos_trabajador ( Pertenece_a , Archivo )
	VALUES ( 7766554 , 'Carne de salud' );

INSERT INTO Arreglos ( Creado_por , Sucursal , Nombre, Descripcion , Fecha_creacion )
	VALUES ( 11223344 , 'Cerro Largo' , 'Reparar las tolvas' , 'Ta caro el hierro' , DATE('now') );
INSERT INTO Arreglos ( Creado_por , Sucursal , Nombre, Descripcion, Fecha_creacion )
	VALUES ( 33445566 , 'Rivera' , 'Redirrecionar unas tolvas' , 'Hay pereza' , DATE('now') );
INSERT INTO Arreglos ( Creado_por , Sucursal , Nombre, Descripcion, Fecha_creacion )
	VALUES ( 11223344 , 'Cerro Largo' , 'Saldar Deudas' , 'Cuando la tarjeta no da...' , DATE('now') );

INSERT INTO Solicitudes_de_arreglo ( Creada_por , Solicita_arreglar )
	VALUES ( 1122334455667 , 1 );
INSERT INTO Solicitudes_de_arreglo ( Creada_por , Solicita_arreglar )
	VALUES ( 1122334455667  , 2 );
INSERT INTO Solicitudes_de_arreglo ( Creada_por , Solicita_arreglar )
	VALUES ( 3344556677889 , 3 );

/* Empezar el seedeo del historial
INSERT INTO Historial_arreglos (
	attribute(s)
) VALUES ( values )
*/

.shell echo ""
.mode box

.shell echo "Sucursales:"
SELECT *
	FROM Sucursales;
.shell echo ""

.shell echo "Administradores:"
SELECT *
	FROM Administradores;
.shell echo ""

.shell echo "Guardias:"
SELECT *
	FROM Guardias;
.shell echo ""

.shell echo "Empresas Terciarizadas:"
SELECT *
	FROM Empresas_terciarizadas;
.shell echo ""

.shell echo "Documentos de las empresas:"
SELECT *
	FROM Documentos_empresa;
.shell echo ""

.shell echo "Trabajadores Terciarizados:"
SELECT *
	FROM Trabajadores_terciarizados;
.shell echo ""

.shell echo "Documentos de los trabajadores:"
SELECT *
	FROM Documentos_trabajador;
.shell echo ""

.shell echo "Arreglos:"
SELECT *
	FROM Arreglos
	WHERE Arreglos.Fecha_realizado IS NULL;
.shell echo ""

.shell echo "Solicitudes de arreglo:"
SELECT *
	FROM Solicitudes_de_arreglo;
.shell echo ""


.shell echo "\n Comparaciones: \n"

.shell echo "Arreglos que creo 'Juan el admin':"
SELECT *
	FROM Arreglos
	WHERE Creado_por = 11223344 ;
.shell echo ""

.shell echo "Arreglos que 'Arregladores de tolvas' esta pidiendo realizar:"
SELECT Arreglos.*
	FROM Solicitudes_de_arreglo
	INNER JOIN Arreglos ON Solicitudes_de_arreglo.Solicita_arreglar = Arreglos.ID
	WHERE Solicitudes_de_arreglo.Creada_por = 1122334455667 ;
.shell echo ""

/* Lo mismo que arriba xd
.shell echo "Arreglos en los que participa 'Los Pollos Hermanos' con los trabajadores:"
SELECT Arreglos.Nombre, Empresas_terciarizadas.Nombre, Trabajadores_terciarizados.Nombre
	FROM Arreglos
	INNER JOIN Empresas_terciarizadas ON Arreglos.Creado_por=Empresas_terciarizadas.Nombre
	INNER JOIN Trabajadores_terciarizados ON Arreglos.Creado_por=Trabajadores_terciarizados.Trabaja_en
	WHERE Arreglos.Creado_por='Los Pollos Hermanos';
*/

.shell echo "Guardias en 'Cerro Largo' o 'Rivera':"
SELECT Guardias.Nombre , Guardias.Cedula , Trabaja_en.Nombre_sucursal
	FROM Guardias
	INNER JOIN Trabaja_en ON Guardias.Cedula = Trabaja_en.Cedula_guardia
	WHERE Trabaja_en.Nombre_sucursal = 'Cerro Largo' OR Trabaja_en.Nombre_sucursal = 'Rivera' ;
.shell echo ""
