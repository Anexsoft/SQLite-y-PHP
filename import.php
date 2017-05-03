<?php
require_once __DIR__ . '/app/util/DbContext.php';
require_once __DIR__ . '/app/model/User.php';
require_once __DIR__ . '/app/service/UserService.php';

use App\Util\DbContext,
    App\Service\UserService;

DbContext::initialize();
print '- Instanciando la base de datos';

DbContext::generateSchema();
print PHP_EOL . '- Generado la esquema';

UserService::importFromCsv(
    __DIR__ . '/users.csv'
);

print PHP_EOL . '- Importando CSV';

print PHP_EOL . sprintf('- Se han importado %s usuarios', UserService::count());
print PHP_EOL . '- Proceso finalizado';
