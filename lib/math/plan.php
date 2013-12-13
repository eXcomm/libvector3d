<?php
/**
 * libvector3d
 * 
 * Git:  <https://github.com/younishd/vector>
 * Author:  YouniS Bensalah  <younis.bensalah@riseup.net>  <http://younishd.fr>
 * License:  This program is under a MIT License.
 */

class Plan {

    public function __construct()
    {
        $this->_n = new Vector();
        $this->_u = new Vector();
        $this->_v = new Vector();
        $this->_p = new Vector();
    }

    static public function fromPoints($point_a, $point_b, $point_c)
    {
        $plan = new Plan();
        // n: AB x AC
        // u: AB
        // v: AC
        // p: OA
    }

    static public function fromNormalVectorPointVector($normal_vector, $point_vector)
    {

    }

    static public function fromDirectionalVectorsPointVector($dir_vector_u, $dir_vector_v, $point)
    {

    }

    /** Normal vector. */
    protected $_n;

    /** First directional vector. */
    protected $_u;

    /** Second directional vector. */
    protected $_v;

    /** Vector to Point. */
    protected $_p;

}
