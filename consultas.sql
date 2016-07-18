
--------------------------------------------------------------------
-------------Arreglos más vendidos en el año------------------------
--------------------------------------------------------------------

SELECT id_arreglo_floral, COUNT(id_arreglo_floral)
FROM Pedidos LEFT JOIN Detalle_Pedido
ON Pedidos.id = Detalle_Pedido.id_pedido LEFT JOIN Arreglos_Florales
ON Detalle_Pedido.id_arreglo_floral = Arreglos_Florales.id
WHERE YEAR(Pedidos.fecha_pedido) = 2004
GROUP BY id_arreglo_floral
ORDER BY COUNT(id_arreglo_floral) DESC
LIMIT 10;


--------------------------------------------------------------------
-------------Ocasiones más pedidas en el año------------------------
--------------------------------------------------------------------


SELECT Ocasiones.nombre, COUNT(Ocasiones.id)
FROM Pedidos LEFT JOIN Detalle_Pedido
ON Pedidos.id = Detalle_Pedido.id_pedido LEFT JOIN Arreglos_Florales
ON Detalle_Pedido.id_arreglo_floral = Arreglos_Florales.id LEFT JOIN Ocasiones
ON Ocasiones.id = Arreglos_Florales.id_ocasion
WHERE YEAR(Pedidos.fecha_pedido) = 2014
GROUP BY Ocasiones.id
ORDER BY COUNT(Ocasiones.id) DESC
LIMIT 10;

--------------------------------------------------------------------
-------------Flores más vendidas en el año--------------------------
--------------------------------------------------------------------
SELECT Detalle_Arr_Flo.id_flor, Flores.nombre, SUM(Detalle_Arr_Flo.cantidad)
FROM Pedidos LEFT JOIN Detalle_Pedido
ON Pedidos.id = Detalle_Pedido.id_pedido LEFT JOIN Arreglos_Florales
ON Detalle_Pedido.id_arreglo_floral = Arreglos_Florales.id  LEFT JOIN Detalle_Arr_Flo
ON Detalle_Arr_Flo.id_arreglo_floral = Arreglos_Florales.id LEFT JOIN Flores
ON Detalle_Arr_Flo.id_flor = Flores.id
WHERE YEAR(Pedidos.fecha_pedido) = 2009
GROUP BY Detalle_Arr_Flo.id_flor
ORDER BY SUM(Detalle_Arr_Flo.cantidad) DESC
LIMIT 10;

--------------------------------------------------------------------
----------Tipos de Flores más vendidas en el año--------------------
--------------------------------------------------------------------

SELECT Tipos_Flores.nombre,SUM(Detalle_Arr_Flo.cantidad)
FROM Pedidos LEFT JOIN Detalle_Pedido
ON Pedidos.id = Detalle_Pedido.id_pedido LEFT JOIN Arreglos_Florales
ON Detalle_Pedido.id_arreglo_floral = Arreglos_Florales.id  LEFT JOIN Detalle_Arr_Flo
ON Detalle_Arr_Flo.id_arreglo_floral = Arreglos_Florales.id LEFT JOIN Flores
ON Detalle_Arr_Flo.id_flor = Flores.id LEFT JOIN Tipos_Flores
ON Tipos_Flores.id = Flores.id_tipo
WHERE YEAR(Pedidos.fecha_pedido) = 2013
GROUP BY Tipos_Flores.id
ORDER BY SUM(Detalle_Arr_Flo.cantidad) DESC
LIMIT 10;

--------------------------------------------------------------------
----------Direcciones con más envíos en el año----------------------
--------------------------------------------------------------------

SELECT Direccion_Envio.direccion, COUNT(Direccion_Envio.id)
FROM Pedidos LEFT JOIN Direccion_Envio
ON Pedidos.id_direccion_envio = Direccion_Envio.id
WHERE YEAR(Pedidos.fecha_pedido) = 2013
GROUP BY Direccion_Envio.id
ORDER BY COUNT(Direccion_Envio.id) DESC
LIMIT 10;

--------------------------------------------------------------------
--------------Estados con más envíos en el año----------------------
--------------------------------------------------------------------

SELECT Estados_Envio.nombre, COUNT(Estados_Envio.id)
FROM Pedidos LEFT JOIN Direccion_Envio 
ON Pedidos.id_direccion_envio = Direccion_Envio.id LEFT JOIN Estados_Envio
ON Direccion_Envio.id_estado = Estados_Envio.id
WHERE YEAR(Pedidos.fecha_pedido) = 2013
GROUP BY Estados_Envio.id
ORDER BY COUNT(Estados_Envio.id) DESC
LIMIT 10;

--------------------------------------------------------------------
-----------------Contenedor preferido cada año----------------------
--------------------------------------------------------------------

SELECT Contenedores.material, COUNT(Contenedores.id)
FROM Pedidos LEFT JOIN Detalle_Pedido 
ON Pedidos.id = Detalle_Pedido.id_pedido LEFT JOIN Arreglos_Florales
ON Detalle_Pedido.id_arreglo_floral = Arreglos_Florales.id LEFT JOIN Contenedores
ON Arreglos_Florales.id_contenedor = Contenedores.id
WHERE YEAR(Pedidos.fecha_pedido) = 2013
GROUP BY Contenedores.id
ORDER BY COUNT(Contenedores.id) DESC

--------------------------------------------------------------------
-----------------Clientes con más pedidos---------------------------
--------------------------------------------------------------------

SELECT Clientes.nombre, COUNT(Clientes.id)
FROM Pedidos LEFT JOIN Clientes
ON Pedidos.id_cliente = Clientes.id
WHERE YEAR(Pedidos.fecha_pedido) = 2013
GROUP BY Clientes.id
ORDER BY COUNT(Clientes.id) DESC
LIMIT 10;

--------------------------------------------------------------------
-----------------Mejores clientes en el año---------------------------
--------------------------------------------------------------------

SELECT Clientes.nombre, SUM(Pedidos.total)
FROM Pedidos LEFT JOIN Clientes
ON Pedidos.id_cliente = Clientes.id
WHERE YEAR(Pedidos.fecha_pedido) = 2013
GROUP BY Clientes.id
ORDER BY SUM(Pedidos.total) DESC
LIMIT 10;

--------------------------------------------------------------------
------------Proveedores a los que se les pagó más-------------------
--------------------------------------------------------------------

SELECT Proveedores.nombre, SUM(Compras_Proveedores.total)
FROM Compras_Proveedores LEFT JOIN Proveedores
ON Compras_Proveedores.id_proveedor = Proveedores.id
WHERE YEAR(Compras_Proveedores.fecha_comp_prov) = 2013
GROUP BY Proveedores.id
ORDER BY SUM(Compras_Proveedores.total) DESC
LIMIT 10;

--------------------------------------------------------------------
------------Compras a proveedores en el año-------------------------
--------------------------------------------------------------------

SELECT Proveedores.nombre, COUNT(Compras_Proveedores.id_proveedor)
FROM Compras_Proveedores LEFT JOIN Proveedores
ON Compras_Proveedores.id_proveedor = Proveedores.id
WHERE YEAR(Compras_Proveedores.fecha_comp_prov) = 2013
GROUP BY Proveedores.id
ORDER BY COUNT(Compras_Proveedores.id_proveedor) DESC
LIMIT 10;