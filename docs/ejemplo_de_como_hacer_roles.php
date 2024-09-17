<?php

// Usar algo del estilo de esto en un middleware
function FunctionName(array $roles_del_usuario, string $rol_buscado): bool {
    return in_array($rol_buscado, $roles_del_usuario);
}

/* Idea:
Hacer que la propiedad 'Roles' de los usuarios sea un json con todos los roles que ese usuario tenga.
En el middleware convertir ese json en un array para despues usar la funcion in array para buscar un
rol especifico en los roles que tiene el usuario, y hacer lo tipico del middleware despues.
Y hacer que el rol a buscar sea una variable que se pase al middleware.
*/

/* Lista de posibles roles:

Añadir a la base de datos
Ver la base de datos
Borrar de la base de datos

Creo que se necesitaria que sean mas especificos:

Roles Administrador:
    -Ver la base de datos
    -Añadir a la base de datos
    -Borrar de la base de datos
    -Crear otros administradores

Roles Guardia:
    -Ver el calendario de arreglos de su sucursal
    -Poner la fecha de completacion de los arreglos

Roles Empresa:
    -Crear Arreglos nuevos
    -


Idea: Despues de tener los roles que cada tipo de usuario puede tener, generalizarlos tomando en cuenta la base de datos.
      Asi quedamos con un array de roles que puede quedar en usuario nomas y puede hacer que me ahorre las tablas especificas
      de cada tipo de usuario.
*/
