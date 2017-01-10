<?php
namespace CatalogueSLG\CatalogueSlg\Controller;

/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2016 Gregory Prince
 *           Loïc Gouttefangeas
 *           Sébastien Marcou
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * MarchandController
 */
class MarchandController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * marchandRepository
     *
     * @var \CatalogueSLG\CatalogueSlg\Domain\Repository\MarchandRepository
     * @inject
     */
    protected $marchandRepository = NULL;
    
    /**
     * action show
     *
     * @param \CatalogueSLG\CatalogueSlg\Domain\Model\Marchand $marchand
     * @return void
     */
    public function showAction(\CatalogueSLG\CatalogueSlg\Domain\Model\Marchand $marchand)
    {
        $this->view->assign('marchand', $marchand);
    }
    
    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        $marchands = $this->marchandRepository->findAll();
        $this->view->assign('marchands', $marchands);
    }

}