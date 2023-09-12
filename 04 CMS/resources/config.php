<?php
    defined("DS") ? null : define("DS", DIRECTORY_SEPARATOR);
    // echo "<h1>" . DS . "</h1>";

    // C:\xampp\htdocs\dw2023-2\04 CMS\resources\views\front
    defined("VIEW_FRONT") ? null : define("VIEW_FRONT", __DIR__ . DS . "views" . DS ."front");
    defined("VIEW_BACK") ? null : define("VIEW_BACK", __DIR__ . DS . "views" . DS ."back");
    // echo __DIR__;
    // echo VIEW_FRONT;
    // echo VIEW_BACK;
?>