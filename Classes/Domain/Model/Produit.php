<?php
namespace CatalogueSLG\CatalogueSlg\Domain\Model;

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
 * Produit
 */
class Produit extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * nom
     *
     * @var string
     * @validate NotEmpty
     */
    protected $nom = '';
    
    /**
     * description
     *
     * @var string
     */
    protected $description = '';
    
    /**
     * dateSortie
     *
     * @var \DateTime
     * @validate NotEmpty
     */
    protected $dateSortie = null;
    
    /**
     * image
     *
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     */
    protected $image = null;
    
    /**
     * categorie
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\CatalogueSLG\CatalogueSlg\Domain\Model\Categorie>
     * @cascade remove
     */
    protected $categorie = null;
    
    /**
     * marchands
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\CatalogueSLG\CatalogueSlg\Domain\Model\Marchand>
     * @cascade remove
     */
    protected $marchands = null;
    
    /**
     * pointDeVente
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\CatalogueSLG\CatalogueSlg\Domain\Model\Marchand>
     * @cascade remove
     */
    protected $pointDeVente = null;
    
    /**
     * __construct
     */
    public function __construct()
    {
        //Do not remove the next line: It would break the functionality
        $this->initStorageObjects();
    }
    
    /**
     * Initializes all ObjectStorage properties
     * Do not modify this method!
     * It will be rewritten on each save in the extension builder
     * You may modify the constructor of this class instead
     *
     * @return void
     */
    protected function initStorageObjects()
    {
        $this->categorie = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->marchands = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->pointDeVente = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }
    
    /**
     * Returns the nom
     *
     * @return string $nom
     */
    public function getNom()
    {
        return $this->nom;
    }
    
    /**
     * Sets the nom
     *
     * @param string $nom
     * @return void
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }
    
    /**
     * Returns the description
     *
     * @return string $description
     */
    public function getDescription()
    {
        return $this->description;
    }
    
    /**
     * Sets the description
     *
     * @param string $description
     * @return void
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }
    
    /**
     * Returns the dateSortie
     *
     * @return \DateTime $dateSortie
     */
    public function getDateSortie()
    {
        return $this->dateSortie;
    }
    
    /**
     * Sets the dateSortie
     *
     * @param \DateTime $dateSortie
     * @return void
     */
    public function setDateSortie(\DateTime $dateSortie)
    {
        $this->dateSortie = $dateSortie;
    }
    
    /**
     * Returns the image
     *
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $image
     */
    public function getImage()
    {
        return $this->image;
    }
    
    /**
     * Sets the image
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $image
     * @return void
     */
    public function setImage(\TYPO3\CMS\Extbase\Domain\Model\FileReference $image)
    {
        $this->image = $image;
    }
    
    /**
     * Adds a Categorie
     *
     * @param \CatalogueSLG\CatalogueSlg\Domain\Model\Categorie $categorie
     * @return void
     */
    public function addCategorie(\CatalogueSLG\CatalogueSlg\Domain\Model\Categorie $categorie)
    {
        $this->categorie->attach($categorie);
    }
    
    /**
     * Removes a Categorie
     *
     * @param \CatalogueSLG\CatalogueSlg\Domain\Model\Categorie $categorieToRemove The Categorie to be removed
     * @return void
     */
    public function removeCategorie(\CatalogueSLG\CatalogueSlg\Domain\Model\Categorie $categorieToRemove)
    {
        $this->categorie->detach($categorieToRemove);
    }
    
    /**
     * Returns the categorie
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\CatalogueSLG\CatalogueSlg\Domain\Model\Categorie> $categorie
     */
    public function getCategorie()
    {
        return $this->categorie;
    }
    
    /**
     * Sets the categorie
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\CatalogueSLG\CatalogueSlg\Domain\Model\Categorie> $categorie
     * @return void
     */
    public function setCategorie(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $categorie)
    {
        $this->categorie = $categorie;
    }
    
    /**
     * Adds a Marchand
     *
     * @param \CatalogueSLG\CatalogueSlg\Domain\Model\Marchand $pointDeVente
     * @return void
     */
    public function addPointDeVente(\CatalogueSLG\CatalogueSlg\Domain\Model\Marchand $pointDeVente)
    {
        $this->pointDeVente->attach($pointDeVente);
    }
    
    /**
     * Removes a Marchand
     *
     * @param \CatalogueSLG\CatalogueSlg\Domain\Model\Marchand $pointDeVenteToRemove The Marchand to be removed
     * @return void
     */
    public function removePointDeVente(\CatalogueSLG\CatalogueSlg\Domain\Model\Marchand $pointDeVenteToRemove)
    {
        $this->pointDeVente->detach($pointDeVenteToRemove);
    }
    
    /**
     * Returns the pointDeVente
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\CatalogueSLG\CatalogueSlg\Domain\Model\Marchand> $pointDeVente
     */
    public function getPointDeVente()
    {
        return $this->pointDeVente;
    }
    
    /**
     * Sets the pointDeVente
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\CatalogueSLG\CatalogueSlg\Domain\Model\Marchand> $pointDeVente
     * @return void
     */
    public function setPointDeVente(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $pointDeVente)
    {
        $this->pointDeVente = $pointDeVente;
    }
    
    /**
     * Adds a Marchand
     *
     * @param \CatalogueSLG\CatalogueSlg\Domain\Model\Marchand $marchand
     * @return void
     */
    public function addMarchand(\CatalogueSLG\CatalogueSlg\Domain\Model\Marchand $marchand)
    {
        $this->marchands->attach($marchands);
    }
    
    /**
     * Removes a Marchand
     *
     * @param \CatalogueSLG\CatalogueSlg\Domain\Model\Marchand $marchandToRemove The Marchand to be removed
     * @return void
     */
    public function removeMarchand(\CatalogueSLG\CatalogueSlg\Domain\Model\Marchand $marchandToRemove)
    {
        $this->marchands->detach($marchandToRemove);
    }
    
    /**
     * Returns the marchands
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\CatalogueSLG\CatalogueSlg\Domain\Model\Marchand> marchands
     */
    public function getMarchands()
    {
        return $this->marchands;
    }
    
    /**
     * Sets the marchands
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\CatalogueSLG\CatalogueSlg\Domain\Model\Marchand> $marchands
     * @return void
     */
    public function setMarchands(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $marchands)
    {
        $this->marchands = $marchands;
    }

}