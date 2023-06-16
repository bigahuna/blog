<?php

declare(strict_types=1);

defined('TYPO3') || die();

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'Blog',
    'Latest',
    'Blog latest'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'Blog',
    'List',
    'Blog list'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'Blog',
    'Show',
    'Blog show'
);
