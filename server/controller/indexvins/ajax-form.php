<?php
if ($_GET['id'] == 1) {
  echo <<<HERE_DOC
    [ {"optionValue": 0, "optionDisplay": "k"}, {"optionValue":1, "optionDisplay": "Andy"}, {"optionValue":2, "optionDisplay": "Richard"}]
HERE_DOC;
} else if ($_GET['id'] == 2) {
  echo <<<HERE_DOC
    [{"optionValue":10, "optionDisplay": "Remy"}, {"optionValue":11, "optionDisplay": "Arif"}, {"optionValue":12, "optionDisplay": "JC"}]
HERE_DOC;
}
?>
