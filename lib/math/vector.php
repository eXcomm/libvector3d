<?php
/**
 * libvector3d
 * 
 * Git:  <https://github.com/younishd/vector>
 * Author:  YouniS Bensalah  <younis.bensalah@riseup.net>  <http://younishd.fr>
 * License:  This program is under a MIT License.
 */

class Vector {

    static public function fromComponents($x, $y, $z)
    {
        $vector = new Vector();
        $vector->xyz($x, $y, $z);
        return $vector;
    }

    static public function fromPoints(Point $point_a, Point $point_b)
    {
        $vector = new Vector();
        $vector->xyz($point_b->x()-$point_a->x(), $point_b->y()-$point_a->y(), $point_b->z()-$point_a->z());
        return $vector;
    }

    static public function norm(Vector $v)
    {
        return $v->getNorm();
    }

    public function getNorm()
    {
        return $this->_norm;
    }

    public function addScalar($scalar)
    {

    }

    public function multiplyScalar($scalar)
    {
        
    }

    public function xyz($x = null, $y = null, $z = null)
    {
        if (($x === null) && ($y === null) && ($z === null)) {
            return array(
                $this->_x,
                $this->_y,
                $this->_z
            );
        }
        if ($x !== null) {
            $this->_x = $x;
        }
        if ($y !== null) {
            $this->_y = $y;
        }
        if ($z !== null) {
            $this->_z = $z;
        }
        $this->refresh();
    }

    /**
     * get/set X-component.
     */
    public function x($x = null)
    {
        if ($x === null) {
            return $this->_x;
        }
        $this->_x = $x;
        $this->refresh();
    }

    /**
     * get/set Y-component.
     */
    public function y($y = null)
    {
        if ($y === null) {
            return $this->_y;
        }
        $this->_y = $y;
        $this->refresh();
    }    

    /**
     * get/set Z-component.
     */
    public function z($z = null)
    {
        if ($z === null) {
            return $this->_z;
        }
        $this->_z = $z;
        $this->refresh();
    }

    /**
     * Refresh dependencies.
     */
    protected function refresh()
    {
        $this->_norm = $this->calculateNorm();
    }

    /**
     * Calculate the norm.
     * 
     *   -->         ______________
     * || V ||  =  \| x² + y² + z² `
     * 
     */
    protected function calculateNorm()
    {
        return sqrt($this->_x*$this->_x+$this->_y*$this->_y+$this->_z*$this->_z);
    }

    static public function scalar(Vector $u, Vector $v)
    {

    }

    static public function cross(Vector $u, Vector $v)
    {

    }

    static public function det(Vector $u, Vector $v, Vector $w)
    {

    }

    /** X-component. */
    protected $_x = 0;

    /** Y-component. */
    protected $_y = 0;

    /** Z-component. */
    protected $_z = 0;

    /** Norm. */
    protected $_norm = 0;

}
