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
 * Test case for class \CatalogueSLG\CatalogueSlg\Domain\Model\Produit.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @author Gregory Prince 
 * @author Loïc Gouttefangeas 
 * @author Sébastien Marcou 
 */
class ProduitTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
	/**
	 * @var \CatalogueSLG\CatalogueSlg\Domain\Model\Produit
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = new \CatalogueSLG\CatalogueSlg\Domain\Model\Produit();
	}

	public function tearDown()
	{
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function getNomReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getNom()
		);
	}

	/**
	 * @test
	 */
	public function setNomForStringSetsNom()
	{
		$this->subject->setNom('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'nom',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getDescriptionReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getDescription()
		);
	}

	/**
	 * @test
	 */
	public function setDescriptionForStringSetsDescription()
	{
		$this->subject->setDescription('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'description',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getDateSortieReturnsInitialValueForDateTime()
	{
		$this->assertEquals(
			NULL,
			$this->subject->getDateSortie()
		);
	}

	/**
	 * @test
	 */
	public function setDateSortieForDateTimeSetsDateSortie()
	{
		$dateTimeFixture = new \DateTime();
		$this->subject->setDateSortie($dateTimeFixture);

		$this->assertAttributeEquals(
			$dateTimeFixture,
			'dateSortie',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getImageReturnsInitialValueForFileReference()
	{
		$this->assertEquals(
			NULL,
			$this->subject->getImage()
		);
	}

	/**
	 * @test
	 */
	public function setImageForFileReferenceSetsImage()
	{
		$fileReferenceFixture = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
		$this->subject->setImage($fileReferenceFixture);

		$this->assertAttributeEquals(
			$fileReferenceFixture,
			'image',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getCategorieReturnsInitialValueForCategorie()
	{
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->subject->getCategorie()
		);
	}

	/**
	 * @test
	 */
	public function setCategorieForObjectStorageContainingCategorieSetsCategorie()
	{
		$categorie = new \CatalogueSLG\CatalogueSlg\Domain\Model\Categorie();
		$objectStorageHoldingExactlyOneCategorie = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$objectStorageHoldingExactlyOneCategorie->attach($categorie);
		$this->subject->setCategorie($objectStorageHoldingExactlyOneCategorie);

		$this->assertAttributeEquals(
			$objectStorageHoldingExactlyOneCategorie,
			'categorie',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function addCategorieToObjectStorageHoldingCategorie()
	{
		$categorie = new \CatalogueSLG\CatalogueSlg\Domain\Model\Categorie();
		$categorieObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('attach'), array(), '', FALSE);
		$categorieObjectStorageMock->expects($this->once())->method('attach')->with($this->equalTo($categorie));
		$this->inject($this->subject, 'categorie', $categorieObjectStorageMock);

		$this->subject->addCategorie($categorie);
	}

	/**
	 * @test
	 */
	public function removeCategorieFromObjectStorageHoldingCategorie()
	{
		$categorie = new \CatalogueSLG\CatalogueSlg\Domain\Model\Categorie();
		$categorieObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('detach'), array(), '', FALSE);
		$categorieObjectStorageMock->expects($this->once())->method('detach')->with($this->equalTo($categorie));
		$this->inject($this->subject, 'categorie', $categorieObjectStorageMock);

		$this->subject->removeCategorie($categorie);

	}

	/**
	 * @test
	 */
	public function getMarchandsReturnsInitialValueForMarchand()
	{
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->subject->getMarchands()
		);
	}

	/**
	 * @test
	 */
	public function setMarchandsForObjectStorageContainingMarchandSetsMarchands()
	{
		$marchand = new \CatalogueSLG\CatalogueSlg\Domain\Model\Marchand();
		$objectStorageHoldingExactlyOneMarchands = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$objectStorageHoldingExactlyOneMarchands->attach($marchand);
		$this->subject->setMarchands($objectStorageHoldingExactlyOneMarchands);

		$this->assertAttributeEquals(
			$objectStorageHoldingExactlyOneMarchands,
			'marchands',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function addMarchandToObjectStorageHoldingMarchands()
	{
		$marchand = new \CatalogueSLG\CatalogueSlg\Domain\Model\Marchand();
		$marchandsObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('attach'), array(), '', FALSE);
		$marchandsObjectStorageMock->expects($this->once())->method('attach')->with($this->equalTo($marchand));
		$this->inject($this->subject, 'marchands', $marchandsObjectStorageMock);

		$this->subject->addMarchand($marchand);
	}

	/**
	 * @test
	 */
	public function removeMarchandFromObjectStorageHoldingMarchands()
	{
		$marchand = new \CatalogueSLG\CatalogueSlg\Domain\Model\Marchand();
		$marchandsObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('detach'), array(), '', FALSE);
		$marchandsObjectStorageMock->expects($this->once())->method('detach')->with($this->equalTo($marchand));
		$this->inject($this->subject, 'marchands', $marchandsObjectStorageMock);

		$this->subject->removeMarchand($marchand);

	}

	/**
	 * @test
	 */
	public function getPointDeVenteReturnsInitialValueForMarchand()
	{
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->subject->getPointDeVente()
		);
	}

	/**
	 * @test
	 */
	public function setPointDeVenteForObjectStorageContainingMarchandSetsPointDeVente()
	{
		$pointDeVente = new \CatalogueSLG\CatalogueSlg\Domain\Model\Marchand();
		$objectStorageHoldingExactlyOnePointDeVente = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$objectStorageHoldingExactlyOnePointDeVente->attach($pointDeVente);
		$this->subject->setPointDeVente($objectStorageHoldingExactlyOnePointDeVente);

		$this->assertAttributeEquals(
			$objectStorageHoldingExactlyOnePointDeVente,
			'pointDeVente',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function addPointDeVenteToObjectStorageHoldingPointDeVente()
	{
		$pointDeVente = new \CatalogueSLG\CatalogueSlg\Domain\Model\Marchand();
		$pointDeVenteObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('attach'), array(), '', FALSE);
		$pointDeVenteObjectStorageMock->expects($this->once())->method('attach')->with($this->equalTo($pointDeVente));
		$this->inject($this->subject, 'pointDeVente', $pointDeVenteObjectStorageMock);

		$this->subject->addPointDeVente($pointDeVente);
	}

	/**
	 * @test
	 */
	public function removePointDeVenteFromObjectStorageHoldingPointDeVente()
	{
		$pointDeVente = new \CatalogueSLG\CatalogueSlg\Domain\Model\Marchand();
		$pointDeVenteObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('detach'), array(), '', FALSE);
		$pointDeVenteObjectStorageMock->expects($this->once())->method('detach')->with($this->equalTo($pointDeVente));
		$this->inject($this->subject, 'pointDeVente', $pointDeVenteObjectStorageMock);

		$this->subject->removePointDeVente($pointDeVente);

	}
}
