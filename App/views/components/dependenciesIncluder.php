<?php
    function addHeaderNavDependencies() {
        require_once "./utils/Getter.php";
        dependenciesGenerator([], ["../style/global.css", "../style/home.css"]);
    }
?>