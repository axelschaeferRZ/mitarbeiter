<?php
namespace AxelSchaefer\Mitarbeiter\Tests\Unit\Controller;

/**
 * Test case.
 */
class MitarbeiterControllerTest extends \TYPO3\TestingFramework\Core\Unit\UnitTestCase
{
    /**
     * @var \AxelSchaefer\Mitarbeiter\Controller\MitarbeiterController
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder(\AxelSchaefer\Mitarbeiter\Controller\MitarbeiterController::class)
            ->setMethods(['redirect', 'forward', 'addFlashMessage'])
            ->disableOriginalConstructor()
            ->getMock();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function listActionFetchesAllMitarbeitersFromRepositoryAndAssignsThemToView()
    {

        $allMitarbeiters = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $mitarbeiterRepository = $this->getMockBuilder(\AxelSchaefer\Mitarbeiter\Domain\Repository\MitarbeiterRepository::class)
            ->setMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $mitarbeiterRepository->expects(self::once())->method('findAll')->will(self::returnValue($allMitarbeiters));
        $this->inject($this->subject, 'mitarbeiterRepository', $mitarbeiterRepository);

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('mitarbeiters', $allMitarbeiters);
        $this->inject($this->subject, 'view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenMitarbeiterToView()
    {
        $mitarbeiter = new \AxelSchaefer\Mitarbeiter\Domain\Model\Mitarbeiter();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('mitarbeiter', $mitarbeiter);

        $this->subject->showAction($mitarbeiter);
    }

    /**
     * @test
     */
    public function createActionAddsTheGivenMitarbeiterToMitarbeiterRepository()
    {
        $mitarbeiter = new \AxelSchaefer\Mitarbeiter\Domain\Model\Mitarbeiter();

        $mitarbeiterRepository = $this->getMockBuilder(\AxelSchaefer\Mitarbeiter\Domain\Repository\MitarbeiterRepository::class)
            ->setMethods(['add'])
            ->disableOriginalConstructor()
            ->getMock();

        $mitarbeiterRepository->expects(self::once())->method('add')->with($mitarbeiter);
        $this->inject($this->subject, 'mitarbeiterRepository', $mitarbeiterRepository);

        $this->subject->createAction($mitarbeiter);
    }

    /**
     * @test
     */
    public function editActionAssignsTheGivenMitarbeiterToView()
    {
        $mitarbeiter = new \AxelSchaefer\Mitarbeiter\Domain\Model\Mitarbeiter();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('mitarbeiter', $mitarbeiter);

        $this->subject->editAction($mitarbeiter);
    }

    /**
     * @test
     */
    public function updateActionUpdatesTheGivenMitarbeiterInMitarbeiterRepository()
    {
        $mitarbeiter = new \AxelSchaefer\Mitarbeiter\Domain\Model\Mitarbeiter();

        $mitarbeiterRepository = $this->getMockBuilder(\AxelSchaefer\Mitarbeiter\Domain\Repository\MitarbeiterRepository::class)
            ->setMethods(['update'])
            ->disableOriginalConstructor()
            ->getMock();

        $mitarbeiterRepository->expects(self::once())->method('update')->with($mitarbeiter);
        $this->inject($this->subject, 'mitarbeiterRepository', $mitarbeiterRepository);

        $this->subject->updateAction($mitarbeiter);
    }

    /**
     * @test
     */
    public function deleteActionRemovesTheGivenMitarbeiterFromMitarbeiterRepository()
    {
        $mitarbeiter = new \AxelSchaefer\Mitarbeiter\Domain\Model\Mitarbeiter();

        $mitarbeiterRepository = $this->getMockBuilder(\AxelSchaefer\Mitarbeiter\Domain\Repository\MitarbeiterRepository::class)
            ->setMethods(['remove'])
            ->disableOriginalConstructor()
            ->getMock();

        $mitarbeiterRepository->expects(self::once())->method('remove')->with($mitarbeiter);
        $this->inject($this->subject, 'mitarbeiterRepository', $mitarbeiterRepository);

        $this->subject->deleteAction($mitarbeiter);
    }
}
