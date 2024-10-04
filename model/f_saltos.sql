CREATE DATABASE f_saltos;
USE f_saltos;

-- Tabla Rol
CREATE TABLE Rol (
  Idrolusuario INT AUTO_INCREMENT PRIMARY KEY,
  Descripcionrol VARCHAR(40) NOT NULL,
  Estadorol VARCHAR(40) NOT NULL
);

INSERT INTO Rol VALUES (NULL, 'Cliente', 'Activo');
INSERT INTO Rol VALUES (NULL, 'Administrador', 'Activo');
INSERT INTO Rol VALUES (NULL, 'Repartidor', 'Activo');
INSERT INTO Rol VALUES (NULL, 'Armadora', 'Activo');
INSERT INTO Rol VALUES (NULL, 'Costurero', 'Activo');

select * from Rol;
-- Tabla Usuario
CREATE TABLE Usuario (
  Idusuario INT AUTO_INCREMENT PRIMARY KEY, 
  Documentousuario VARCHAR(30) NOT NULL,
  Nodocumento INT NOT NULL,
  Nombreusuario VARCHAR(40) NOT NULL,
  Apellidousuario VARCHAR(40) NOT NULL,
  Direccionusuario VARCHAR(50) NOT NULL,
  Telusuario VARCHAR(15) NOT NULL,
  Correousuario VARCHAR(50) NOT NULL,
  Claveusuario VARCHAR(30) NOT NULL,
  Estadousuario VARCHAR(30) NOT NULL,
  Idrolusuariofk INT,
  FOREIGN KEY (Idrolusuariofk) REFERENCES Rol(Idrolusuario)
);

INSERT INTO Usuario VALUES (NULL, 'TI', 1234, 'Juan', 'Sanchez', 'Cra 54 N2', '2345', 'juan@gmail.com', '1111', 'Activo', 1);
INSERT INTO Usuario VALUES (NULL, 'CC', 4321, 'Petro', 'Uribe', 'Cra 60 N4', '1234', 'petro@gmail.com', '2222', 'Inactivo', 2);
INSERT INTO Usuario VALUES (NULL, 'TI', 2233, 'Maxx', 'Similiano', 'Cra 61 N4', '3334', 'max@gmail.com', '3333', 'Activo', 3);
INSERT INTO Usuario VALUES (NULL, 'CC', 3344, 'Angela', 'Contreras', 'Cra 62 N4', '4434', 'angela@gmail.com', '4444', 'Inactivo', 4);
INSERT INTO Usuario VALUES (NULL, 'CC', 5555, 'Yomaira', 'Becerra', 'Cra 63 N4', '5534', 'yomis@gmail.com', '5555', 'Activo', 5);
INSERT INTO Usuario VALUES (NULL, 'CC', 5555, 'Yomaira', 'Becerra', 'Cra 63 N4', '5534', 'uribe@gmail.com', '6666', 'Activo', 2);


SELECT * FROM Usuario;
delete from Usuario where Idusuario = 8;

-- Tabla Producto
CREATE TABLE Producto (
  Idproducto INT AUTO_INCREMENT PRIMARY KEY,
  Descripproducto VARCHAR(50) NOT NULL,
  Precioproducto DOUBLE NOT NULL,
  Categoriaproducto VARCHAR(50) NOT NULL,
  Estadoproducto VARCHAR(30) NOT NULL
);

INSERT INTO Producto VALUES (NULL, 'Maleta totto', 50000, 'Morrales', 'En Stock');
INSERT INTO Producto VALUES (NULL, 'Bolso Dolce & Gabbana', 6000000, 'Bolso', 'Sin Stock');
INSERT INTO Producto VALUES (NULL, 'Tula Adidas', 5000, 'Tulas', 'Descontinuado');

SELECT * FROM Producto;

-- Tabla Pedido
CREATE TABLE Pedido (
  Idpedido INT AUTO_INCREMENT PRIMARY KEY,
  Fechapedido DATE NOT NULL,
  Horapedido TIME NOT NULL,
  Totalpedido DOUBLE NOT NULL,
  Estadopedido VARCHAR(30) NOT NULL,
  Pedidodomicilio VARCHAR(50) NOT NULL,
  Idusuariofk INT,
  FOREIGN KEY (Idusuariofk) REFERENCES Usuario(Idusuario)
);

INSERT INTO Pedido VALUES (NULL, '2022-08-18', '10:00:00', 10000, 'Pendiente', 'Tula Adidas', 1);
INSERT INTO Pedido VALUES (NULL, '2022-08-19', '11:00:00', 200000000, 'Procesando', 'Bolso Dolce & Gabbana', 2);
INSERT INTO Pedido VALUES (NULL, '2022-08-19', '11:00:00', 50000, 'Enviado', 'Maleta totto', 3);
INSERT INTO Pedido VALUES (NULL, '2022-08-19', '11:00:00', 200000000, 'Entregado', 'Bolso Dolce & Gabbana', 4);
INSERT INTO Pedido VALUES (NULL, '2022-08-19', '11:00:00', 100000, 'Devuelto', 'Maleta totto', 5);
INSERT INTO Pedido VALUES (NULL, '2022-08-18', '10:00:00', 10000, 'Cancelado', 'Tula Adidas', 1);

SELECT * FROM Pedido;

-- Tabla Domicilio
CREATE TABLE Domicilio (
  IdDomicilio INT AUTO_INCREMENT PRIMARY KEY,
  Horadomicilio TIME NOT NULL,
  Estadodomicilio VARCHAR(30) NOT NULL,
  Idpedidofk INT,
  Idusuariofk INT,
  FOREIGN KEY (Idusuariofk) REFERENCES Usuario(Idusuario),
  FOREIGN KEY (Idpedidofk) REFERENCES Pedido(Idpedido)
);

INSERT INTO Domicilio VALUES (NULL, '13:00:00', 'Pendiente', 1, 1);
INSERT INTO Domicilio VALUES (NULL, '14:00:00', 'En Proceso', 2, 2);
INSERT INTO Domicilio VALUES (NULL, '13:00:00', 'Cancelado', 3, 3);
INSERT INTO Domicilio VALUES (NULL, '14:00:00', 'Enviado', 4, 4);
INSERT INTO Domicilio VALUES (NULL, '13:00:00', 'Entregado', 5, 5);

SELECT * FROM Domicilio;

-- Tabla Detallepedido
CREATE TABLE Detallepedido (
  IdDetallepedido INT AUTO_INCREMENT PRIMARY KEY,
  Cantidadproducto INT NOT NULL,
  Precioproducto DOUBLE NOT NULL,
  Subtotalproducto DOUBLE NOT NULL,
  Idproductofk INT,
  Idpedidofk INT,
  FOREIGN KEY (Idproductofk) REFERENCES Producto(Idproducto),
  FOREIGN KEY (Idpedidofk) REFERENCES Pedido(Idpedido)
);

INSERT INTO Detallepedido VALUES (NULL, 12, 1000, 12000, 1, 1);
INSERT INTO Detallepedido VALUES (NULL, 13, 2000, 26000, 2, 2);
INSERT INTO Detallepedido VALUES (NULL, 13, 2000, 26000, 3, 3);
INSERT INTO Detallepedido VALUES (NULL, 13, 2000, 26000, 2, 4);

SELECT * FROM Detallepedido;

-- procedimientos almacenados 

-- Procedimiento para registrar un usuario
DELIMITER //
CREATE PROCEDURE RegisterUser(
    IN p_Documentousuario VARCHAR(30),
    IN p_Nodocumento INT,
    IN p_Nombreusuario VARCHAR(40),
    IN p_Apellidousuario VARCHAR(40),
    IN p_Direccionusuario VARCHAR(50),
    IN p_Telusuario VARCHAR(15),
    IN p_Correousuario VARCHAR(50),
    IN p_Claveusuario VARCHAR(30),
    IN p_Idrolusuariofk INT
)
BEGIN
    INSERT INTO Usuario (Documentousuario, Nodocumento, Nombreusuario, Apellidousuario, Direccionusuario, Telusuario, Correousuario, Claveusuario, Estadousuario, Idrolusuariofk)
    VALUES (p_Documentousuario, p_Nodocumento, p_Nombreusuario, p_Apellidousuario, p_Direccionusuario, p_Telusuario, p_Correousuario, p_Claveusuario, 'Activo', p_Idrolusuariofk);
END //
DELIMITER ;
select * from Usuario;
-- Procedimiento para autenticar un usuario
DELIMITER //
CREATE PROCEDURE LoginUser(
    IN p_Correousuario VARCHAR(50),
    IN p_Claveusuario VARCHAR(30)
)
BEGIN
    SELECT u.Idusuario, r.Descripcionrol
    FROM Usuario u
    INNER JOIN Rol r ON u.Idrolusuariofk = r.Idrolusuario
    WHERE u.Correousuario = p_Correousuario 
      AND u.Claveusuario = p_Claveusuario 
      AND u.Estadousuario = 'Activo';
END //
DELIMITER ;

-- Consulta multi tabla

SELECT 
    u.Nombreusuario,
    u.Apellidousuario,
    p.Fechapedido,
    p.Horapedido,
    p.Totalpedido,
    p.Estadopedido,
    d.Cantidadproducto,
    d.Subtotalproducto,
    pr.Descripproducto
FROM 
    Usuario u
    INNER JOIN Pedido p ON u.Idusuario = p.Idusuariofk
    INNER JOIN Detallepedido d ON p.Idpedido = d.Idpedidofk
    INNER JOIN Producto pr ON d.Idproductofk = pr.Idproducto
ORDER BY 
    u.Nombreusuario, p.Fechapedido;

-- vista

CREATE VIEW vista_detalle_pedidos AS
SELECT 
    u.Nombreusuario AS Nombre,
    u.Apellidousuario AS Apellido,
    p.Fechapedido AS Fecha_Pedido,
    pr.Descripproducto AS Producto,
    dp.Cantidadproducto AS Cantidad,
    dp.Subtotalproducto AS Subtotal,
    p.Totalpedido AS Total,
    p.Estadopedido AS Estado_Pedido
FROM 
    Usuario u
    INNER JOIN Pedido p ON u.Idusuario = p.Idusuariofk
    INNER JOIN Detallepedido dp ON p.Idpedido = dp.Idpedidofk
    INNER JOIN Producto pr ON dp.Idproductofk = pr.Idproducto
ORDER BY 
    p.Fechapedido DESC;

SELECT * FROM vista_detalle_pedidos;