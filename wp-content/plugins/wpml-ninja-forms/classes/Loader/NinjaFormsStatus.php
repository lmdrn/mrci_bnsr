<?php

namespace WPML\Forms\Loader;

class NinjaFormsStatus implements AddonStatus {

	/**
	 * Checks if Add-On is active.
	 *
	 * @return bool
	 */
	public function isActive() {
		return did_action( 'nf_init' );
	}
}
