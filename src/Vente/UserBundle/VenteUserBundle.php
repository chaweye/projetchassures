<?php

namespace Vente\UserBundle;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class VenteUserBundle extends Bundle {
	public function getParent() {
		return 'AdmingeneratorUserBundle';
	}
}
