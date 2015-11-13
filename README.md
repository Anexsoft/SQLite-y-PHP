# Senior Web Developer

Esta tarea se divide en 2 partes:

1. Backend (PHP y SQL)
2. Frontend (HTML, CSS, Javascript)

## Backend

Esta parte evalúa tus conocimientos de PHP, SQL y diseño orientado a objetos. Eres libre de diseñar el sistema a tu antojo, para tu conveniencia hemos creado la conexión a una base de datos SQLite en el archivo `import.php`. Los pasos descritos debajo deberán ocurrir al ejecutar `php import.php`

1. Recorre el archivo `users.csv`
2. Transforma los datos
3. Insértalos en la tabla `users`

El archivo `users.csv` tiene una sola columna con datos separados por `|`. Los números de celular y de teléfono están separados por `-`. Tu misión será separlos e insertarlos en la tabla `users` que tiene las siguientes columnas:

    id | name | last_name | address | telephone | cellphone | avatar

El campo `id` es generado automáticamente, solo deberán ser insertadas las demás columnas. En la evaluación pondremos un cuidado especial a ver cómo diseñaste el sistema, si separaste responsabilidades y demostraste conocimientos de diseño orientado a objetos. No uses librerías externas. Recibirás puntos extra si tu solución es eficiente, piensa en qué pasaría si en lugar de 50 debes importar 1 millón de registros.

## Frontend

Esta parte evalúa tus conocimientos de HTML, CSS y Javascript. Primero, prioriza la lista de tareas que están debajo de menor a mayor, donde "1" es la tarea de mayor prioridad y "5" la de menor. Piensa en cuál es el objetivo de una agenda. Es muy importante que expliques ¿por qué has priorizado de esta forma? ¿qué cosas tomaste en consideración al asignar la prioridad a cada tarea?.

- Filtrar la tabla por nombre. Implementa una caja de texto que permita filtrar la tabla por la columna nombre.
- Ordenamiento de columnas. Escribe el código necesario para ordenar cualquier columna de forma ascendente y descendente.
- Paginación. Divide los resultados en páginas, cada página debe contener 10 filas.
- Encabezado Fijo. Escribe el código necesario para que al hacer scroll en la página, el encabezado de la tabla permanezca visible todo el tiempo en la parte superior de la página.
- Avatar en modal. Implementa un mecanismo que permita que al hacer clic en el avatar de un usuario, este se muestre en su tamaño original en una ventana modal.

Finalmente, elige al menos una tarea e impleméntala. El archivo inicial de trabajo es `index.html`, allí encontrarás una agenda con información de 50 personas. Eres libre de modificar el código a tu antojo y crear cuantos archivos gustes, además, para tu comodidad hemos incluído jQuery. No uses ninguna librería de javascript fuera de jQuery. Tu solución debe funcionar en Chrome, Firefox, Safari e IE8+.

¡Buena suerte!
