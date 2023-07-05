<?php
$EM_CONF[$_EXTKEY] = [
    'title' => 'Sys Note Widgets',
    'description' => 'A collection of widgets which shows a list of sys_notes',
    'category' => 'be',
    'author' => 'Philipp Kuhlmay',
    'state' => 'stable',
    'version' => '1.2.0',
    'constraints' => [
        'depends' => [
            'typo3' => '10.4.0 - 11.9.99',
            'dashboard' => '10.4.0 - 11.9.99',
            'sys_note' => '10.4.0 - 11.9.99'
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
