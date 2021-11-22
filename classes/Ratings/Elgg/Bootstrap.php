<?php
/**
 * Elgg Ratings & Comments plugin
 * @package ratings
 */

namespace Ratings\Elgg;

use Elgg\DefaultPluginBootstrap;

class Bootstrap extends DefaultPluginBootstrap {
	
	const HANDLERS = [];
	
	/**
	 * {@inheritdoc}
	 */
	public function init() {
		$this->initViews();
	}

	/**
	 * Init views
	 *
	 * @return void
	 */
	protected function initViews() {
				
		// register extra css
		elgg_extend_view('elgg.css', 'ratings/ratings.css');
		//elgg_extend_view('css/admin', 'ratings/ratings_admin.css');
		
		elgg_define_js('jratings', array(
			'deps' => array('jquery'),
			'exports' => 'jratings',
		));
	}
}
