<?php
/**
 * Devuelve la conexión a la base de datos
 *
 * @var PDO $db
 */
$db = new PDO('sqlite:database.sqlite');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

return $db;
