<?php
/**
 * libvector3d
 * 
 * Git:  <https://git.eliteheberg.fr/younishd/libvector3d>
 * Author:  YouniS Bensalah  <younis.bensalah@riseup.net>  <http://younishd.fr>
 * License:  This program is under a MIT License.
 */

class Interpreter {

    public function hello()
    {
        echo "
vector3d-cli

----------->
   /|   \
     \  /
      \/


hello!
";
        while (1) {
            $next = explode(' ', $this->prompt());
            if (!empty($cmd = $next[0])) {
                switch ($cmd) {

                    case 'point':
                    $this->point(array_slice($next, 1));
                    break;

                    case 'vector':
                    $this->vector(array_slice($next, 1));
                    break;

                    case 'det':
                    $this->det(array_slice($next, 1));
                    break;

                    case 'scalar':
                    $this->scalar(array_slice($next, 1));
                    break;

                    case 'load':
                    foreach (array_slice($next, 1) as $mod) {
                        $this->load($mod);
                    }
                    break;

                    case 'help':
                    $this->help();
                    break;

                    case 'exit':
                    $this->bye();
                    break;

                    default:
                    echo "$cmd ?\n";

                }
            }
        }
    }

    public function bye()
    {
        die("Author:
    YouniS Bensalah
        <younis.bensalah@riseup.net>
        <http://younishd.fr>

bye! ->->
");
    }

    protected function point($args)
    {
        // point arg1 arg2 arg3 arg4 ...
        // 
        // arg1: id
        // arg2: x
        // arg3: y
        // arg4: z
        // 
        // add new point with id.
        // 
        if (count($args) > 3) {
            if (isset($args[0])&&isset($args[1])&&isset($args[2])&&isset($args[3])) {
                $x = (float)$args[1];
                $y = (float)$args[2];
                $z = (float)$args[3];
                $id = (string)$args[0];
                $point = Point::fromCoordinates($x, $y, $z);
                $point->id($id);
                $this->_grid['point'][$point->id()] = $point;
                $point->display();
                echo "\n";
                return true;
            }
            else {
                echo "Check the arguments.\n";
                return false;
            }
        }
        // point arg1 arg2 arg3
        // 
        // arg1: x
        // arg2: y
        // arg3: z
        // 
        // add new unnamed point.
        // 
        elseif (count($args) == 3) {
            if (isset($args[0])&&isset($args[1])&&isset($args[2])) {
                $x = (float)$args[0];
                $y = (float)$args[1];
                $z = (float)$args[2];
                $id = 'p'.$this->_point_counter++;
                $point = Point::fromCoordinates($x, $y, $z);
                $point->id($id);
                $this->_grid['point'][$point->id()] = $point;
                $point->display();
                echo "\n";
                return true;
            }
            else {
                echo "Check the arguments.\n";
                return false;
            }
        }
        // point arg1
        // 
        // arg1: id
        // 
        // print point id.
        // 
        elseif (count($args) == 1) {
            if (isset($args[0])) {
                if (isset($this->_grid['point'][$args[0]])) {
                    $this->_grid['point'][$args[0]]->display();
                    echo "\n";
                }
                else {
                    echo $args[0].": Undefined point.\n";
                }
            }
            else {
                echo "Check the arguments.\n";
                return false;
            }
        }
        // point
        // 
        // print all points.
        // 
        elseif (count($args) == 0) {
            if (empty($this->_grid['point'])) {
                echo "No points defined so far.\n";
            }
            else {
                foreach ($this->_grid['point'] as $p) {
                    $p->display();
                    echo "\n";
                }
            }   
        }
        // point ? ...
        // 
        // your command is bad.
        // 
        else {
            echo "Wrong arguments.\n";
            return false;
        }
    }

    protected function vector($args)
    {
        // vector arg1 arg2 arg3 arg4 ...
        // 
        // arg1: id
        // arg2: x
        // arg3: y
        // arg4: z
        // 
        // add new vector with id.
        // 
        if (count($args) > 3) {
            if (isset($args[0])&&isset($args[1])&&isset($args[2])&&isset($args[3])) {
                $x = (float)$args[1];
                $y = (float)$args[2];
                $z = (float)$args[3];
                $id = (string)$args[0];
                $vector = Vector::fromComponents($x, $y, $z);
                $vector->id($id);
                $this->_grid['vector'][$vector->id()] = $vector;
                $vector->display();
                echo "\n";
                return true;
            }
            else {
                echo "Check the arguments.\n";
                return false;
            }
        }
        // vector arg1 arg2 arg3
        // 
        // arg1: x
        // arg2: y
        // arg3: z
        // 
        // add new unnamed vector.
        // 
        elseif (count($args) == 3) {
            if (isset($args[0])&&isset($args[1])&&isset($args[2])) {
                $x = (float)$args[0];
                $y = (float)$args[1];
                $z = (float)$args[2];
                $id = 'v'.$this->_vector_counter++;
                $vector = Vector::fromComponents($x, $y, $z);
                $vector->id($id);
                $this->_grid['vector'][$vector->id()] = $vector;
                $vector->display();
                echo "\n";
                return true;
            }
            else {
                echo "Check the arguments.\n";
                return false;
            }
        }
        // vector arg1
        // 
        // arg1: id
        // 
        // print vector id.
        //
        elseif (count($args) == 1) {
            if (isset($args[0])) {
                if (isset($this->_grid['vector'][$args[0]])) {
                    $this->_grid['vector'][$args[0]]->display();
                    echo "\n";
                }
                else {
                    echo $args[0].": Undefined vector.\n";
                }
            }
            else {
                echo "Check the arguments.\n";
                return false;
            }
        }
        // vector
        // 
        // print all vectors.
        //
        elseif (count($args) == 0) {
            if (empty($this->_grid['vector'])) {
                echo "No vectors defined so far.\n";
            }
            else {
                foreach ($this->_grid['vector'] as $v) {
                    $v->display();
                    echo "\n";
                }
            }
        }
        // vector ? ...
        // 
        // your command is bad.
        // 
        else {
            echo "Wrong arguments.\n";
            return false;
        }
    }

    protected function det($args)
    {
        if (count($args) == 3) {
            if (isset($args[0])&&isset($args[1])&&isset($args[2])) {
                echo 'det('.$args[0].', '.$args[1].', '.$args[2].') = '.Vector::det($this->_grid['vector'][$args[0]],$this->_grid['vector'][$args[1]],$this->_grid['vector'][$args[2]])."\n";
            }
        }
        else {
            echo "Determinant needs 3 vectors as arguments.\ndet u v w\n";
        }
    }

    protected function scalar($args)
    {
        if (count($args) == 2) {
            if (isset($args[0])&&isset($args[1])&&isset($this->_grid['vector'][$args[0]])&&isset($this->_grid['vector'][$args[1]])) {
                echo '<';
                $this->_grid['vector'][$args[0]]->display();
                echo ', ';
                $this->_grid['vector'][$args[1]]->display();
                echo '> = '.Vector::scalar($this->_grid['vector'][$args[0]], $this->_grid['vector'][$args[1]])."\n";
            }
            else {
                echo "Scalar product needs 2 vectors as arguments.\nscalar u v\n";
            }
        }
    }

    static public function load($module)
    {
        if (file_exists($module)) {
            echo "Loading module $module...\n";
            include_once $module;
        }
        else {
            die("Error: Module $module not found.\n");
        }
    }

    public function help()
    {
        echo
"

vector3d-cli

----------->

   /|   \
     \  /
      \/

a CLI interpreter for libvector3d written in PHP.

Git:  <https://git.eliteheberg.fr/younishd/libvector3d>
Author:  YouniS Bensalah  <younis.bensalah@riseup.net>  <http://younishd.fr>


not yet lol.
";
    }

    protected function prompt()
    {
        echo "#~> ";
        $stdin = fopen('php://stdin', 'r');
        return trim(fgets($stdin));
    }

    protected function promptln()
    {
        echo "\n" . $this->prompt();
    }

    protected $_grid = array();

    protected $_point_counter = 0;

    protected $_vector_counter = 0;

}
