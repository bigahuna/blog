<?php

declare(strict_types=1);

$_EXTKEY = 'blog';
$EM_CONF[$_EXTKEY] = [
    'title' => 'Blog',
    'description' => 'Blog Extension',
    'category' => 'plugin',
    'author' => 'Mike',
    'author_email' => 'mkettel@gmail.com',
    'state' => 'alpha',
    'version' => '1.0.0',
    'constraints' => [
        'depends' => [
            'typo3' => '11.5.0-11.5.99',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
];
