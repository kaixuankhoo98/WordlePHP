<?php

class Word
{
    private $word;

    public function __get($word) {
        return $this->$word;
    }

//    private function setArray($word) {
//        for ($i=0; $i<5; ++$i) {
//            $this->wordArray[$i] = $word[$i];
//        }
//    }

    public function __construct($word) {
        $this->setWord($word);
    }

    // Returns true if the word has a value
    public function hasValue() {
        if (strlen($this->word)) {
            return true;
        }
        return false;
    }

    /*
    Getters and setters
    */
    public function getWord() {
        return $this->word;
    }
    public function setWord($word) {
        if (strlen($word) == 5) {
            $this->word = $word;
//            $this->setArray($word);
        } else {
            $this->word = "";
        }
    }

    /*
    Function to return whether a letter is correct based on the index.
    $letter => the letter to be checked
    $index => the index value to be compared to
    */
    public function isCorrectLetter($letter, $index) {
        if ($index>=5 || !$this->hasValue()) { // if index above 5, or if no word assigned
            return false;
        }
        if ($this->word[$index] === $letter) {
            return true;
        }
        return false;
    }

    /*
    Compares submission to $this->word
    returns an array of length 5 (one for each letter)
    0 => letter is not in the word
    1 => letter is in the wrong place
    2 => letter is in the right place
    */
    public function compare($submission) {
        $tempWord = $this->word;
        $returnArray = array(0,0,0,0,0);

        // Checks if any in the right spot
        for ($i=0; $i<5; ++$i) {
            if ($this->isCorrectLetter($submission[$i],$i)) {
                $returnArray[$i] = 2;
                $submission[$i] = "1";
                $tempWord[$i] = "1";
            }
        }
        // Checks if any are in the wrong spot
        for ($i=0; $i<5; ++$i) {
            for ($j=0; $j<5; ++$j) {
                if ($this->isCorrectLetter($submission[$i],$j)) {
                    $returnArray[$i] = 1;
                    $submission[$i] = "1";
                    $tempWord[$j] = "1";
                }
            }
        }
        
        return $returnArray;
    }
}
?>