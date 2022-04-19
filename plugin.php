<?php
defined('_JEXEC') or die;

use Joomla\CMS\Plugin\CMSPlugin;


/**
 * Create and or render an article table of contents.
 *
 * @since  4.0
 */
class plgSystemHeadingreplace extends CMSPlugin
{

    public function __construct($name, array $arguments = array())
    {

        parent::__construct($name, $arguments);
    }

    public function onAfterDispatch()
    {
        //echo 'compile';
        //only going to run these in the backend for now

        $app = JFactory::getApplication();
        $isAdmin = $app->isClient('administrator');

        $heading_text = $this->params->get('heading_text', 1);
        if ($isAdmin) {

        JFactory::getDocument()->addScriptDeclaration("
            var page_title_container = document.querySelector('.page-title');
            page_title_container.innerHTML= '$heading_text'
            ");
            return;
        }

    }

}
