<?php

namespace Antlr\Tests;

use Antlr\Runtime\Tree\CommonTreeAdaptor;
use Antlr\Runtime\Tree\CommonTreeNodeStream;
use Antlr\Runtime\CommonToken;
use Antlr\Runtime\Tree\CommonTree;
use Antlr\Runtime\Token;
use Antlr\Runtime\Tree\TreeWizard;
use Antlr\Runtime\Tree\TypeContextVisitor;
use Antlr\Runtime\Tree\WizardContextVisitor;

class TreeWizardTest extends \PHPUnit_Framework_TestCase
{

    public $adaptor;
    public $tokens = array("", "", "", "", "", "A", "B", "C", "D", "E", "ID", "VAR");

    public function setUp()
    {
        $this->adaptor = new CommonTreeAdaptor();
    }

    public function testSingleNode()
    {
        $wiz = new TreeWizard($this->adaptor, $this->tokens);
        $t = $wiz->create("ID");
        $found = $t->toStringTree();
        $this->assertEquals("ID", $found);
    }

    public function testSingleNodeWithArg()
    {
        $wiz = new TreeWizard($this->adaptor, $this->tokens);
        $t = $wiz->create("ID[foo]");
        $found = $t->toStringTree();
        $this->assertEquals("foo", $found);
    }

    public function testSingleNodeTree()
    {
        $wiz = new TreeWizard($this->adaptor, $this->tokens);
        $t = $wiz->create("(A)");
        $found = $t->toStringTree();
        $expecting = "A";
        $this->assertEquals($expecting, $found);
    }

    public function testSingleLevelTree()
    {
        $wiz = new TreeWizard($this->adaptor, $this->tokens);
        $t = $wiz->create("(A B C D)");
        $found = $t->toStringTree();
        $expecting = "(A B C D)";
        $this->assertEquals($expecting, $found);
    }

    public function testListTree()
    {
        $wiz = new TreeWizard($this->adaptor, $this->tokens);
        $t = $wiz->create("(nil A B C)");
        $found = $t->toStringTree();
        $expecting = "A B C";
        $this->assertEquals($expecting, $found);
    }

    public function testInvalidListTree()
    {
        $wiz = new TreeWizard($this->adaptor, $this->tokens);
        $t = $wiz->create("A B C");
        $this->assertNull($t);
    }

    public function testDoubleLevelTree()
    {
        $wiz = new TreeWizard($this->adaptor, $this->tokens);
        $t = $wiz->create("(A (B C) (B D) E)");
        $found = $t->toStringTree();
        $expecting = "(A (B C) (B D) E)";
        $this->assertEquals($expecting, $found);
    }

    public function testSingleNodeIndex()
    {
        $wiz = new TreeWizard($this->adaptor, $this->tokens);
        $t = $wiz->create("ID");
        $m = $wiz->index($t);

        $found = $this->indexMapToString($m);

        $expecting = '{10=[ID]}';
        $this->assertEquals($expecting, $found);
    }

    public function testNoRepeatsIndex()
    {
        $wiz = new TreeWizard($this->adaptor, $this->tokens);
        $t = $wiz->create("(A B C D)");
        $m = $wiz->index($t);
        $found = $this->sortMapToString($m);
        $expecting = "{5=[A], 6=[B], 7=[C], 8=[D]}";
        $this->assertEquals($expecting, $found);
    }

    public function testRepeatsIndex()
    {
        $wiz = new TreeWizard($this->adaptor, $this->tokens);
        $t = $wiz->create("(A B (A C B) B D D)");
        $m = $wiz->index($t);
        $found = $this->sortMapToString($m);
        $expecting = "{5=[A, A], 6=[B, B, B], 7=[C], 8=[D, D]}";
        $this->assertEquals($expecting, $found);
    }

    public function testNoRepeatsVisit()
    {
        $wiz = new TreeWizard($this->adaptor, $this->tokens);
        $t = $wiz->create("(A B C D)");
        $wiz->visitByType($t, $wiz->getTokenType("B"), $visitor = new TypeContextVisitor());
        $found = $this->indexMapToString($visitor->getNodes());
        $expecting = "[B]";
        $this->assertEquals($expecting, $found);
    }

    public function testNoRepeatsVisit2()
    {
        $wiz = new TreeWizard($this->adaptor, $this->tokens);
        $t = $wiz->create("(A B (A C B) B D D)");
        $wiz->visitByType($t, $wiz->getTokenType("C"), $visitor = new TypeContextVisitor());
        $found = $this->indexMapToString($visitor->getNodes());
        $expecting = "[C]";
        $this->assertEquals($expecting, $found);
    }

    public function testRepeatsVisit()
    {
        $wiz = new TreeWizard($this->adaptor, $this->tokens);
        $t = $wiz->create("(A B (A C B) B D D)");
        $wiz->visitByType($t, $wiz->getTokenType("B"), $visitor = new TypeContextVisitor());
        $found = $this->indexMapToString($visitor->getNodes());
        $expecting = "[B, B, B]";
        $this->assertEquals($expecting, $found);
    }

    public function testRepeatsVisit2()
    {
        $wiz = new TreeWizard($this->adaptor, $this->tokens);
        $t = $wiz->create("(A B (A C B) B D D)");
        $wiz->visitByType($t, $wiz->getTokenType("A"), $visitor = new TypeContextVisitor());
        $found = $this->indexMapToString($visitor->getNodes());
        $expecting = "[A, A]";
        $this->assertEquals($expecting, $found);
    }

    public function testRepeatsVisitWithContext()
    {
        $wiz = new TreeWizard($this->adaptor, $this->tokens);
        $t = $wiz->create("(A B (A C B) B D D)");
        $wiz->visitByType($t, $wiz->getTokenType("B"), $visitor = new DebugTreeWizardVisitor($this->adaptor));
        $found = $this->indexMapToString($visitor->getNodes());
        $expecting = "[B@A[0], B@A[1], B@A[2]]";
        $this->assertEquals($expecting, $found);
    }

    public function testRepeatsVisitWithNullParentAndContext()
    {
        $wiz = new TreeWizard($this->adaptor, $this->tokens);
        $t = $wiz->create("(A B (A C B) B D D)");
        $wiz->visitByType($t, $wiz->getTokenType("A"), $visitor = new DebugTreeWizardVisitor($this->adaptor));
        $found = implode(", ", $visitor->getNodes());
        $expecting = "A@nil[0], A@A[1]";
        $this->assertEquals($expecting, $found);
    }

    public function testVisitPattern()
    {
        $wiz = new TreeWizard($this->adaptor, $this->tokens);
        $t = $wiz->create("(A B C (A B) D)");
        $wiz->visitByPattern($t, "(A B)", $visitor = new TypeContextVisitor());
        $nodes = $visitor->getNodes();
        $found = $this->indexMapToString($nodes);
        $expecting = "[A]"; // shouldn't match overall root, just (A B)
        $this->assertEquals($expecting, $found);
    }

    public function testVisitPatternMultiple()
    {
        $wiz = new TreeWizard($this->adaptor, $this->tokens);
        $t = $wiz->create("(A B C (A B) (D (A B)))");
        $wiz->visitByPattern($t, "(A B)", $visitor = new DebugTreeWizardVisitor($this->adaptor));
        $found = implode(", ", $visitor->getNodes());
        $expecting = "A@A[2], A@D[0]"; // shouldn't match overall root, just (A B)
        $this->assertEquals($expecting, $found);
    }

    public function testVisitPatternMultipleWithLabels()
    {
        $wiz = new TreeWizard($this->adaptor, $this->tokens);
        $t = $wiz->create("(A B C (A[foo] B[bar]) (D (A[big] B[dog])))");
        $wiz->visitByPattern($t, "(%a:A %b:B)", $visitor = new DebugTreeWizardVisitor($this->adaptor, array("a", "b")));
        $found = implode(", ", $visitor->getNodes());
        $expecting = "foo@A[2]foo&bar, big@D[0]big&dog";
        $this->assertEquals($expecting, $found);
    }

    public function testParse()
    {
        $wiz = new TreeWizard($this->adaptor, $this->tokens);
        $t = $wiz->create("(A B C)");
        $valid = $wiz->parse($t, "(A B C)");
        $this->assertTrue($valid);
    }

    public function testParseSingleNode()
    {
        $wiz = new TreeWizard($this->adaptor, $this->tokens);
        $t = $wiz->create("A");
        $valid = $wiz->parse($t, "A");
        $this->assertTrue($valid);
    }

    public function testParseFlatTree()
    {
        $wiz = new TreeWizard($this->adaptor, $this->tokens);
        $t = $wiz->create("(nil A B C)");
        $valid = $wiz->parse($t, "(nil A B C)");
        $this->assertTrue($valid);
    }

    public function testWildcard()
    {
        $wiz = new TreeWizard($this->adaptor, $this->tokens);
        $t = $wiz->create("(A B C)");
        $valid = $wiz->parse($t, "(A . .)");
        $this->assertTrue($valid);
    }

    public function testParseWithText()
    {
        $wiz = new TreeWizard($this->adaptor, $this->tokens);
        $t = $wiz->create("(A B[foo] C[bar])");
        // C pattern has no text arg so despite [bar] in t, no need
        // to match text--check structure only.
        $valid = $wiz->parse($t, "(A B[foo] C)");
        $this->assertTrue($valid);
    }

    public function testParseWithText2()
    {
        $wiz = new TreeWizard($this->adaptor, $this->tokens);
        $t = $wiz->create("(A B[T__32] (C (D E[a])))");
        // C pattern has no text arg so despite [bar] in t, no need
        // to match text--check structure only.
        $valid = $wiz->parse($t, "(A B[foo] C)");
        $this->assertEquals("(A T__32 (C (D a)))", $t->toStringTree());
    }

    public function testParseWithTextFails()
    {
        $wiz = new TreeWizard($this->adaptor, $this->tokens);
        $t = $wiz->create("(A B C)");
        $valid = $wiz->parse($t, "(A[foo] B C)");
        $this->assertTrue(!$valid); // fails
    }

    public function testParseLabels()
    {
        $wiz = new TreeWizard($this->adaptor, $this->tokens);
        $t = $wiz->create("(A B C)");
        $labels = new \ArrayObject();
        $valid = $wiz->parse($t, "(%a:A %b:B %c:C)", $labels);
        $this->assertTrue($valid);
        $this->assertEquals("A", $labels["a"]->toString());
        $this->assertEquals("B", $labels["b"]->toString());
        $this->assertEquals("C", $labels["c"]->toString());
    }

    public function testParseWithWildcardLabels()
    {
        $wiz = new TreeWizard($this->adaptor, $this->tokens);
        $t = $wiz->create("(A B C)");
        $labels = new \ArrayObject();
        $valid = $wiz->parse($t, "(A %b:. %c:.)", $labels);
        $this->assertTrue($valid);
        $this->assertEquals("B", $labels["b"]->toString());
        $this->assertEquals("C", $labels["c"]->toString());
    }

    public function testParseLabelsAndTestText()
    {
        $wiz = new TreeWizard($this->adaptor, $this->tokens);
        $t = $wiz->create("(A B[foo] C)");
        $labels = new \ArrayObject();
        $valid = $wiz->parse($t, "(%a:A %b:B[foo] %c:C)", $labels);
        $this->assertTrue($valid);
        $this->assertEquals("A", $labels["a"]->toString());
        $this->assertEquals("foo", $labels["b"]->toString());
        $this->assertEquals("C", $labels["c"]->toString());
    }

    public function testParseLabelsInNestedTree()
    {
        $wiz = new TreeWizard($this->adaptor, $this->tokens);
        $t = $wiz->create("(A (B C) (D E))");
        $labels = new \ArrayObject();
        $valid = $wiz->parse($t, "(%a:A (%b:B %c:C) (%d:D %e:E) )", $labels);
        $this->assertTrue($valid);
        $this->assertEquals("A", $labels["a"]->toString());
        $this->assertEquals("B", $labels["b"]->toString());
        $this->assertEquals("C", $labels["c"]->toString());
        $this->assertEquals("D", $labels["d"]->toString());
        $this->assertEquals("E", $labels["e"]->toString());
    }

    public function testEquals()
    {
        $wiz = new TreeWizard($this->adaptor, $this->tokens);
        $t1 = $wiz->create("(A B C)");
        $t2 = $wiz->create("(A B C)");
        $same = TreeWizard::equals($t1, $t2, $this->adaptor);
        $this->assertTrue($same);
    }

    public function testEqualsWithText()
    {
        $wiz = new TreeWizard($this->adaptor, $this->tokens);
        $t1 = $wiz->create("(A B[foo] C)");
        $t2 = $wiz->create("(A B[foo] C)");
        $same = TreeWizard::equals($t1, $t2, $this->adaptor);
        $this->assertTrue($same);
    }

    public function testEqualsWithMismatchedText()
    {
        $wiz = new TreeWizard($this->adaptor, $this->tokens);
        $t1 = $wiz->create("(A B[foo] C)");
        $t2 = $wiz->create("(A B C)");
        $same = TreeWizard::equals($t1, $t2, $this->adaptor);
        $this->assertTrue(!$same);
    }

    public function testFindPattern()
    {
        $wiz = new TreeWizard($this->adaptor, $this->tokens);
        $t = $wiz->create("(A B C (A[foo] B[bar]) (D (A[big] B[dog])))");
        $subtrees = $wiz->findByPattern($t, "(A B)");
        $found = $this->indexMapToString($subtrees);
        $expecting = "[foo, big]";
        $this->assertEquals($expecting, $found);
    }

    private function indexMapToString($m)
    {
        $r = array();
        foreach ($m AS $type => $el) {
            if ($el instanceof CommonTree) {
                $r[] = $el->getText();
            } elseif (is_string($el)) {
                $r[] = $el;
            } else {
                foreach ($el AS $idx => $token) {
                    /* @var $token CommonToken */
                    $r[$type][$idx] = (is_object($token) ? $token->getText() : "nil");
                }
            }
        }
        return str_replace(array('"', ':', ','), array('', '=', ', '), json_encode($r));
    }

    public function sortMapToString($map)
    {
        ksort($map);
        return $this->indexMapToString($map);
    }
}

class DebugTreeWizardVisitor implements WizardContextVisitor
{
    private $nodes = array();
    private $adaptor = null;
    private $labelKeys = array();

    public function __construct($adaptor, array $labelKeys = array())
    {
        $this->adaptor = $adaptor;
        $this->labelKeys = $labelKeys;
    }

    public function visit($t, $parent = null, $childIndex = null, $labels = null)
    {
        $lk = array();
        foreach ($this->labelKeys AS $key) {
            $lk[] = $labels[$key]->getText();
        }

        $this->nodes[] = $this->adaptor->getText($t) . "@" .
                        (($parent != null) ? $this->adaptor->getText($parent) : "nil") .
                        "[" . $childIndex . "]" . implode("&", $lk);
    }

    public function getNodes()
    {
        return $this->nodes;
    }
}