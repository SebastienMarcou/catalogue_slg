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
 * ValeurCaracteristiqueController
 */
class ValeurCaracteristiqueController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        $valeurCaracteristiques = $this->valeurCaracteristiqueRepository->findAll();
        $this->view->assign('valeurCaracteristiques', $valeurCaracteristiques);
    }
    
    /**
     * action show
     *
     * @param \CatalogueSLG\CatalogueSlg\Domain\Model\ValeurCaracteristique $valeurCaracteristique
     * @return void
     */
    public function showAction(\CatalogueSLG\CatalogueSlg\Domain\Model\ValeurCaracteristique $valeurCaracteristique)
    {
        $this->view->assign('valeurCaracteristique', $valeurCaracteristique);
    }

}