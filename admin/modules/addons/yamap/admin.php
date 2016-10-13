<?php
// register content fields
$app->on("cockpit.content.fields.sources", function() {

    echo $this->assets([
      	'yamap:assets/ya-map-2.1.js',
        'yamap:assets/field.yamap.js'
    ], $this['cockpit/version']);

});

?>