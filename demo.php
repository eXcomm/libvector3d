<?php
/**
 * libvector3d
 * 
 * Git:  <https://github.com/younishd/vector>
 * Author:  YouniS Bensalah  <younis.bensalah@riseup.net>  <http://younishd.fr>
 * License:  This program is under a MIT License.
 */

include_once 'include.php';

/** Testing. */

$pnt_A = new Point(4,2,-1);
$pnt_B = new Point(0,-1,3);

$vec_AB = Vector::fromPoints($pnt_A, $pnt_B);

function displayVector(Vector $v)
{
    echo '|' . $v->x() . "|\n|" . $v->y() . "|\n|" . $v->z() . "|\n";
}

displayVector($vec_AB);
