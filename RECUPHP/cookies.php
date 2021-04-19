<?php
    setcookie("noexpira", 1);
    setcookie("micookie", 2, time() +30);

    setcookie("idioma", "esp");

    if ($_COOKIE["idioma"] == "esp") {
        echo = ("Tu idioma está en español")
    }
?>