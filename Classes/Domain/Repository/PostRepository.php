<?php

declare(strict_types=1);

namespace Rms\Typo3Blog\Domain\Repository;

use Rms\Typo3Blog\Domain\Model\Post;
use TYPO3\CMS\Extbase\DomainObject\DomainObjectInterface;
use TYPO3\CMS\Extbase\Persistence\QueryInterface;
use TYPO3\CMS\Extbase\Persistence\QueryResultInterface;
use TYPO3\CMS\Extbase\Persistence\Repository;

/**
 * The repository for Posts
 * @extends \TYPO3\CMS\Extbase\Persistence\Repository<\Rms\Typo3Blog\Domain\Model\Post>
 */
class PostRepository extends Repository
{
    protected $defaultOrderings = ['sorting' => QueryInterface::ORDER_ASCENDING];

    /**
     * @return DomainObjectInterface|null
     */
    public function getPrevPost(int $post)
    {
        $queryPrev = $this->createQuery();

        $queryPrev->matching(
            $queryPrev->logicalOr(
                $queryPrev->lessThan('uid', $post)
            )
        );
        $queryPrev->setOrderings(['uid' => QueryInterface::ORDER_DESCENDING]);
        $queryPrev->setLimit(1);

        if ($queryPrev->count() >= 1) {
            /* @var \Rms\Typo3Blog\Domain\Model\Post $post */
            $post = $queryPrev->execute()[0];
            $result = $post;
        } else {
            $queryLast = $this->createQuery();
            $queryLast->setOrderings(['uid' => QueryInterface::ORDER_DESCENDING]);
            $queryLast->setLimit(1);

            /* @var \Rms\Typo3Blog\Domain\Model\Post $post */
            $post = $queryLast->execute()[0];
            $result = $post;
        }

        return $result;
    }

    /**
     * @return DomainObjectInterface|null
     */
    public function getNextPost(int $post)
    {
        // get NEXT
        $queryNext = $this->createQuery();
        $queryNext->matching(
            $queryNext->logicalOr(
                $queryNext->greaterThan('uid', $post)
            )
        );
        $queryNext->setOrderings(['uid' => QueryInterface::ORDER_ASCENDING]);
        $queryNext->setLimit(1);

        if ($queryNext->count() >= 1) {
            /* @var \Rms\Typo3Blog\Domain\Model\Post $post */
            $post = $queryNext->execute()[0];
            $result = $post;
        } else {
            $queryFirst = $this->createQuery();
            $queryFirst->setOrderings(['uid' => QueryInterface::ORDER_ASCENDING]);
            $queryFirst->setLimit(1);

            /* @var \Rms\Typo3Blog\Domain\Model\Post $post */
            $post = $queryFirst->execute()[0];
            $result = $post;
        }

        return $result;
    }

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\QueryResultInterface<int, Post>
     */
    public function getLatestPosts(int $limit = 30): \TYPO3\CMS\Extbase\Persistence\QueryResultInterface
    {
        $query = $this->createQuery();
        $query->setOrderings(['uid' => QueryInterface::ORDER_DESCENDING]);
        $query->setLimit($limit);

        return $query->execute();
    }
}
