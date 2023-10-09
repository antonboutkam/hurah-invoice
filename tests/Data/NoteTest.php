<?php

namespace Data;


use Hurah\Invoice\Data\Invoice\Note;
use Test\Hurah\Invoice\AbstractTestCase;

class NoteTest extends AbstractTestCase
{

    public function testCreate()
    {
        $oNote = Note::create('Blabla');
        $this->assertInstanceOf(Note::class, $oNote);

    }

}
