# Bank
Base de Datos
```
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    cedula VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
);
CREATE TABLE cuentas_bancarias (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT,
    saldo DECIMAL(10, 2) NOT NULL DEFAULT 0,
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id)
);
CREATE TABLE movimientos (
    id_transaccion CHAR(36) PRIMARY KEY,
    id_usuario INT,
    id_usuario_destino INT, -- Nueva columna
    nombre_usuario VARCHAR(255),
    tipo_movimiento ENUM('consignacion', 'retiro', 'transferencia') NOT NULL,
    monto DECIMAL(10, 2) NOT NULL,
    fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id),
    FOREIGN KEY (id_usuario_destino) REFERENCES usuarios(id) 
);

```
