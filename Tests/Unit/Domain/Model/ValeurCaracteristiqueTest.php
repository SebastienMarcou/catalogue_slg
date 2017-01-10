<?php

namespace CatalogueSLG\CatalogueSlg\Tests\Unit\Domain\Model;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2017 Gregory Prince
 *           Loïc Gouttefangeas
 *           Sébastien Marcou
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
 * Test case for class \CatalogueSLG\CatalogueSlg\Domain\Model\ValeurCaracteristique.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @author Gregory Prince 
 * @author Loïc Gouttefangeas 
 * @author Sébastien Marcou 
 */
class ValeurCaracteristiqueTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
	/**
	 * @var \CatalogueSLG\CatalogueSlg\Domain\Model\ValeurCaracteristique
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = new \CatalogueSLG\CatalogueSlg\Domain\Model\ValeurCaracteristique();
	}

	public function tearDown()
	{
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function getValeurReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getValeur()
		);
	}

	/**
	 * @test
	 */
	public function setValeurForStringSetsValeur()
	{
		$this->subject->setValeur('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'valeur',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getProduitReturnsInitialValueForProduit()
	{
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->subject->getProduit()
		);
	}

	/**
	 * @test
	 */
	public function setProduitForObjectStorageContainingProduitSetsProduit()
	{
		$produit = new \CatalogueSLG\CatalogueSlg\Domain\Model\Produit();
		$objectStorageHoldingExactlyOneProduit = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$objectStorageHoldingExactlyOneProduit->attach($produit);
		$this->subject->setProduit($objectStorageHoldingExactlyOneProduit);

		$this->assertAttributeEquals(
			$objectStorageHoldingExactlyOneProduit,
			'produit',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function addProduitToObjectStorageHoldingProduit()
	{
		$produit = new \CatalogueSLG\CatalogueSlg\Domain\Model\Produit();
		$produitObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('attach'), array(), '', FALSE);
		$produitObjectStorageMock->expects($this->once())->method('attach')->with($this->equalTo($produit));
		$this->inject($this->subject, 'produit', $produitObjectStorageMock);

		$this->subject->addProduit($produit);
	}

	/**
	 * @test
	 */
	public function removeProduitFromObjectStorageHoldingProduit()
	{
		$produit = new \CatalogueSLG\CatalogueSlg\Domain\Model\Produit();
		$produitObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('detach'), array(), '', FALSE);
		$produitObjectStorageMock->expects($this->once())->method('detach')->with($this->equalTo($produit));
		$this->inject($this->subject, 'produit', $produitObjectStorageMock);

		$this->subject->removeProduit($produit);

	}

	/**
	 * @test
	 */
	public function getCaracteristiqueReturnsInitialValueForCaracteristique()
	{
		$this->assertEquals(
			NULL,
			$this->subject->getCaracteristique()
		);
	}

	/**
	 * @test
	 */
	public function setCaracteristiqueForCaracteristiqueSetsCaracteristique()
	{
		$caracteristiqueFixture = new \CatalogueSLG\CatalogueSlg\Domain\Model\Caracteristique();
		$this->subject->setCaracteristique($caracteristiqueFixture);

		$this->assertAttributeEquals(
			$caracteristiqueFixture,
			'caracteristique',
			$this->subject
		);
	}
}
