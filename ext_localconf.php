<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'CatalogueSLG.' . $_EXTKEY,
	'Pi1',
	array(
		'Produit' => 'list, show, focus',
		'Categorie' => 'list, show',
		'Marchand' => 'list, show',
		
	),
	// non-cacheable actions
	array(
		'Produit' => '',
		'Categorie' => '',
		'Marchand' => '',
		'ValeurCaracteristique' => '',
		
	)
);
