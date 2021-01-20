<?php

use App\Entity\User;
use App\Entity\Admin;

return [
    User::class => require __DIR__ . '/user.php',
    Admin::class => require __DIR__ . '/admin.php',
];
