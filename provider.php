<?php

namespace FontsAPI_BCLayer_Tester;

use WP_Webfonts_Provider_Local;

class Provider extends WP_Webfonts_Provider_Local {
	/**
	 * The provider's unique ID.
	 *
	 * @since 6.0.0
	 *
	 * @var string
	 */
	protected $id = 'bc-layer';
}
