<?php

declare(strict_types=1);

namespace Rms\Blog\Tests\Unit\Controller;

use PHPUnit\Framework\MockObject\MockObject;
use Rms\Blog\Controller\PostController;
use Rms\Blog\Domain\Model\Post;
use Rms\Blog\Domain\Repository\PostRepository;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;
use TYPO3\TestingFramework\Core\AccessibleObjectInterface;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;
use TYPO3Fluid\Fluid\View\ViewInterface;

/**
 * Test case
 *
 * @author Mike <mkettel@gmail.com>
 */
class PostControllerTest extends UnitTestCase
{
    /**
     * @var PostController|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder($this->buildAccessibleProxy(PostController::class))
            ->onlyMethods(['redirect', 'forward', 'addFlashMessage'])
            ->disableOriginalConstructor()
            ->getMock();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function listActionFetchesAllPostsFromRepositoryAndAssignsThemToView(): void
    {
        $allPosts = $this->getMockBuilder(ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $postRepository = $this->getMockBuilder(PostRepository::class)
            ->onlyMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $postRepository->expects(self::once())->method('findAll')->will(self::returnValue($allPosts));
        $this->subject->_set('postRepository', $postRepository);

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('posts', $allPosts);
        $this->subject->_set('view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenPostToView(): void
    {
        $post = new Post();

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $this->subject->_set('view', $view);
        $view->expects(self::once())->method('assign')->with('post', $post);

        $this->subject->showAction($post);
    }
}
