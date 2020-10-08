<?php
namespace AxelSchaefer\Mitarbeiter\Controller;


/***
 *
 * This file is part of the "mitarbeiter" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2020 
 *
 ***/
/**
 * MitarbeiterController
 */
class MitarbeiterController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * mitarbeiterRepository
     * 
     * @var \AxelSchaefer\Mitarbeiter\Domain\Repository\MitarbeiterRepository
     */
    protected $mitarbeiterRepository = null;

    /**
     * @param \AxelSchaefer\Mitarbeiter\Domain\Repository\MitarbeiterRepository $mitarbeiterRepository
     */
    public function injectMitarbeiterRepository(\AxelSchaefer\Mitarbeiter\Domain\Repository\MitarbeiterRepository $mitarbeiterRepository)
    {
        $this->mitarbeiterRepository = $mitarbeiterRepository;
    }

    /**
     * action list
     * 
     * @return void
     */
    public function listAction()
    {
        //eine Änderung
        //12345
        $mitarbeiters = $this->mitarbeiterRepository->findAll();
        $this->view->assign('mitarbeiters', $mitarbeiters);
    }

    /**
     * action show
     * 
     * @param \AxelSchaefer\Mitarbeiter\Domain\Model\Mitarbeiter $mitarbeiter
     * @return void
     */
    public function showAction(\AxelSchaefer\Mitarbeiter\Domain\Model\Mitarbeiter $mitarbeiter)
    {
        $this->view->assign('mitarbeiter', $mitarbeiter);
    }

    /**
     * action new
     * 
     * @return void
     */
    public function newAction()
    {
    }

    /**
     * action create
     * 
     * @param \AxelSchaefer\Mitarbeiter\Domain\Model\Mitarbeiter $newMitarbeiter
     * @return void
     */
    public function createAction(\AxelSchaefer\Mitarbeiter\Domain\Model\Mitarbeiter $newMitarbeiter)
    {
        $this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->mitarbeiterRepository->add($newMitarbeiter);
        $this->redirect('list');
    }

    /**
     * action edit
     * 
     * @param \AxelSchaefer\Mitarbeiter\Domain\Model\Mitarbeiter $mitarbeiter
     * @ignorevalidation $mitarbeiter
     * @return void
     */
    public function editAction(\AxelSchaefer\Mitarbeiter\Domain\Model\Mitarbeiter $mitarbeiter)
    {
        $this->view->assign('mitarbeiter', $mitarbeiter);
    }

    /**
     * action update
     * 
     * @param \AxelSchaefer\Mitarbeiter\Domain\Model\Mitarbeiter $mitarbeiter
     * @return void
     */
    public function updateAction(\AxelSchaefer\Mitarbeiter\Domain\Model\Mitarbeiter $mitarbeiter)
    {
        $this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->mitarbeiterRepository->update($mitarbeiter);
        $this->redirect('list');
    }

    /**
     * action delete
     * 
     * @param \AxelSchaefer\Mitarbeiter\Domain\Model\Mitarbeiter $mitarbeiter
     * @return void
     */
    public function deleteAction(\AxelSchaefer\Mitarbeiter\Domain\Model\Mitarbeiter $mitarbeiter)
    {
        $this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->mitarbeiterRepository->remove($mitarbeiter);
        $this->redirect('list');
    }
}
