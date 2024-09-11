<?php

// Usar algo del estilo de esto en un middleware
function FunctionName(array $roles_del_usuario, string $rol_buscado): bool {
    return in_array($rol_buscado, $roles_del_usuario);
}

/* Hacer que la propiedad 'Roles' de los usuarios sea un json con todos los roles que ese usuario tenga.
 * En el middleware convertir ese json en un array para despues usar la funcion in array para buscar un
 * rol especifico en los roles que tiene el usuario, y hacer lo tipico del middleware despues.
 * Y hacer que el rol a buscar sea una variable que se pase al middleware.
*/
