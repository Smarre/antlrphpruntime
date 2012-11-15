<?php

namespace Antlr\Tests;
use Antlr\Runtime\DFA;

class DFATest extends \PHPUnit_Framework_TestCase
{
    static public function dataUnpackRLE()
    {
        return array(
            // Example 1: From the Python Testsuite
            array(
              "\1\3\1\4\2\xff\1\5\22\xff\1\2\31\xff\1\6\6\xff\32\6\4\xff\1\6\1\xff\32\6",
 	            array( 3, 4, -1, -1, 5, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1,
 	              -1, -1, -1, -1, -1, -1, 2, -1, -1, -1, -1, -1, -1, -1, -1, -1,
 	              -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1,
 	              6, -1, -1, -1, -1, -1, -1, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6,
 	              6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, -1, -1, -1, -1, 6, -1,
 	              6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6,
 	              6, 6, 6, 6, 6
	            )
            ),
            array("\x1\x3", array(3)),
            array("\x2\xff", array(-1, -1)),
        );
    }

    /**
     * @dataProvider dataUnpackRLE
     */
    public function testUnpackRLE($pack, $data)
    {
        $this->assertEquals(DFA::unpackRLE($pack), $data);
    }

}
