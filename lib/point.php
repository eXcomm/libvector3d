<?php
/**
 * libvector3d
 * 
 * Git:  <https://github.com/younishd/vector>
 * Author:  YouniS Bensalah  <younis.bensalah@riseup.net>  <http://younishd.fr>
 * License:  This program is under a MIT License.
 */

/**
 * A 3D Point.
 */
class Point {

    /**
     * construct point from coordinates.
     */
    static public function fromCoordinates($x, $y, $z)
    {

    }

    /**
     * construct point from vector (pointing towards the point).
     */
    static public function fromVector(Vector $v)
    {

    }

    /**
     * construct a vector from this point instance.
     */
    public function getVector()
    {

    }

    /**
     * construct a vector from a point instance.
     */
    static public function vectorFromPoint($point)
    {
        
    }

    /**
     * get/set X-coordinate.
     */
    public function x($x = null)
    {

    }

    /**
     * get/set Y-coordinate.
     */
    public function y($y = null)
    {

    }    

    /**
     * get/set Z-coordinate.
     */
    public function z($z = null)
    {

    }

    /** X-coordinate. */
    protected $_x = 0;

    /** Y-coordinate. */
    protected $_y = 0;

    /** Z-coordinate. */
    protected $_z = 0;

}
