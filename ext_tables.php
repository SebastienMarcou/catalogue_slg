<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'CatalogueSLG.' . $_EXTKEY,
	'Pi1',
	'Catalogue_slg'
);

$pluginSignature = str_replace('_','',$_EXTKEY) . '_pi1';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue($pluginSignature, 'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForms/flexform_pi1.xml');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Catalogue_SLG');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_catalogueslg_domain_model_produit', 'EXT:catalogue_slg/Resources/Private/Language/locallang_csh_tx_catalogueslg_domain_model_produit.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_catalogueslg_domain_model_produit');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_catalogueslg_domain_model_categorie', 'EXT:catalogue_slg/Resources/Private/Language/locallang_csh_tx_catalogueslg_domain_model_categorie.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_catalogueslg_domain_model_categorie');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_catalogueslg_domain_model_marchand', 'EXT:catalogue_slg/Resources/Private/Language/locallang_csh_tx_catalogueslg_domain_model_marchand.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_catalogueslg_domain_model_marchand');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_catalogueslg_domain_model_valeurcaracteristique', 'EXT:catalogue_slg/Resources/Private/Language/locallang_csh_tx_catalogueslg_domain_model_valeurcaracteristique.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_catalogueslg_domain_model_valeurcaracteristique');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_catalogueslg_domain_model_caracteristique', 'EXT:catalogue_slg/Resources/Private/Language/locallang_csh_tx_catalogueslg_domain_model_caracteristique.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_catalogueslg_domain_model_caracteristique');
