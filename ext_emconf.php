<?php

declare(strict_types=1);

$_EXTKEY = 'typo3_blog';
$EM_CONF[$_EXTKEY] = [
    'title' => 'Typo3Blog',
    'description' => 'Typo3Blog Extension',
    'category' => 'plugin',
    'author' => 'Mike',
    'author_email' => 'mkettel@gmail.com',
    'state' => 'stable',
    'version' => '1.0.0',
    'constraints' => [
        'depends' => [
            'typo3' => '12.4.0-12.4.99',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
];
