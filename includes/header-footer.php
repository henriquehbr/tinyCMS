<?php

function headercms() {
	$site_name = "tinyCMS";
	$site_desc = "a stupidly simple content management system";
	echo "<h1 style='margin: 0;'><a href='/'>$site_name</a></h1><h5 style='margin: 0; color: #777;'>$site_desc</h5><hr />";
}

function footercms() {
	echo "<hr /><small'>Criado com <a href='https://github.com/henriquehbr/tinyCMS'>tinyCMS</a></small>";
}

?>