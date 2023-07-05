<?php

if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

call_user_func(static function () {
    if (TYPO3_MODE === 'BE') {
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTypoScriptSetup(
            '
module.tx_dashboard {
    view {
        templateRootPaths.557676000 = EXT:treupo_sys_note_widgets/Resources/Private/Templates/
        partialRootPaths.557676000 = EXT:treupo_sys_note_widgets/Resources/Private/Partials/
        layoutRootPaths.557676000 = EXT:treupo_sys_note_widgets/Resources/Private/Layouts/
    }
}'
        );
    }
});
