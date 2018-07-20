<?php

class Nav_library {
	protected $base_url;
	protected $config = [];

	/* build HTML for main menu */
	public function build_bootstrap_nav($parent_id,$config) {
		$this->base_url = trim(base_url(),'/');

		$this->config = $config;

		$html = '';

		$menus = ci('o_nav_model')->get_as_array($parent_id);

		$html = $this->config['navigation_open'];

		foreach ($menus as $menu) {
			$html .= $this->item($menu,1);
		}

		$html .= $this->config['navigation_close'];

		return $html;
	}

	protected function item($item,$level) {
		$html = '';
		
		/* does this menu have any children? */
		if (is_array($item['children'])) {
			switch ($level) {
				case 1:
					$html .= $this->config['item_open_dropdown'];
				break;
				case 2:
					$html .= $this->config['item_open_dropdown_sub'];
				break;
				default:
					$html .= $this->config['item_open'];
			}

			$html .= ci('parser')->parse_string($this->config['anchor_dropdown'],$item,true);

			$html .= $this->config['dropdown_open'];
			
			foreach ($item['children'] as $i) {
				$html .= $this->item($i,($level + 1));
			}

			$html .= $this->config['dropdown_close'];

			$html .= $this->config['item_end_dropdown'];
		} else {
			$html .= $this->config['item_open'];
			$html .= ci('parser')->parse_string($this->config['anchor'],$item,true);
			$html .= $this->config['item_close'];
		}

		return $html;
	}

} /* end class */