use prueba;
##################################################################################
#-----------------------SOLUCION DE LAS CONSULTAS--------------------------------#
##################################################################################
# CONSULTA N 1
SELECT l.titulo, l.autor, u.nombre, p.fecha_prestamo, p.fecha_devolucion 
FROM libro l
inner join prestamo p on l.id = p.libro_id
inner join usuario u on u.id = p.usuario_id;
##################################################################################
# CONSULTA N 2
SELECT l.titulo, l.autor, u.nombre, p.fecha_prestamo
FROM libro l
inner join prestamo p on l.id = p.libro_id
inner join usuario u on u.id = p.usuario_id
WHERE DATEDIFF(CURDATE(), fecha_prestamo) > 7 AND fecha_devolucion IS NULL;
##################################################################################


