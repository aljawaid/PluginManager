<?php

namespace Kanboard\Plugin\KanboardPluginsUX\Controller;

use Kanboard\Controller\BaseController;

/**
 * Class KanboardPluginsUX
 * 
 * @author aljawaid
 * 
 */

class KanboardPluginsUXController extends \Kanboard\Controller\PluginController
{
	/**
     * Display the Problem Plugins Page
     *
     * @access public
     */

    public function show()
    {
        $this->response->html($this->helper->layout->plugin('kanboardPluginsUX:plugin/problem-plugins', array(
            'title' => t('Plugins').' &#10562; '.t('Plugin Problems'),
        )));
    }

}
