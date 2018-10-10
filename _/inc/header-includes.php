<?php
    // Figure out what our server name is
    $host = $_SERVER['SERVER_NAME'];
    // check if we are in the dev environment
    if ($host == 'localhost' || $host == 'bentmetal-blog.test') {
        // we're on dev, so include the dev CSS file and JavaScript individually for easier debugging
        echo '<link href="' . get_template_directory_uri() . '/_/compiled/bentmetalblog.main.css" rel="stylesheet" type="text/css" />' . "\n";
        include 'header-scripts.php';
    } else {
        // include script version for file versioning on production environment
        include_once 'script-version.php';
        // if production, provide the minified CSS and compiled/uglified JavaScript files
        echo '<link href="' . get_template_directory_uri() . '/_/css/bentmetalblog.main.min.css?v=' . $GLOBALS['SCRIPT_VERSION'] . '" rel="stylesheet" type="text/css" />' . "\n";
        echo '<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-577e7cf3f3204679"></script>' . "\n";
        echo '<script type="text/javascript" src="' . get_template_directory_uri() . '/_/js/bentmetalblog.header.min.js?v=' . $GLOBALS['SCRIPT_VERSION'] . '"></script>' . "\n";
    }
?>
