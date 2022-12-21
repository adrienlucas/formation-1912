<?php

namespace Toto;

class Admin {
    //... username, password
    public string $level; // SUPERADMIN or ADMIN

    private const LEVELS = [
        self::LEVEL_ADMIN,
        self::LEVEL_SUPERADMIN,
        self::LEVEL_TOTO,
    ];

    public const LEVEL_ADMIN = 'ADMIN';
    public const LEVEL_SUPERADMIN = 'SUPERADMIN';
    public const LEVEL_TOTO = 'TOTO';

    public function __construct(string $level)
    {
        if(!in_array($level, self::LEVELS)) {
            throw new \Exception(sprintf('The level %s is unrecognized', $level));
        }
        $this->level = $level;
    }
}

class Toto {

}

$normalAdmin = new Admin(Admin::LEVEL_ADMIN);
$typoAdmin = new Admin(Admin::LEVEL_SUPERADMIN);

var_dump(is_a($normalAdmin, Toto::class)); //== 'Toto\Toto' false
var_dump(is_a($normalAdmin, Admin::class)); //== 'Toto\Admin' true


$totoAdmin = new Admin(Admin::LEVEL_TOTO);
