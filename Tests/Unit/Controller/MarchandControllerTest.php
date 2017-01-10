<?php
namespace CatalogueSLG\CatalogueSlg\Tests\Unit\Controller;
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2017 Gregory Prince 
 *  			Loïc Gouttefangeas 
 *  			Sébastien Marcou 
 *  			
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
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
 * Test case for class CatalogueSLG\CatalogueSlg\Controller\MarchandController.
 *
 * @author Gregory Prince 
 * @author Loïc Gouttefangeas 
 * @author Sébastien Marcou 
 */
class MarchandControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{

	/**
	 * @var \CatalogueSLG\CatalogueSlg\Controller\MarchandController
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = $this->getMock('CatalogueSLG\\CatalogueSlg\\Controller\\MarchandController', array('redirect', 'forward', 'addFlashMessage'), array(), '', FALSE);
	}

	public function tearDown()
	{
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function listActionFetchesAllMarchandsFromRepositoryAndAssignsThemToView()
	{

		$allMarchands = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array(), array(), '', FALSE);

		$marchandRepository = $this->getMock('CatalogueSLG\\CatalogueSlg\\Domain\\Repository\\MarchandRepository', array('findAll'), array(), '', FALSE);
		$marchandRepository->expects($this->once())->method('findAll')->will($this->returnValue($allMarchands));
		$this->inject($this->subject, 'marchandRepository', $marchandRepository);

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$view->expects($this->once())->method('assign')->with('marchands', $allMarchands);
		$this->inject($this->subject, 'view', $view);

		$this->subject->listAction();
	}

	/**
	 * @test
	 */
	public function showActionAssignsTheGivenMarchandToView()
	{
		$marchand = new \CatalogueSLG\CatalogueSlg\Domain\Model\Marchand();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('marchand', $marchand);

		$this->subject->showAction($marchand);
	}
}
