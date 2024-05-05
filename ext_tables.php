<?php

declare(strict_types=1);

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

defined('TYPO3') || die();

(static function () {
    ExtensionManagementUtility::addLLrefForTCAdescr('tx_typo3blog_domain_model_post', 'EXT:typo3_blog/Resources/Private/Language/locallang_csh_tx_typo3blog_domain_model_post.xlf');

    ExtensionManagementUtility::addLLrefForTCAdescr('tx_typo3blog_domain_model_category', 'EXT:typo3_blog/Resources/Private/Language/locallang_csh_tx_typo3blog_domain_model_category.xlf');
})();
