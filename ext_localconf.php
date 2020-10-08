<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'AxelSchaefer.Mitarbeiter',
            'Mitarbeiter',
            [
                'Mitarbeiter' => 'list, show, new, create, edit, update, delete'
            ],
            // non-cacheable actions
            [
                'Mitarbeiter' => 'create, update, delete'
            ]
        );

        // wizards
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
            'mod {
                wizards.newContentElement.wizardItems.plugins {
                    elements {
                        mitarbeiter {
                            iconIdentifier = mitarbeiter-plugin-mitarbeiter
                            title = LLL:EXT:mitarbeiter/Resources/Private/Language/locallang_db.xlf:tx_mitarbeiter_mitarbeiter.name
                            description = LLL:EXT:mitarbeiter/Resources/Private/Language/locallang_db.xlf:tx_mitarbeiter_mitarbeiter.description
                            tt_content_defValues {
                                CType = list
                                list_type = mitarbeiter_mitarbeiter
                            }
                        }
                    }
                    show = *
                }
           }'
        );
		$iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
		
			$iconRegistry->registerIcon(
				'mitarbeiter-plugin-mitarbeiter',
				\TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
				['source' => 'EXT:mitarbeiter/Resources/Public/Icons/user_plugin_mitarbeiter.svg']
			);
		
    }
);
