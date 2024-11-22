<?php

return [

    'paths' => ['api/*','basket/*'], // API yollarınızı burada göstərin

    'allowed_methods' => ['*'], // İstədiyiniz HTTP metodlarını burada göstərin (GET, POST, PUT, DELETE, etc.)

    'allowed_origins' => ['*'], // İcazə verilən mənbələri burada göstərin. '*' bütün mənbələrə icazə verir.

    'allowed_origins_patterns' => [],

    'allowed_headers' => ['*'], // İcazə verilən başlıqları burada göstərin

    'exposed_headers' => [],

    'max_age' => 0,

    'supports_credentials' => false, // Cookie-ləri dəstəkləyib-dəstəkləməyəcəyinizi burada göstərin

];
