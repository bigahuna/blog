<?php

declare(strict_types=1);

namespace Rms\Blog\Tests\Unit\Domain\Model;

use PHPUnit\Framework\MockObject\MockObject;
use Rms\Blog\Domain\Model\Category;
use Rms\Blog\Domain\Model\Post;
use TYPO3\CMS\Extbase\Domain\Model\FileReference;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;
use TYPO3\TestingFramework\Core\AccessibleObjectInterface;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

/**
 * Test case
 *
 * @author Mike <mkettel@gmail.com>
 */
class PostTest extends UnitTestCase
{
    /**
     * @var Post|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = $this->getAccessibleMock(
            Post::class,
            ['dummy']
        );
    }

    protected function tearDown(): void
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getTitleReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getTitle()
        );
    }

    /**
     * @test
     */
    public function setTitleForStringSetsTitle(): void
    {
        $this->subject->setTitle('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('title'));
    }

    /**
     * @test
     */
    public function getTeaserReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getTeaser()
        );
    }

    /**
     * @test
     */
    public function setTeaserForStringSetsTeaser(): void
    {
        $this->subject->setTeaser('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('teaser'));
    }

    /**
     * @test
     */
    public function getImagesReturnsInitialValueForFileReference(): void
    {
        self::assertEquals(
            null,
            $this->subject->getImages()
        );
    }

    /**
     * @test
     */
    public function setImagesForFileReferenceSetsImages(): void
    {
        $fileReferenceFixture = new FileReference();
        $this->subject->setImages($fileReferenceFixture);

        self::assertEquals($fileReferenceFixture, $this->subject->_get('images'));
    }

    /**
     * @test
     */
    public function getContentReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getContent()
        );
    }

    /**
     * @test
     */
    public function setContentForStringSetsContent(): void
    {
        $this->subject->setContent('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('content'));
    }

    /**
     * @test
     */
    public function getCategoriesReturnsInitialValueForCategory(): void
    {
        $newObjectStorage = new ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getCategories()
        );
    }

    /**
     * @test
     */
    public function setCategoriesForObjectStorageContainingCategorySetsCategories(): void
    {
        $category = new Category();
        $objectStorageHoldingExactlyOneCategories = new ObjectStorage();
        $objectStorageHoldingExactlyOneCategories->attach($category);

        $this->subject->setCategories($objectStorageHoldingExactlyOneCategories);

        self::assertEquals($objectStorageHoldingExactlyOneCategories, $this->subject->_get('categories'));
    }

    /**
     * @test
     */
    public function addCategoryToObjectStorageHoldingCategories(): void
    {
        $category = new Category();
        $categoriesObjectStorageMock = $this->getMockBuilder(ObjectStorage::class)
            ->onlyMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $categoriesObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($category));
        $this->subject->_set('categories', $categoriesObjectStorageMock);

        $this->subject->addCategory($category);
    }

    /**
     * @test
     */
    public function removeCategoryFromObjectStorageHoldingCategories(): void
    {
        $category = new Category();
        $categoriesObjectStorageMock = $this->getMockBuilder(ObjectStorage::class)
            ->onlyMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $categoriesObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($category));
        $this->subject->_set('categories', $categoriesObjectStorageMock);

        $this->subject->removeCategory($category);
    }
}
