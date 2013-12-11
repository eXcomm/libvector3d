<?php
/**
 * libvector3d
 * 
 * Git:  <https://github.com/younishd/vector>
 * Author:  YouniS Bensalah  <younis.bensalah@riseup.net>  <http://younishd.fr>
 * License:  This program is under a MIT License.
 */

class Vector {

    static public function fromPoints(Point $point_a, Point $point_b)
    {
        $vector = new Vector();
        $vector->x($point_b->x() - $point_a->x());
        $vector->y($point_b->y() - $point_a->y());
        $vector->z($point_b->z() - $point_a->z());
        $vector->refresh();
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

    /** X-component. */
    protected $_x = 0;

    /** Y-component. */
    protected $_y = 0;

    /** Z-component. */
    protected $_z = 0;

    /** Norm. */
    protected $_norm = 0;

}
