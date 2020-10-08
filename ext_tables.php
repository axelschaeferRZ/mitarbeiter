<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        if (TYPO3_MODE === 'BE') {

            \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerModule(
                'AxelSchaefer.Mitarbeiter',
                'web', // Make module a submodule of 'web'
                'mitarbeiter', // Submodule key
                '', // Position
                [
                    'Mitarbeiter' => 'list, show, new, create, edit, update, delete',
                ],
                [
                    'access' => 'user,group',
                    'icon'   => 'EXT:mitarbeiter/Resources/Public/Icons/user_mod_mitarbeiter.svg',
                    'labels' => 'LLL:EXT:mitarbeiter/Resources/Private/Language/locallang_mitarbeiter.xlf',
                ]
            );

        }

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('mitarbeiter', 'Configuration/TypoScript', 'mitarbeiter');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_mitarbeiter_domain_model_mitarbeiter', 'EXT:mitarbeiter/Resources/Private/Language/locallang_csh_tx_mitarbeiter_domain_model_mitarbeiter.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_mitarbeiter_domain_model_mitarbeiter');

    }
);
