<?php
declare(strict_types=1);
namespace Treupo\SysNoteWidgets\Widgets;

use Treupo\SysNoteWidgets\Widgets\Provider\PageProviderInterface;
use TYPO3\CMS\Core\Authentication\BackendUserAuthentication;
use TYPO3\CMS\Dashboard\Widgets\AdditionalCssInterface;
use TYPO3\CMS\Dashboard\Widgets\ListDataProviderInterface;
use TYPO3\CMS\Dashboard\Widgets\WidgetConfigurationInterface;
use TYPO3\CMS\Dashboard\Widgets\WidgetInterface;
use TYPO3\CMS\Fluid\View\StandaloneView;

class PageOverviewWidget implements WidgetInterface, AdditionalCssInterface
{
    /**
     * @var WidgetConfigurationInterface
     */
    private $configuration;

    /**
     * @var ListDataProviderInterface
     */
    private $dataProvider;

    /**
     * @var StandaloneView
     */
    private $view;

    /**
     * @var array
     */
    private $options;

    public function __construct(
        WidgetConfigurationInterface $configuration,
        PageProviderInterface $dataProvider,
        StandaloneView $view,
        array $options = []
    ) {
        $this->configuration = $configuration;
        $this->dataProvider = $dataProvider;
        $this->view = $view;
        $this->options = array_merge(
            [
                'template' => 'Widget/ExtendedListWidget',
            ],
            $options
        );
    }

    public function renderWidgetContent(): string
    {
        $this->view->setTemplate($this->options['template']);

        $this->view->assignMultiple([
            'pages' => $this->dataProvider->getPages($this->options['category']),
            'options' => $this->options,
            'configuration' => $this->configuration,
            'dateFormat' => $GLOBALS['TYPO3_CONF_VARS']['SYS']['ddmmyy'],
            'timeFormat' => $GLOBALS['TYPO3_CONF_VARS']['SYS']['hhmm'],
        ]);
        return $this->view->render();
    }

    protected function getBackendUser(): BackendUserAuthentication
    {
        return $GLOBALS['BE_USER'];
    }

    public function getCssFiles(): array
    {
        return [
            'EXT:treupo_sys_note_widgets/Resources/Public/Css/widgets.css'
        ];
    }
}
