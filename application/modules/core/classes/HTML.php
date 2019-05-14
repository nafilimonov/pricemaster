<?php defined('SYSPATH') OR die('No direct script access.');

class HTML extends Kohana_HTML {

	/**
   * выводит меню разделов 
   *
   * @param array
   */

	public static function printMenuSections ($arResult) {
		$i=0;
		foreach ($arResult as $sec) {
			$i++;
			echo "<li><a href = '/catalog/section/".$sec['ID']."'>".$sec["NAME"]."</a>";
			if (isset($sec['ITEMS'])) {$i1=0; foreach ($sec['ITEMS'] as $sec2) {
			$i1++; if($i1==1){echo "<ul>";}echo "<li><a href = '/catalog/section/".$sec2['ID']."'>".$sec2["NAME"]."</a>";
					
					if (isset($sec2['ITEMS'])) {$i2=0; foreach ($sec2['ITEMS'] as $sec3) {
					$i2++; if($i2==1){echo "<ul>";}echo "<li><a href = '/catalog/section/".$sec3['ID']."'>".$sec3["NAME"]."</a>";
								
							if (isset($sec3['ITEMS'])) {$i3=0; foreach ($sec3['ITEMS'] as $sec4) {
							$i3++; if($i3==1){echo "<ul>";}echo "<li><a href = '/catalog/section/".$sec4['ID']."'>".$sec4["NAME"]."</a>";
								
									if (isset($sec4['ITEMS'])) {$i4=0; foreach ($sec4['ITEMS'] as $sec5) {
									$i4++; if($i4==1){echo "<ul>";} echo "<li><a href = '/catalog/section/".$sec5['ID']."'>".$sec5["NAME"]."</a></li>";
					
						if($i4==count($sec4['ITEMS'])) echo "</ul>";
										}
									}	
						if($i3==count($sec3['ITEMS'])) echo "</ul></li>";
								}
							}
						if($i2==count($sec2['ITEMS'])) echo "</ul><li>";
							}
						}
					if($i1==count($sec['ITEMS'])) echo "</ul></li>";
				}
			}
			if($i==count($arResult)) echo "</li>";
		}

	}

}
