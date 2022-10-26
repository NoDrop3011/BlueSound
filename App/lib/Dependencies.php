<?php
    function scriptGenerator($script_directory) {
        echo "<script type='text/javascript' src=" . $script_directory . "></script>";
    }

    function stylesheetGenerator($stylesheet_directory) {
        echo "<link rel='stylesheet' href=" . $stylesheet_directory . ">";
    }

    // $script_directory, $stylsheet_directories: array of string
    function dependenciesGenerator($script_directories, $stylesheet_directories) {
        foreach($script_directories as $dir) {
            scriptGenerator($dir);
        }

        foreach($stylesheet_directories as $dir) {
            stylesheetGenerator($dir);
        }
    }
    // e.g. 
    // 1. dependenciesGenerator(["../styles/style1.css", "../styles/style2.css"], ["./script/script1.js"]);
    // 2. dependenciesGenerator([], ["./script/script1.js", "./script/script2.js"]) atau bisa juga style diisi script tidak
?>