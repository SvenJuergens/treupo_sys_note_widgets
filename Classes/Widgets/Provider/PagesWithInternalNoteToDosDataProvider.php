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
    /**
     * @var int
     */
    private int $category;

    /**
     * @var int
     */
    private int $limit;

    public function __construct(int $category, int $limit)
    {
        $this->category = $category;
        $this->limit = $limit ?: 5;
    }

    public function getPages(): array
    {
        $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)->getQueryBuilderForTable('sys_note');

        $constraints = [
            $queryBuilder->expr()->orX(
                $queryBuilder->expr()->eq('category', $queryBuilder->createNamedParameter($this->category))
            ),
        ];

        $items = [];
        $counter = 0;
        $iterator = 0;

        while ($counter < $this->limit) {
            $row = $queryBuilder
                ->select('*')
                ->from('sys_note')
                ->where(...$constraints)
                ->orderBy('tstamp', 'DESC')
                ->setFirstResult($iterator)
                ->setMaxResults(1)
                ->execute()
                ->fetch();

            $iterator++;

            // If the $row is false, no row is returned from database. All matched $items in array will be returned.
            if($row === false) {
                return $items;
            }

            if (!$this->getBackendUser()->doesUserHaveAccess($row, Permission::PAGE_SHOW)) {
                continue;
            }

            $items[] = $row;
            $counter++;
        }
        return $items;
    }

    protected function getBackendUser(): BackendUserAuthentication
    {
        return $GLOBALS['BE_USER'];
    }
}
