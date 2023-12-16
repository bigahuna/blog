<?php

declare(strict_types=1);

use Rms\Typo3Blog\Controller\PostController;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

defined('TYPO3') || die();

(static function () {
    ExtensionUtility::configurePlugin(
        'Typo3Blog',
        'Latest',
        [
            PostController::class => 'latest',
        ],
        // non-cacheable actions
        [
            PostController::class => '',
        ]
    );

    ExtensionUtility::configurePlugin(
        'Typo3Blog',
        'List',
        [
            PostController::class => 'list',
        ],
        // non-cacheable actions
        [
            PostController::class => 'list',
        ]
    );

    ExtensionUtility::configurePlugin(
        'Typo3Blog',
        'Show',
        [
            PostController::class => 'show',
        ],
        // non-cacheable actions
        [
            PostController::class => '',
        ]
    );

    // wizards
    ExtensionManagementUtility::addPageTSConfig(
        'mod {
            wizards.newContentElement.wizardItems.plugins {
                elements {
                    latest {
                        iconIdentifier = typo3_blog-plugin-latest
                        title = LLL:EXT:typo3_blog/Resources/Private/Language/locallang_db.xlf:tx_typo3blog_latest.name
                        description = LLL:EXT:typo3_blog/Resources/Private/Language/locallang_db.xlf:tx_typo3blog_latest.description
                        tt_content_defValues {
                            CType = list
                            list_type = typo3_blog_latest
                        }
                    }
                    list {
                        iconIdentifier = typo3_blog-plugin-list
                        title = LLL:EXT:typo3_blog/Resources/Private/Language/locallang_db.xlf:tx_typo3blog_list.name
                        description = LLL:EXT:typo3_blog/Resources/Private/Language/locallang_db.xlf:tx_typo3blog_list.description
                        tt_content_defValues {
                            CType = list
                            list_type = typo3_blog_list
                        }
                    }
                    show {
                        iconIdentifier = typo3_blog-plugin-show
                        title = LLL:EXT:typo3_blog/Resources/Private/Language/locallang_db.xlf:tx_typo3blog_show.name
                        description = LLL:EXT:typo3_blog/Resources/Private/Language/locallang_db.xlf:tx_typo3blog_show.description
                        tt_content_defValues {
                            CType = list
                            list_type = typo3_blog_show
                        }
                    }
                }
                show = *
            }
       }'
    );
})();

// ------------------------------------------------
// Make links to typo3_blog posts possible.
// Moved to ext/typo3_blog/ext_localconf.php
// so that it can be used inside filemetadata too
// mk, 2023-05-26
// ------------------------------------------------
ExtensionManagementUtility::addPageTSConfig(
    "@import 'EXT:typo3_blog/Configuration/TSconfig/addBlogPostLinksRte.tsconfig'"
);
