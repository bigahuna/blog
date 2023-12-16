<?php

declare(strict_types=1);

use TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider;

return [
    'typo3_blog-plugin-latest' => [
        'provider' => SvgIconProvider::class,
        'source' => 'EXT:typo3_blog/Resources/Public/Icons/user_plugin_latest.svg',
    ],
    'typo3_blog-plugin-list' => [
        'provider' => SvgIconProvider::class,
        'source' => 'EXT:typo3_blog/Resources/Public/Icons/user_plugin_list.svg',
    ],
    'typo3_blog-plugin-show' => [
        'provider' => SvgIconProvider::class,
        'source' => 'EXT:typo3_blog/Resources/Public/Icons/user_plugin_show.svg',
    ],
];
