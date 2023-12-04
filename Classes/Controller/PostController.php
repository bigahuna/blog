<?php

declare(strict_types=1);

namespace Rms\Typo3Blog\Controller;

use Psr\Http\Message\ResponseInterface;
use Rms\Typo3Blog\Domain\Model\Post;
use Rms\Typo3Blog\Domain\Repository\PostRepository;
use Rms\Typo3Blog\MyPageTitleProvider;
use TYPO3\CMS\Core\MetaTag\MetaTagManagerRegistry;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Configuration\ConfigurationManager;
use TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

/**
 * This file is part of the "Typo3Blog" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2022 Mike <mkettel@gmail.com>, visisblebits.de
 */

/**
 * PostController
 */
class PostController extends ActionController
{
    /**
     * postRepository
     *
     * @var PostRepository
     */
    protected $postRepository;

    public function injectPostRepository(PostRepository $postRepository): void
    {
        $this->postRepository = $postRepository;
    }

    /**
     * action latest
     */
    public function latestAction(): ResponseInterface
    {
        /** @var ConfigurationManager $configurationManager */
        $configurationManager = GeneralUtility::makeInstance(ConfigurationManager::class);
        $typoscript = $configurationManager->getConfiguration(
            ConfigurationManagerInterface::CONFIGURATION_TYPE_FULL_TYPOSCRIPT,
            'sitepackage'
        );

        $posts = $this->postRepository->getLatestPosts(30);

        $this->view->assign('posts', $posts);
        $this->view->assign('settings', $typoscript['plugin.']['tx_typo3blog_latest.']['settings.']);

        return $this->htmlResponse();
    }

    /**
     * action list
     */
    public function listAction(): ResponseInterface
    {
        $posts = $this->postRepository->findAll();
        $this->view->assign('posts', $posts);

        return $this->htmlResponse();
    }

    /**
     * action show
     */
    public function showAction(Post $post): ResponseInterface
    {
        // /** @var ConfigurationManagerInterface $configurationManager */
        //$configurationManager = GeneralUtility::makeInstance(ConfigurationManager::class);
        //$typoscript = $configurationManager->getConfiguration(
        //    ConfigurationManagerInterface::CONFIGURATION_TYPE_FULL_TYPOSCRIPT,
        //    'sitepackage'
        //);

        /** @var MyPageTitleProvider $titleProvider */
        $titleProvider = GeneralUtility::makeInstance(MyPageTitleProvider::class);
        $titleProvider->setTitle($post->getTitle());

        $prev = $this->postRepository->getPrevPost((int)$post->getUid());
        $next = $this->postRepository->getNextPost((int)$post->getUid());

        /** @var MetaTagManagerRegistry $metaTagManager */
        $metaTagManager = GeneralUtility::makeInstance(MetaTagManagerRegistry::class);

        $title = $metaTagManager->getManagerForProperty('title');
        $title->addProperty('title', $post->getTitle());

        $ogtitle = $metaTagManager->getManagerForProperty('og:title');
        $ogtitle->addProperty('og:title', $post->getTitle());

        $keywords = $metaTagManager->getManagerForProperty('keywords');
        $keywords->addProperty('keywords', $post->getKeywords());

        $description = $metaTagManager->getManagerForProperty('description');
        $description->addProperty('description', $post->getTeaser());

        $this->view->assign('prevPost', $prev);
        $this->view->assign('nextPost', $next);

        $this->view->assign('post', $post);

        return $this->htmlResponse();
    }
}
