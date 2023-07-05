<?php

use TYPO3\CMS\Core\Core\SystemEnvironmentBuilder;
use TYPO3\CMS\Core\Http\ApplicationType;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

defined('TYPO3') or die();

ExtensionManagementUtility::addTypoScriptSetup(
'module.tx_dashboard {
    view {
        templateRootPaths.557676000 = EXT:treupo_sys_note_widgets/Resources/Private/Templates/
        partialRootPaths.557676000 = EXT:treupo_sys_note_widgets/Resources/Private/Partials/
        layoutRootPaths.557676000 = EXT:treupo_sys_note_widgets/Resources/Private/Layouts/
    }
}'
);

