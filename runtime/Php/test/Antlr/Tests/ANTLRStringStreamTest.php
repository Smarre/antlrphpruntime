<?php

namespace Antlr\Tests;
use Antlr\Runtime\ANTLRStringStream,
    Antlr\Runtime\CharStream;

class ANTLRStringStreamTest extends \PHPUnit_Framework_TestCase
{

    public function test1()
    {
        $ass = new ANTLRStringStream("Hello\nWorld");
        self::assertEquals(0, $ass->LA(0));
        self::assertEquals('H', chr($ass->LA(1)));
        $ass->consume();
        self::assertEquals('e', chr($ass->LA(1)));
        self::assertEquals('H', chr($ass->LA(-1)));
        self::assertEquals(CharStream::EOF, $ass->LA(-2));
        self::assertEquals('ell', $ass->substring(1, 3));
        self::assertEquals(1, $ass->getLine());
        self::assertEquals(1, $ass->getCharPositionInLine());
        $ass->seek(8);
        self::assertEquals('r', chr($ass->LA(1)));
        self::assertEquals(2, $ass->getLine());
        self::assertEquals(2, $ass->getCharPositionInLine());
    }

    public function testSize()
    {
        //ANTLRStringStream.size();
        $stream = new ANTLRStringStream('foo');
        self::assertEquals($stream->size(), 3);
    }

    public function testIndex()
    {
        //ANTLRStringStream.index();
        $stream = new ANTLRStringStream('foo');
        self::assertEquals($stream->index(), 0);
    }

    public function testConsume()
    {

        $stream = new ANTLRStringStream("foo\nbar");

        $stream->consume(); # f
        self::assertEquals($stream->index(), 1);
        self::assertEquals($stream->charPositionInLine, 1);
        self::assertEquals($stream->line, 1);

        $stream->consume(); # o
        self::assertEquals($stream->index(), 2);
        self::assertEquals($stream->charPositionInLine, 2);
        self::assertEquals($stream->line, 1);

        $stream->consume(); # o
        self::assertEquals($stream->index(), 3);
        self::assertEquals($stream->charPositionInLine, 3);
        self::assertEquals($stream->line, 1);

        $stream->consume(); # \n
        self::assertEquals($stream->index(), 4);
        self::assertEquals($stream->charPositionInLine, 0);
        self::assertEquals($stream->line, 2);

        $stream->consume(); # b
        self::assertEquals($stream->index(), 5);
        self::assertEquals($stream->charPositionInLine, 1);
        self::assertEquals($stream->line, 2);

        $stream->consume(); # a
        self::assertEquals($stream->index(), 6);
        self::assertEquals($stream->charPositionInLine, 2);
        self::assertEquals($stream->line, 2);

        $stream->consume(); # r
        self::assertEquals($stream->index(), 7);
        self::assertEquals($stream->charPositionInLine, 3);
        self::assertEquals($stream->line, 2);

        $stream->consume(); # EOF
        self::assertEquals($stream->index(), 7);
        self::assertEquals($stream->charPositionInLine, 3);
        self::assertEquals($stream->line, 2);

        $stream->consume(); # EOF
        self::assertEquals($stream->index(), 7);
        self::assertEquals($stream->charPositionInLine, 3);
        self::assertEquals($stream->line, 2);
    }

    public function testReset()
    {

        $stream = new ANTLRStringStream('foo');

        $stream->consume();
        $stream->consume();

        $stream->reset();
        self::assertEquals($stream->index(), 0);
        self::assertEquals($stream->line, 1);
        self::assertEquals($stream->charPositionInLine, 0);
        self::assertEquals(chr($stream->LT(1)), 'f');
    }

    public function testSubstring()
    {

        $stream = new ANTLRStringStream('foobar');

        self::assertEquals($stream->substring(0, 0), 'f');
        self::assertEquals($stream->substring(0, 1), 'fo');
        self::assertEquals($stream->substring(0, 5), 'foobar');
        self::assertEquals($stream->substring(3, 5), 'bar');
    }

    public function testSeekForward()
    {

        $stream = new ANTLRStringStream("foo\nbar");

        $stream->seek(4);

        self::assertEquals($stream->index(), 4);
        self::assertEquals($stream->line, 2);
        self::assertEquals($stream->charPositionInLine, 0);
        self::assertEquals(chr($stream->LT(1)), 'b');
    }

    public function testMark()
    {

        $stream = new ANTLRStringStream("foo\nbar");

        $stream->seek(4);

        $marker = $stream->mark();
        self::assertEquals($marker, 1);
        self::assertEquals($stream->markDepth, 1);

        $stream->consume();
        $marker = $stream->mark();
        self::assertEquals($marker, 2);
        self::assertEquals($stream->markDepth, 2);
    }

    public function testReleaseLast()
    {

        $stream = new ANTLRStringStream("foo\nbar");

        $stream->seek(4);
        $marker1 = $stream->mark();

        $stream->consume();
        $marker2 = $stream->mark();

        $stream->release();
        self::assertEquals($stream->markDepth, 1);

        # release same marker again, nothing has changed
        $stream->release();
        self::assertEquals($stream->markDepth, 1);
    }

    public function testReleaseNested()
    {

        $stream = new ANTLRStringStream("foo\nbar");

        $stream->seek(4);
        $marker1 = $stream->mark();

        $stream->consume();
        $marker2 = $stream->mark();

        $stream->consume();
        $marker3 = $stream->mark();

        $stream->release($marker2);
        self::assertEquals($stream->markDepth, 1);
    }

    public function testRewindLast()
    {

        $stream = new ANTLRStringStream("foo\nbar");

        $stream->seek(4);

        $marker = $stream->mark();
        $stream->consume();
        $stream->consume();

        $stream->rewind();
        self::assertEquals($stream->markDepth, 0);
        self::assertEquals($stream->index(), 4);
        self::assertEquals($stream->line, 2);
        self::assertEquals($stream->charPositionInLine, 0);
        self::assertEquals(chr($stream->LT(1)), 'b');
    }

    public function testRewindNested()
    {

        $stream = new ANTLRStringStream("foo\nbar");

        $stream->seek(4);
        $marker1 = $stream->mark();

        $stream->consume();
        $marker2 = $stream->mark();

        $stream->consume();
        $marker3 = $stream->mark();

        $stream->rewind($marker2);
        self::assertEquals($stream->markDepth, 1);
        self::assertEquals($stream->index(), 5);
        self::assertEquals($stream->line, 2);
        self::assertEquals($stream->charPositionInLine, 1);
        self::assertEquals(chr($stream->LT(1)), 'a');
    }

}
