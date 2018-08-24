<?php
$space = shell_exec("du --max-depth=1 ../../../ -h");
echo '<pre>'.$space.'</pre>';
?>