<?php

declare(strict_types=1);

defined('TYPO3') || die();

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'Typo3Blog',
    'Latest',
    'Typo3Blog latest'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'Typo3Blog',
    'List',
    'Typo3Blog list'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'Typo3Blog',
    'Show',
    'Typo3Blog show'
);
