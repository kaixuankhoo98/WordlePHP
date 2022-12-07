<?php
require __DIR__ . "/../App/Word.php";
use PHPUnit\Framework;

class WordleTest extends PHPUnit\Framework\TestCase {
    public function testSettingFiveLetterWordIsSuccessful() {
        $word = new Word("hello");
        Framework\assertTrue($word->getWord() === "hello");
    }

    public function testSettingLessThanFiveLetterWordFails() {
        $word = new Word("hell");
        Framework\assertTrue($word->getWord() === "");
    }

    public function testStub() {
        $stub = $this->createStub(Word::class);
        $stub->method("getWord")
            ->willReturn("stubs");
        Framework\assertTrue($stub->getWord() === "stubs");
    }

    public function testSettingWordAlsoSetsArray() {
        $word = new Word("joust");
        Framework\assertTrue($word->isCorrectLetter("j", 0));
        Framework\assertTrue($word->isCorrectLetter("o", 1));
    }

    public function testEmptyWordCanStillCheckCorrectLetter() {
        $word = new Word("ogre");
        Framework\assertFalse($word->isCorrectLetter("a",4));
    }

    public function testGuessingCorrectWordReturnsArrayOf2s() {
        $word = new Word("hello");
        $answer = $word->compare("hello");
        Framework\assertTrue($answer == array(2,2,2,2,2));
    }

    public function testGuessingOneLetterWrongGivesArrayWithAZero() {
        $word = new Word("chase");
        $answer = $word->compare("chafe");
        Framework\assertTrue($answer == array(2,2,2,0,2));
    }

    public function testGuessingLetterInWrongSpotGivesArrayWithAOne() {
        $word = new Word("teach");
        $answer = $word->compare("cheat");
        Framework\assertTrue($answer == array(1,1,1,1,1));
    }
}

?>