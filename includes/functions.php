<?php

function cms_header() {
	$site_name = "tinyCMS";
	$site_description = "a stupidly simple content management system";
	echo "<h1 style='margin: 0;'><a href='/'>$site_name</a></h1><h5 style='margin: 0; color: #777;'>$site_description</h5><hr />";
}

function cms_footer() {
	echo "<hr /><small'>Criado com <a href='https://github.com/henriquehbr/tinyCMS'>tinyCMS</a></small>";
}

?>