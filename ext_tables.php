<?php

declare(strict_types=1);

defined('TYPO3') || die();

(static function () {
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_typo3blog_domain_model_post', 'EXT:typo3_blog/Resources/Private/Language/locallang_csh_tx_typo3blog_domain_model_post.xlf');
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_typo3blog_domain_model_post');

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_typo3blog_domain_model_category', 'EXT:typo3_blog/Resources/Private/Language/locallang_csh_tx_typo3blog_domain_model_category.xlf');
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_typo3blog_domain_model_category');
})();
