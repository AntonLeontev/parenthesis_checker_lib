<?php

namespace ParenthesisChecker;

class ParenthesisChecker {
  private $counter;

  public function Check(string $str)
  {
    $this->counter = 0;
    if (preg_match("/^[\(\)[:blank:]\r\n]+$/", $str, $matches) === 1 && 
        strlen($matches[0]) === strlen($str)) {
      $arr = str_split($str);
      
      foreach ($arr as $v) {
        if ($v === '(') $this->counter++;
        if ($v === ')') $this->counter--;
        if ($this->counter < 0) return false;        
      }

      if ($this->counter == 0) return true; 
      else return false;
    } else throw new \InvalidArgumentException(
      'Argument may contain only "(", ")", " ", "\t", "\r", "\n"');
  }
}
