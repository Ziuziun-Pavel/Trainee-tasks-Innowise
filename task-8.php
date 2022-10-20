<?php

class Matrix {
    public $doubleArray;
    private $_rows;
    private $_columns;

    public function __construct($doubleArray){
        $this->doubleArray = $doubleArray;
        $this->_rows = count($doubleArray);
        $this->_columns = count($doubleArray[0]);
    }

    public function printMatrix()
    {
        for($row=0; $row<count($this->doubleArray); $row++)
        {
            for($col=0; $col<$this->_columns; $col++)
            {
                echo $this->doubleArray[$row][$col]. " ";
            }
            echo "\n";
        }
    }

    public function addMatrix($a)
    {
        $result=array(array());

        for($i=0;$i<$this->_rows;$i++)
        {
            for($j=0;$j<$this->_columns;$j++)
            {
                $result[$i][$j]=$this->doubleArray[$i][$j] + $a[$i][$j];
                echo $result[$i][$j]." ";
            }
            echo "\n";
        }
    }

    public function multiplyByNumber($num)
    {
        $result=array(array());

        for($i=0;$i<$this->_rows;$i++)
        {
            for($j=0;$j<$this->_columns;$j++)
            {
                $result[$i][$j]=$this->doubleArray[$i][$j]*$num;
                echo $result[$i][$j]." ";
            }
            echo "\n";
        }
    }

    public function multiplyMatrices($matrix)
    {

        for ($i = 0; $i < $this->_rows; $i++)
        {
            for ($j = 0; $j < $this->_columns; $j++)
            {
                $result[$i][$j] = 0;
                for ($k = 0; $k < $this->_rows; $k++)
                    $result[$i][$j] += $this->doubleArray[$i][$k] *
                        $matrix[$k][$j];

                echo $result[$i][$j]." ";
            }
            echo "\n";
        }

    }


}

$arName = array(
    array(1,2,3,4),
    array(5,6,7,8),
    array(9,10,11,12),
    array(13,14,15,16),
);

$mat = new Matrix($arName);



