<?php
class myCalculator {
    public static $currentVal;

    private $firstVal, $secondVal;

    public function __construct ($firstVal, $secondVal) {
        $this->firstVal = $firstVal;
        $this->secondVal = $secondVal;
    }

    public function add() {
        self::$currentVal = $this->firstVal + $this->secondVal;
        return $this;
    }

    public function multiply() {
        self::$currentVal = $this->firstVal * $this->secondVal;
        return $this;
    }

    public function divide() {
        self::$currentVal = $this->firstVal / $this->secondVal;
        return $this;
    }

    public function subtract() {
        self::$currentVal = $this->firstVal - $this->secondVal;
        return $this;
    }

    public function addBy($value) {
        self::$currentVal = self::$currentVal + $value;
        return self::$currentVal;
    }

    public function multiplyBy($value) {
        self::$currentVal = self::$currentVal * $value;
        return self::$currentVal;
    }

    public function divideBy($value) {
        self::$currentVal = self::$currentVal / $value;
        return self::$currentVal;
    }

    public function subtractBy($value) {
        self::$currentVal = self::$currentVal - $value;
        return self::$currentVal;
    }

}

  $result = new myCalculator(12,6);

  echo $result->add()->divideBy(9)
?>