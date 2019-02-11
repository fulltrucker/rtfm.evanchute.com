<?php
namespace Grav\Plugin;
use Grav\Common\Plugin;
use RocketTheme\Toolbox\Event\Event;
/**
 * Class ModifiedDatePlugin
 * @package Grav\Plugin
 */
class ModifiedDatePlugin extends Plugin
{
    /**
     * @return array
     *
     * The getSubscribedEvents() gives the core a list of events
     *     that the plugin wants to listen to. The key of each
     *     array section is the event that the plugin listens to
     *     and the value (in the form of an array) contains the
     *     callable (or function) as well as the priority. The
     *     higher the number the higher the priority.
     */
    public static function getSubscribedEvents()
    {
        return [
            'onPluginsInitialized' => ['onPluginsInitialized', 0]
        ];
    }
    /**
     * Initialize the plugin
     */
    public function onPluginsInitialized()
    {
        // Don't proceed if we are in the admin plugin
        if ($this->isAdmin()) {
            return;
        }
        // Enable the main event we are interested in
        $this->enable([
            'onPageContentRaw' => ['onPageContentRaw', 0]
        ]);
    }
    /**
     * @param Event $e
     */
    public function onPageContentRaw(Event $e)
    {
        $page = $e['page'];
        $config = $this->mergeConfig($page);

        if ($config->get('enabled')) {
            $allowedPageTypes = $this->config->get('plugins.modified-date.page_types', []);
            // We have to normalize the value we get from template() to match the format of the value we get in $allowedPageTypes
            $pageType = ucfirst($this->grav['page']->template());
            if (in_array($pageType, $allowedPageTypes)) {
                $content = $e['page']->getRawContent();
                // Make a human date from the Unix timestamp
                $modifiedDate = date('n-j-Y', $this->grav['page']->modified());
                $pretext = $this->grav['config']->get('plugins.modified-date.pretext') . " ";
                $placement = $this->grav['config']->get('plugins.modified-date.placement');
                    
                // Modifying the rawContent output with our blocks and chucking it all back on the page
                // is the most universal, theme-agnostic method we can think of to make this happen
                if ($placement == 'top') {
                    $e['page']->setRawContent($pretext . $modifiedDate . "\n\n---\n\n" . $content);
                } else {
                    $e['page']->setRawContent($content . "\n\n---\n\n" . $pretext . $modifiedDate);          
                }
            }
        }
    }
}