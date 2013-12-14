#!/usr/bin/php -n
<?php
/**
 * libvector3d
 * 
 * Git:  <https://github.com/younishd/vector>
 * Author:  YouniS Bensalah  <younis.bensalah@riseup.net>  <http://younishd.fr>
 * License:  This program is under a MIT License.
 */

/** List of modules to load at start. */
$LOAD_MODULES = array(
    'interpreter.php',
    'point.php',
    'vector.php',
    'path.php',
    'plan.php',
    'sphere.php',
    'matrix.php',
    'distance.php',
    'determinant.php'
);

/** Preload function loading all modules from $LOAD_MODULES. */
function preload()
{
    global $LOAD_MODULES;
    foreach ($LOAD_MODULES as $mod) {
        if (file_exists($mod)) {
            echo "Loading module $mod...\n";
            include_once $mod;
        }
        else {
            die("Error: Module $mod not found.\n");
        }
    }
}

/** Main program. */
function main()
{   
    preload();
    $interpreter = new Interpreter();
    $interpreter->hello();
    $interpreter->bye();
}

main();
