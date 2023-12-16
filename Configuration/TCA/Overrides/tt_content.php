<?php

declare(strict_types=1);

use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

defined('TYPO3') || die();

ExtensionUtility::registerPlugin(
    'Typo3Blog',
    'Latest',
    'Typo3Blog latest'
);

ExtensionUtility::registerPlugin(
    'Typo3Blog',
    'List',
    'Typo3Blog list'
);

ExtensionUtility::registerPlugin(
    'Typo3Blog',
    'Show',
    'Typo3Blog show'
);
