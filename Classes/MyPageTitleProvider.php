<?php

declare(strict_types=1);

namespace Rms\Typo3Blog;

use TYPO3\CMS\Core\PageTitle\AbstractPageTitleProvider;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;

class MyPageTitleProvider extends AbstractPageTitleProvider
{
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function setBlogTitle(string $title): void
    {
        /*
        $this->title = $title . ' | ';
        $rootline = $GLOBALS['TSFE']->rootLine;
        $last_key = array_key_first($rootline);
        $rootline[$last_key]['title'] = $title;
        $GLOBALS['TSFE']->rootLine = $rootline;
        //DebuggerUtility::var_dump($GLOBALS['TSFE']->rootLine);
        */

        /*
        $separator = ' | ';
        DebuggerUtility::var_dump($rootline);
        foreach ($rootline as $key => $titlePart) {
            $this->title .= $titlePart['title'];
            if ($key !== 0) {
                $this->title .= $separator;
            }
        }
        */
    }
}
