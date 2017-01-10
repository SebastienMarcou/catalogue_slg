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
 * Categorie
 */
class Categorie extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
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
     * image
     *
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     * @validate NotEmpty
     */
    protected $image = null;
    
    /**
     * parent
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\CatalogueSLG\CatalogueSlg\Domain\Model\Categorie>
     * @cascade remove
     */
    protected $parent = null;
    
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
        $this->parent = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
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
     * @param \CatalogueSLG\CatalogueSlg\Domain\Model\Categorie $parent
     * @return void
     */
    public function addParent(\CatalogueSLG\CatalogueSlg\Domain\Model\Categorie $parent)
    {
        $this->parent->attach($parent);
    }
    
    /**
     * Removes a Categorie
     *
     * @param \CatalogueSLG\CatalogueSlg\Domain\Model\Categorie $parentToRemove The Categorie to be removed
     * @return void
     */
    public function removeParent(\CatalogueSLG\CatalogueSlg\Domain\Model\Categorie $parentToRemove)
    {
        $this->parent->detach($parentToRemove);
    }
    
    /**
     * Returns the parent
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\CatalogueSLG\CatalogueSlg\Domain\Model\Categorie> $parent
     */
    public function getParent()
    {
        return $this->parent;
    }
    
    /**
     * Sets the parent
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\CatalogueSLG\CatalogueSlg\Domain\Model\Categorie> $parent
     * @return void
     */
    public function setParent(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $parent)
    {
        $this->parent = $parent;
    }

}