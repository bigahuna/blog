![PHPStan](https://github.com/visible-bits/typo3_blog/actions/workflows/phpstan.yml/badge.svg)
![PHPCodeSniffer](https://github.com/visible-bits/typo3_blog/actions/workflows/phpcs.yml/badge.svg)
![CodeQL](https://github.com/visible-bits/typo3_blog/actions/workflows/codeql-analysis.yml/badge.svg)

# Basic blog for TYPO3

This is a basic blogging system extension for TYPO3

## Setup

## constants

```typoscript
# overwrite/set single, list and storage pids in your template constants.typoscript
plugin.tx_typo3blog.singlePid = 24
plugin.tx_typo3blog.listPid = 23
plugin.tx_typo3blog.storagePid = 22
```

```typoscript
# overwrite/set fluid template files in you template constants.typoscript
# and copy the files from the blog extension to this location
plugin.tx_typo3blog_latest.view.templateRootPath = EXT:maintemplate/Resources/Private/Templates/Typo3Blog/
plugin.tx_typo3blog_list.view.templateRootPath = EXT:maintemplate/Resources/Private/Templates/Typo3Blog/
plugin.tx_typo3blog_show.view.templateRootPath = EXT:maintemplate/Resources/Private/Templates/Typo3Blog/
```

## setup

```typoscript
# to assign the constant values from above, add this to your templates typoscript setup
plugin.tx_typo3blog.singlePid = {$plugin.tx_typo3blog.singlePid}
plugin.tx_typo3blog.listPid = {$plugin.tx_typo3blog.listPid}
plugin.tx_typo3blog_show.settings.listPid = {$plugin.tx_typo3blog.listPid}
plugin.tx_typo3blog_show.settings.singlePid = {$plugin.tx_typo3blog.singlePid}
plugin.tx_typo3blog_latest.persistence.storagePid = {$plugin.tx_typo3blog.storagePid}
plugin.tx_typo3blog_latest.settings.singlePid = {$plugin.tx_typo3blog.singlePid}
plugin.tx_typo3blog_list.settings.singlePid = {$plugin.tx_typo3blog.singlePid}
plugin.tx_typo3blog_list.persistence.storagePid = {$plugin.tx_typo3blog.storagePid}
plugin.tx_typo3blog_show.persistence.storagePid = {$plugin.tx_typo3blog.storagePid}
```