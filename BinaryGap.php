<?php
class BinaryGap
{
    private $number;

    /**
     * BinaryGap constructor.
     * @param $number
     */
    public function __construct($number)
    {
        $this->number = $number;
    }

    /**
     * @return mixed
     */
    public function getNumber() {
        return $this->number;
    }

    private function convertToBinary($number) {
        return decbin($number);
    }

    /**
     * Find longest sequence of zeros in binary representation of an integer.
     */
    public function calculateBinaryGap() {
        $binaryNumber = $this->convertToBinary($this->getNumber());
        $binaryNumberArray = str_split($binaryNumber);
        $binaryCount = array();
        $counter = 0;
        foreach($binaryNumberArray as $index => $binNum) {
            if($binNum == "0")
                $counter++;
            else if($binNum == "1") {
                if($counter > 0)
                    $binaryCount[] = $counter;
                $counter = 0;
            }
        }
        return max($binaryCount);
    }
}

$binaryGap = new BinaryGap(209);
echo "The largest binary gap is " . $binaryGap->calculateBinaryGap() . "\n";