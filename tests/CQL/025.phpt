--TEST--
CommonMark\CQL comments
--FILE--
<?php
$doc = \CommonMark\Parse(<<<EOD
Paragraph

> BlockQuote
EOD
);

$call = new \CommonMark\CQL("
  # new line and comment allowed
  /children(Paragraph|BlockQuote)
");

$call($doc, function(\CommonMark\Node $root, \CommonMark\Node $node) {
	if ($node instanceof \CommonMark\Node\Paragraph ||
	    $node instanceof \CommonMark\Node\BlockQuote) {
		echo "OK\n";
	} else  echo "FAIL\n";
});
?>
--EXPECT--
OK
OK

