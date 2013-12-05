<?php
function printf_nbsp() {
   $args = func_get_args();
   echo str_replace(' ', '&nbsp;', vsprintf(array_shift($args), array_values($args)));
}
?>
