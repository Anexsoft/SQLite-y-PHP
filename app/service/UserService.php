<?php
namespace App\Service;

use App\Util\DbContext,
    App\Util\Anexgrid,
    App\Model\User,
    PDOException,
    PDO;


class UserService {
    public static function importFromCsv($file) {
        $users = [];

        $isFirstLine = true;

        if (($gestor = fopen($file, "r")) !== FALSE) {
            while (($datos = fgetcsv($gestor, 1000, "|")) !== FALSE) {
                if(!$isFirstLine) {
                    $user = new User();
                    $user->name = $datos[0];
                    $user->lastName = $datos[1];
                    $user->address = $datos[2];

                    $phones = explode('-', $datos[3]);
                    $user->telephone = $phones[0];
                    $user->cellphone = isset($phones[1]) ? $phones[1] : '';

                    $user->avatar = 'images/' . $datos[4];

                    $users[] = $user;
                } else {
                    $isFirstLine = false;
                }
            }

            fclose($gestor);
        }

        foreach($users as $user) {
            try {
                DbContext::initialize();
                $qry = DbContext::getInstance()->prepare(
                    'INSERT INTO users (name, last_name, address, telephone, cellphone, avatar) VALUES (?, ?, ?, ?, ?, ?)'
                );

                $qry->execute([
                    $user->name,
                    $user->lastName,
                    $user->address,
                    $user->telephone,
                    $user->cellphone,
                    $user->avatar
                ]);
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }
    }

    public static function getAll() {
        try
        {
            DbContext::initialize();

            /* AnexGRID */
            $anexgrid = new AnexGrid();

            /* Los registros */

            $sql = "
                SELECT * FROM users
                ORDER BY $anexgrid->columna $anexgrid->columna_orden
                LIMIT $anexgrid->pagina, $anexgrid->limite
            ";

            $pdo = DbContext::getInstance();

            $stm = $pdo->prepare( $sql );
            $stm->execute();

            $result = $stm->fetchAll(PDO::FETCH_OBJ);

            /* El total de registros */
            $total = $pdo->query("
                SELECT COUNT(*) Total
                FROM users
            ")->fetchObject()->Total;

            return $anexgrid->responde($result, $total);
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public static function count() {
        try {
            DbContext::initialize();
            $qry = DbContext::getInstance()->prepare(
                'SELECT COUNT(*) total FROM users'
            );
            $qry->execute();
            return $qry->fetchColumn();
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}
