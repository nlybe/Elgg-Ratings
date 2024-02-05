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

		elgg_define_js('jratings', [
			'deps' => array('jquery'),
			'exports' => 'jratings',
		]);
		
	}
}
