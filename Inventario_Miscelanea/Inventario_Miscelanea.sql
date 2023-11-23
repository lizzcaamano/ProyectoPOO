CREATE DATABASE Inventario_Miscelanea;
USE Inventario_Miscelanea;

CREATE TABLE Proveedores(
	ID_Proveedor int AUTO_INCREMENT PRIMARY KEY,
	NombreProv varchar(50) not null,
    DireccionProv varchar(60) not null,
    Telefono int,
    Correo varchar(60)
);

CREATE TABLE Clientes(
	ID_Cliente int AUTO_INCREMENT PRIMARY KEY,
	NombreCli varchar(50) not null,
    DireccionCli varchar(60) not null,
    Telefono int
);

CREATE TABLE Categorias(
	ID_Categoria int AUTO_INCREMENT PRIMARY KEY,
    NombreCategoria varchar(30) NOT null,
    DescripcionCat varchar(30) NOT null
);

CREATE TABLE Roles(
	ID_Rol int AUTO_INCREMENT PRIMARY KEY,
    NombreRol varchar(30) NOT null,
    DescripcionRol varchar(30) NOT null
);

CREATE TABLE CuentasPorCobrar(
	ID_Cuenta int AUTO_INCREMENT PRIMARY KEY,
    Monto_Debido float NOT null,
    Fecha_Limite date,
    ID_ClienteFK int NOT null,
    FOREIGN KEY (ID_ClienteFK) REFERENCES Clientes (ID_Cliente)
);

CREATE TABLE Usuarios(
	ID_Usuario int AUTO_INCREMENT PRIMARY KEY,
    NombreUsuario varchar(30) NOT null,
    Contrasena varchar(16) NOT null,
    ID_RolFK int NOT null,
    FOREIGN KEY (ID_RolFK) REFERENCES Roles (ID_Rol)
);

CREATE TABLE Productos(
	ID_Producto int AUTO_INCREMENT PRIMARY KEY,
    NombreProd varchar(30) NOT null,
    CodigoProducto bigint NOT null,
    DescripcionProd varchar(60),
    PrecioUnitario float NOT null,
    PrecioCompra float NOT null,
    Cantidad_Disponible int NOT null,
    ID_CategoriaFK int NOT null,
    FOREIGN KEY (ID_CategoriaFK) REFERENCES Categorias (ID_Categoria)
    
);

CREATE TABLE Facturas(
	ID_Factura int AUTO_INCREMENT PRIMARY KEY,
    Fecha date NOT null,
    Cantidad int NOT null,
    Total float NOT null,
    ID_ProductoFK int NOT null,
    ID_ClienteFK int NOT null,
    FOREIGN KEY (ID_ProductoFK) REFERENCES Productos (ID_Producto),
    FOREIGN KEY (ID_ClienteFK) REFERENCES Clientes (ID_Cliente)
);

CREATE TABLE DetalleCompras(
	ID_DetalleCompra int AUTO_INCREMENT PRIMARY KEY,
    CantidadCompra int NOT null,
    Precio_Compra float NOT null,
    Precio_Venta float NOT null,
    ID_ProductoFK int NOT null,
    ID_ProveedorFK int NOT null,
    FOREIGN KEY (ID_ProductoFK) REFERENCES Productos (ID_Producto),
    FOREIGN KEY (ID_ProveedorFK) REFERENCES Proveedores (ID_Proveedor)
);

CREATE TABLE HistoricoModificacion(
	ID_Historico int AUTO_INCREMENT PRIMARY KEY,
    Fecha date NOT null,
    Detalles varchar(50),
    ID_ProductoFK int NOT null,
    ID_UsuarioFK int NOT null,
    FOREIGN KEY (ID_ProductoFK) REFERENCES Productos (ID_Producto),
    FOREIGN KEY (ID_UsuarioFK) REFERENCES Usuarios (ID_Usuario)
);