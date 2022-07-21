<?php
$EM_CONF[$_EXTKEY] = [
    'title' => 'Sys Note Widgets',
    'description' => 'A collection of widgets which shows a list of sys_notes',
    'category' => 'be',
    'author' => 'Philipp Kuhlmay',
    'state' => 'alpha',
    'version' => '0.1.0',
    'constraints' => [
        'depends' => [
            'typo3' => '11.5.0 - 11.9.99',
            'dashboard' => '11.5.0 - 11.9.99',
            'sys_note' => '11.5.0 - 11.9.99'
        ],
        'conflicts' => [
        ],
        'suggests' => [],
    ],
    'autoload' => [
        'psr-4' => [
            'Treupo\\SysNoteWidgets\\' => 'Classes/'
        ]
    ],
];
