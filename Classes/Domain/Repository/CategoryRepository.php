<?php

declare(strict_types=1);

namespace Rms\Typo3Blog\Domain\Repository;

use TYPO3\CMS\Extbase\Persistence\QueryInterface;
use TYPO3\CMS\Extbase\Persistence\Repository;

/**
 * The repository for Categories
 * @extends \TYPO3\CMS\Extbase\Persistence\Repository<\Rms\Typo3Blog\Domain\Model\Category>
 */
class CategoryRepository extends Repository
{
    protected $defaultOrderings = ['sorting' => QueryInterface::ORDER_ASCENDING];
}
