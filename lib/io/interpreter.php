<?php
/**
 * libvector3d
 * 
 * Git:  <https://github.com/younishd/vector>
 * Author:  YouniS Bensalah  <younis.bensalah@riseup.net>  <http://younishd.fr>
 * License:  This program is under a MIT License.
 */

class Interpreter {

    public function hello()
    {
        echo 'hello!';
        while (1) {
            $next = explode(' ', $this->prompt());
            if (!empty($cmd = $next[0])) {
                switch ($cmd) {
                    case 'point':
                        $this->point($next);
                        break;
                    case 'help':
                        $this->help();
                        break;
                    case 'exit':
                        $this->bye();
                        break;
                    default:
                        echo $cmd;
                }
            }
        }
    }

    public function bye()
    {
        die("bye!\n");
    }

    protected function point($args)
    {
        // point arg1 arg2 arg3 arg4 ...
        if (count($args) > 4) {
            if (isset($args[1])&&isset($args[2])&&isset($args[3])&&isset($args[4])) {
                $x = (float)$args[2];
                $y = (float)$args[3];
                $z = (float)$args[4];
                $id = (string)$args[1];
                $point = Point::fromCoordinates($x, $y, $z);
                $point->id($id);
                $this->_grid['point'][$point->id()] = $point;
                $point->display();
                return true;
            }
            else {
                echo "Check the arguments.\n";
                return false;
            }
        }
        // point arg1 arg2 arg3
        elseif (count($args) == 4) {
            if (isset($args[1])&&isset($args[2])&&isset($args[3])) {
                $x = (float)$args[1];
                $y = (float)$args[2];
                $z = (float)$args[3];
                $id = 'p'.$this->_point_counter++;
                $point = Point::fromCoordinates($x, $y, $z);
                $point->id($id);
                $this->_grid['point'][$point->id()] = $point;
                $point->display();
                return true;
            }
            else {
                echo "Check the arguments.\n";
                return false;
            }
        }
        // point ? ...
        else {
            echo "Wrong arguments.\n";
            return false;
        }
    }

    public function help()
    {
        echo
"

vector3d-cli:
a CLI interpreter for libvector3d written in PHP.

Git:  <https://github.com/younishd/vector>
Author:  YouniS Bensalah  <younis.bensalah@riseup.net>  <http://younishd.fr>


not yet lol.
";
    }

    protected function prompt()
    {
        echo "\n#~> ";
        $stdin = fopen('php://stdin', 'r');
        return trim(fgets($stdin));
    }

    protected $_grid = array();

    protected $_point_counter = 0;

}
