<?php
/**
 * libvector3d
 * 
 * Git:  <https://git.eliteheberg.fr/younishd/libvector3d>
 * Author:  YouniS Bensalah  <younis.bensalah@riseup.net>  <http://younishd.fr>
 * License:  This program is under a MIT License.
 */

/**
 * Distance between 2 points.
 */
function distancePointPoint(Point $point_a, Point $point_b)
{
    $vector = Vector::fromPoints($point_a, $point_b);
    return $vector->getNorm();
}

/**
 * Distance between a point and a path.
 */
function distancePointPath(Point $point, Path $path)
{
    
}

/**
 * Distance between a point and a plan.
 */
function distancePointPlan(Point $point, Plan $plan)
{

}

/**
 * Distance between 2 paths.
 */
function distancePathPath(Path $path_a, Path $path_b)
{

}

/**
 * Distance between a path and a plan.
 */
function distancePathPlan(Path $path, Plan $plan)
{

}

/**
 * Distance between 2 plans.
 */
function distancePlanPlan(Plan $plan_a, Plan $plan_b)
{

}
