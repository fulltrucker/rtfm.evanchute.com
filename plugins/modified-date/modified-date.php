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
        // Only do something if the page type is in our list of allowed types
        $allowedPageTypes = $this->config->get('plugins.modified-date.page_types', []);
        $pageType = $this->grav['page']->template();
        $pageType = ucfirst($pageType);
        if (in_array($pageType, $allowedPageTypes)) {

            // Get variables from the plugin configuration
            $pretext = $this->grav['config']->get('plugins.modified-date.pretext');
            $placement = $this->grav['config']->get('plugins.modified-date.placement');
    
            // Get the current raw content
            $content = $e['page']->getRawContent();
            
            // Modify the output with the pre-text, modified date, and chuck it back on the page
            if ($placement == 'top') {
                $e['page']->setRawContent("_**" . $pretext . "** {{ page.modified|date('n-j-Y') }}_\n\n---\n\n" . $content);
            } else {
                $e['page']->setRawContent($content . "\n\n---\n\n_**" . $pretext . "** {{ page.modified|date('n-j-Y') }}_");          
            }
        }
    }
}
