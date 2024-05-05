<?php

declare(strict_types=1);

namespace Rms\Typo3Blog\Domain\Model;

use TYPO3\CMS\Extbase\Annotation\Validate;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

/**
 * This file is part of the "Typo3Blog" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2022 Mike <mkettel@gmail.com>, visisblebits.de
 */
/**
 * Categories for typo3_blog posts
 */
class Category extends AbstractEntity
{
    /**
     * name
     *
     * @var string
     */
    #[Validate(['validator' => 'NotEmpty'])]
    protected $name = '';

    /**
     * value
     *
     * @var string
     */
    #[Validate(['validator' => 'NotEmpty'])]
    protected $value = '';

    /**
     * Returns the name
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Sets the name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * Returns the value
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * Sets the value
     */
    public function setValue(string $value): void
    {
        $this->value = $value;
    }
}
