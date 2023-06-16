<?php

declare(strict_types=1);

namespace Rms\Blog\Domain\Repository;

use TYPO3\CMS\Extbase\Persistence\QueryInterface;
use TYPO3\CMS\Extbase\Persistence\QueryResultInterface;
use TYPO3\CMS\Extbase\Persistence\Repository;

/**
 * This file is part of the "Blog" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2022 Mike <mkettel@gmail.com>, visisblebits.de
 */

/**
 * The repository for Posts
 */
class PostRepository extends Repository
{
    protected $defaultOrderings = ['sorting' => QueryInterface::ORDER_ASCENDING];

    /**
     * @return QueryResultInterface|object[] The query result object or an array if $returnRawQueryResult is TRUE
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
            $result = $queryPrev->execute()[0];
        } else {
            $queryLast = $this->createQuery();
            $queryLast->setOrderings(['uid' => QueryInterface::ORDER_DESCENDING]);
            $queryLast->setLimit(1);
            $result = $queryLast->execute()[0];
        }

        return $result;
    }

    /**
     * @return QueryResultInterface|object[] The query result object or an array if $returnRawQueryResult is TRUE
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
            $result = $queryNext->execute()[0];
        } else {
            $queryFirst = $this->createQuery();
            $queryFirst->setOrderings(['uid' => QueryInterface::ORDER_ASCENDING]);
            $queryFirst->setLimit(1);
            $result = $queryFirst->execute()[0];
        }

        return $result;
    }

    /**
     * @return QueryResultInterface|object[] The query result object or an array if $returnRawQueryResult is TRUE
     */
    public function getLatestPosts(int $limit = 30)
    {
        $query = $this->createQuery();
        $query->setOrderings(['uid' => QueryInterface::ORDER_DESCENDING]);
        $query->setLimit($limit);

        return $query->execute();
    }
}
