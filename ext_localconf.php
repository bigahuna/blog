<?php

declare(strict_types=1);

defined('TYPO3') || die();

(static function () {
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'Typo3Blog',
        'Latest',
        [
            \Rms\Typo3Blog\Controller\PostController::class => 'latest',
        ],
        // non-cacheable actions
        [
            \Rms\Typo3Blog\Controller\PostController::class => '',
        ]
    );

    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'Typo3Blog',
        'List',
        [
            \Rms\Typo3Blog\Controller\PostController::class => 'list',
        ],
        // non-cacheable actions
        [
            \Rms\Typo3Blog\Controller\PostController::class => 'list',
        ]
    );

    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'Typo3Blog',
        'Show',
        [
            \Rms\Typo3Blog\Controller\PostController::class => 'show',
        ],
        // non-cacheable actions
        [
            \Rms\Typo3Blog\Controller\PostController::class => '',
        ]
    );

    // wizards
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        'mod {
            wizards.newContentElement.wizardItems.plugins {
                elements {
                    latest {
                        iconIdentifier = typo3_blog-plugin-latest
                        title = LLL:EXT:typo3_blog/Resources/Private/Language/locallang_db.xlf:tx_typo3_blog_latest.name
                        description = LLL:EXT:typo3_blog/Resources/Private/Language/locallang_db.xlf:tx_typo3_blog_latest.description
                        tt_content_defValues {
                            CType = list
                            list_type = typo3_blog_latest
                        }
                    }
                    list {
                        iconIdentifier = typo3_blog-plugin-list
                        title = LLL:EXT:typo3_blog/Resources/Private/Language/locallang_db.xlf:tx_typo3_blog_list.name
                        description = LLL:EXT:typo3_blog/Resources/Private/Language/locallang_db.xlf:tx_typo3_blog_list.description
                        tt_content_defValues {
                            CType = list
                            list_type = typo3_blog_list
                        }
                    }
                    show {
                        iconIdentifier = typo3_blog-plugin-show
                        title = LLL:EXT:typo3_blog/Resources/Private/Language/locallang_db.xlf:tx_typo3_blog_show.name
                        description = LLL:EXT:typo3_blog/Resources/Private/Language/locallang_db.xlf:tx_typo3_blog_show.description
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
TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
    "@import 'EXT:typo3_blog/Configuration/TSconfig/addBlogPostLinksRte.tsconfig'"
);
