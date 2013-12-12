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

    public function __construct($x, $y, $z)
    {
        $this->_x = $x;
        $this->_y = $y;
        $this->_z = $z;
    }

    /**
     * construct point from coordinates.
     */
    static public function fromCoordinates($x, $y, $z)
    {
        $point = new Point($x, $y, $z);
        return $point;
    }

    /**
     * construct point from vector (pointing towards the point).
     */
    static public function fromVector(Vector $vector)
    {
        $point = new Point();
        $point->x($vector->x);
        $point->y($vector->y);
        $point->z($vector->z);
        return $point;
    }

    /**
     * construct a vector from this point instance.
     */
    public function getVector()
    {
        $vector = new Vector();
        $vector->x($this->x());
        $vector->y($this->y());
        $vector->z($this->z());
        return $vector;
    }

    /**
     * construct a vector from a point instance.
     */
    static public function vectorFromPoint(Point $point)
    {
        return $point->getVector();
    }

    /**
     * get/set X-coordinate.
     */
    public function x($x = null)
    {
        if ($x === null) {
            return $this->_x;
        }
        $this->_x = $x;
    }

    /**
     * get/set Y-coordinate.
     */
    public function y($y = null)
    {
        if ($y === null) {
            return $this->_y;
        }
        $this->_y = $y;
    }    

    /**
     * get/set Z-coordinate.
     */
    public function z($z = null)
    {
        if ($z === null) {
            return $this->_z;
        }
        $this->_z = $z;
    }

    /** X-coordinate. */
    protected $_x;

    /** Y-coordinate. */
    protected $_y;

    /** Z-coordinate. */
    protected $_z;

}
