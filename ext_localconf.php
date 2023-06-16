<?php

declare(strict_types=1);

defined('TYPO3') || die();

(static function () {
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'Blog',
        'Latest',
        [
            \Rms\Blog\Controller\PostController::class => 'latest',
        ],
        // non-cacheable actions
        [
            \Rms\Blog\Controller\PostController::class => '',
        ]
    );

    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'Blog',
        'List',
        [
            \Rms\Blog\Controller\PostController::class => 'list',
        ],
        // non-cacheable actions
        [
            \Rms\Blog\Controller\PostController::class => 'list',
        ]
    );

    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'Blog',
        'Show',
        [
            \Rms\Blog\Controller\PostController::class => 'show',
        ],
        // non-cacheable actions
        [
            \Rms\Blog\Controller\PostController::class => '',
        ]
    );

    // wizards
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        'mod {
            wizards.newContentElement.wizardItems.plugins {
                elements {
                    latest {
                        iconIdentifier = blog-plugin-latest
                        title = LLL:EXT:blog/Resources/Private/Language/locallang_db.xlf:tx_blog_latest.name
                        description = LLL:EXT:blog/Resources/Private/Language/locallang_db.xlf:tx_blog_latest.description
                        tt_content_defValues {
                            CType = list
                            list_type = blog_latest
                        }
                    }
                    list {
                        iconIdentifier = blog-plugin-list
                        title = LLL:EXT:blog/Resources/Private/Language/locallang_db.xlf:tx_blog_list.name
                        description = LLL:EXT:blog/Resources/Private/Language/locallang_db.xlf:tx_blog_list.description
                        tt_content_defValues {
                            CType = list
                            list_type = blog_list
                        }
                    }
                    show {
                        iconIdentifier = blog-plugin-show
                        title = LLL:EXT:blog/Resources/Private/Language/locallang_db.xlf:tx_blog_show.name
                        description = LLL:EXT:blog/Resources/Private/Language/locallang_db.xlf:tx_blog_show.description
                        tt_content_defValues {
                            CType = list
                            list_type = blog_show
                        }
                    }
                }
                show = *
            }
       }'
    );
})();

// ------------------------------------------------
// Make links to blog posts possible.
// Moved to ext/blog/ext_localconf.php
// so that it can be used inside filemetadata too
// mk, 2023-05-26
// ------------------------------------------------
TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
    "@import 'EXT:blog/Configuration/TSconfig/addBlogPostLinksRte.tsconfig'"
);
