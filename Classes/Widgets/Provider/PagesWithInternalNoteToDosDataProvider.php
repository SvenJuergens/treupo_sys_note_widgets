<?php
declare(strict_types=1);
namespace Treupo\SysNoteWidgets\Widgets\Provider;

use TYPO3\CMS\Backend\Routing\UriBuilder;
use TYPO3\CMS\Core\Authentication\BackendUserAuthentication;
use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Type\Bitmask\Permission;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;

class PagesWithInternalNoteToDosDataProvider implements PageProviderInterface
{
    public function __construct()
    {

    }

    public function getPages(int $category): array
    {
        $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)->getQueryBuilderForTable('sys_note');

        $constraints = [
            $queryBuilder->expr()->orX($queryBuilder->expr()->eq('category', $queryBuilder->createNamedParameter($category))),
        ];

        return $queryBuilder
            ->select('*')
            ->from('sys_note')
            ->where(...$constraints)->orderBy('tstamp', 'DESC')->execute()
            ->fetchAllAssociative();
    }
}
