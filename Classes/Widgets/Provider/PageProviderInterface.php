<?php

declare(strict_types=1);

namespace Treupo\SysNoteWidgets\Widgets\Provider;

interface PageProviderInterface
{
    /**
     * @return array
     */
    public function getPages(int $category): array;
}
