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
 * ValeurCaracteristique
 */
class ValeurCaracteristique extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * valeur
     *
     * @var string
     */
    protected $valeur = '';
    
    /**
     * produit
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\CatalogueSLG\CatalogueSlg\Domain\Model\Produit>
     * @cascade remove
     */
    protected $produit = null;
    
    /**
     * caracteristique
     *
     * @var \CatalogueSLG\CatalogueSlg\Domain\Model\Caracteristique
     */
    protected $caracteristique = null;
    
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
        $this->produit = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }
    
    /**
     * Returns the valeur
     *
     * @return string $valeur
     */
    public function getValeur()
    {
        return $this->valeur;
    }
    
    /**
     * Sets the valeur
     *
     * @param string $valeur
     * @return void
     */
    public function setValeur($valeur)
    {
        $this->valeur = $valeur;
    }
    
    /**
     * Adds a Produit
     *
     * @param \CatalogueSLG\CatalogueSlg\Domain\Model\Produit $produit
     * @return void
     */
    public function addProduit(\CatalogueSLG\CatalogueSlg\Domain\Model\Produit $produit)
    {
        $this->produit->attach($produit);
    }
    
    /**
     * Removes a Produit
     *
     * @param \CatalogueSLG\CatalogueSlg\Domain\Model\Produit $produitToRemove The Produit to be removed
     * @return void
     */
    public function removeProduit(\CatalogueSLG\CatalogueSlg\Domain\Model\Produit $produitToRemove)
    {
        $this->produit->detach($produitToRemove);
    }
    
    /**
     * Returns the produit
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\CatalogueSLG\CatalogueSlg\Domain\Model\Produit> $produit
     */
    public function getProduit()
    {
        return $this->produit;
    }
    
    /**
     * Sets the produit
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\CatalogueSLG\CatalogueSlg\Domain\Model\Produit> $produit
     * @return void
     */
    public function setProduit(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $produit)
    {
        $this->produit = $produit;
    }
    
    /**
     * Returns the caracteristique
     *
     * @return \CatalogueSLG\CatalogueSlg\Domain\Model\Caracteristique $caracteristique
     */
    public function getCaracteristique()
    {
        return $this->caracteristique;
    }
    
    /**
     * Sets the caracteristique
     *
     * @param \CatalogueSLG\CatalogueSlg\Domain\Model\Caracteristique $caracteristique
     * @return void
     */
    public function setCaracteristique(\CatalogueSLG\CatalogueSlg\Domain\Model\Caracteristique $caracteristique)
    {
        $this->caracteristique = $caracteristique;
    }

}