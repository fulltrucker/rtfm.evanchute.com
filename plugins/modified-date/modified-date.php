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
        $pageType = ucfirst($this->grav['page']->template());
        if (in_array($pageType, $allowedPageTypes)) {

            // Get the building blocks for our new rawContent
            $content = $e['page']->getRawContent();
            $modifiedDate = date('n-j-Y', $this->grav['page']->modified());
            $pretext = $this->grav['config']->get('plugins.modified-date.pretext');
            $placement = $this->grav['config']->get('plugins.modified-date.placement');
                
            // Modify the rawContent output with our blocks and chuck it all back on the page
            if ($placement == 'top') {
                $e['page']->setRawContent("_**" . $pretext . "** " . $modifiedDate . "_\n\n---\n\n" . $content);
            } else {
                $e['page']->setRawContent($content . "\n\n---\n\n_**" . $pretext . "** " . $modifiedDate . "_");          
            }
        }
    }
}
