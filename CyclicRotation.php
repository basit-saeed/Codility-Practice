<?php
class CyclicRotation
{
    private $array;
    private $rotation;

    public function __construct($array, $rotation) {
        $this->array = $array;
        $this->rotation = $rotation;
    }

    /**
     * @param mixed $rotation
     */
    public function setRotation($rotation) {
        $this->rotation = $rotation;
    }

    /**
     * @param mixed $array
     */
    public function setArray($array) {
        $this->array = $array;
    }

    /**
     * @return mixed
     */
    public function getArray() {
        return $this->array;
    }

    /**
     * @return mixed
     */
    public function getRotation() {
        return $this->rotation;
    }

    public function rotateArray() {
        $arrayToRotate = $this->getArray();
        $rotation = $this->getRotation();
        $arrayCount = count($arrayToRotate);
        //var_dump($arrayCount);exit;
        $outputArray = array();
        foreach($arrayToRotate as $key => $value) {
            $rotationTimes = $key + $rotation + 1;
            if($rotationTimes > $arrayCount) {
                $modulusKey = $rotationTimes % $rotation;
                $outputArray[$modulusKey] = $value;
            }
            else {
                $outputArray[$rotationTimes - 1] = $value;
            }

        }
        return $outputArray;
    }

}
$cyclicRotation = new CyclicRotation([3, 8, 9, 7, 6], 3);
var_dump($cyclicRotation->rotateArray());