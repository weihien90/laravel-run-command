<?php

return [
    'binary' => env(
        'SERVER_MANAGER_PATH',
        null
    ),

    'max_total_storage' => 64 * 1000,

    'max_total_memory' => 64 * 1000,
];
