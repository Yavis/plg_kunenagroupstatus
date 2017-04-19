<?php
/**
 * @package    groupstatus
 *
 * @author     spoln <your@email.com>
 * @copyright  A copyright
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 * @link       http://your.url.com
 */

defined('_JEXEC') or die;

/**
 * Groupstatus plugin.
 *
 * @package  groupstatus
 * @since    1.0
 */
class plgKunenaGroupstatus extends JPlugin
{
    /**
     * Associative array to hold results of the plugin.
     *
     * @since 1.0
     * @var array
     */
    protected static $plgDisplay = array();

    /**
     * If css is included.
     *
     * @since 1.0
     * @var boolean
     */
    protected static $includedCss = false;

	/**
	 * Application object
	 *
	 * @var    JApplicationCms
	 * @since  1.0
	 */
	protected $app;

	/**
	 * Database object
	 *
	 * @var    JDatabaseDriver
	 * @since  1.0
	 */
	protected $db;

    /**
     * @since 1.0
     * @var KunenaUser
     */
	protected $user;

    /**
     * @since 1.0
     * @var KunenaConfig
     */
	protected $config;

	/**
	 * Affects constructor behavior. If true, language files will be loaded automatically.
	 *
	 * @var    boolean
	 * @since  1.0
	 */
	protected $autoloadLanguage = false;

	public function __construct($subject, array $config = array())
    {
        $this->app = JFactory::getApplication();

        // Do not register plug-in in administration.
        if ($this->app->isAdmin())
        {
            return;
        }

        // If scope isn't Kunena, do not register plug-in.
        if ($this->app->scope != 'com_kunena')
        {
            return;
        }

        // Kunena detection and version check
        $minKunenaVersion = '5.0';

        if (!class_exists('KunenaForum') || !KunenaForum::isCompatible($minKunenaVersion))
        {
            $this->loadLanguage();
            $this->app->enqueueMessage(JText::sprintf('PLG_KUNENAGROUPSTATUS_DEPENDENCY_FAIL', $minKunenaVersion));

            return;
        }

        // Kunena online check
        if (!KunenaForum::enabled())
        {
            return;
        }

        // Initialize variables
        $this->db     = JFactory::getDbo();
        $this->user   = KunenaFactory::getUser();
        $this->config = KunenaFactory::getConfig();

        // initialise plugin
        parent::__construct($subject, $config);
    }

    /**
     * @since 1.0
     * @param       $msg
     * @param   int $fatal
     */
    protected function debug($msg, $fatal = 0)
    {
        // Print out debug info!
        $debug = $this->params->get('show_debug', false);

        // Joomla Id's of Users who can see debug info
        $debugUsers = $this->params->get('show_debug_userids', '');

        if (!$debug || ($debugUsers && !in_array($this->user->userid, explode(',', $debugUsers))))
        {
            return;
        }

        if ($fatal)
        {
            echo "<br /><span class=\"kdb-fatal\">[KunenaGroupstatus FATAL: $msg ]</span>";
        }
        else
        {
            echo "<br />[KunenaGroupstatus debug: $msg ]";
        }
    }

    /**
	 * onAfterInitialise.
	 *
	 * @return  void.
	 *
	 * @since   1.0
	 */
	public function onAfterInitialise()
	{
		
	}

	/**
	 * onAfterRoute.
	 *
	 * @return  void.
	 *
	 * @since   1.0
	 */
	public function onAfterRoute()
	{
	
	}

	/**
	 * onAfterDispatch.
	 *
	 * @return  void.
	 *
	 * @since   1.0
	 */
	public function onAfterDispatch()
	{
	
	}

	/**
	 * onAfterRender.
	 *
	 * @return  void.
	 *
	 * @since   1.0
	 */
	public function onAfterRender()
	{
		// Access to plugin parameters
		$sample = $this->params->get('sample', '42');
	}

	/**
	 * onAfterCompileHead.
	 *
	 * @return  void.
	 *
	 * @since   1.0
	 */
	public function onAfterCompileHead()
	{
	
	}

	/**
	 * OnAfterCompress.
	 *
	 * @return  void.
	 *
	 * @since   1.0
	 */
	public function onAfterCompress()
	{
	
	}

	/**
	 * onAfterRespond.
	 *
	 * @return  void.
	 *
	 * @since   1.0
	 */
	public function onAfterRespond()
	{
	
	}
}
