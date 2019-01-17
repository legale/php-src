--TEST--
mb_str_split() tests UTF-8 illegal chars & UTF-16 surrogate pairs
--SKIPIF--
<?php extension_loaded('mbstring') or die('skip mbstring not available'); ?>
--INI--
output_handler=
mbstring.func_overload=0
--FILE--
<?php
ini_set('include_path','.');
include_once('common.inc');

/* 123 string and 4-bytes length character 0xf09280a9 */
$utf8 = pack("H*", "313233f09280a9"); 

/* 123 string and 4-bytes length character 0xf09280a9 head without tail */
$utf8_cut = pack("H*", "313233f092"); 

/* very first and very last utf-16 4-bytes characters  */
$utf16_first_be = pack("H*", "d800dc00"); 
$utf16_first_le = pack("H*", "00d800dc"); 

$utf16_last_be = pack("H*", "dbffdfff");
$utf16_last_le = pack("H*", "ffdbffdf");

$utf16be = $utf16_first_be . $utf16_last_be;
$utf16le = $utf16_first_le . $utf16_last_le;

/* print each chunk as HEX string */
echo "UTF-8:";
foreach(mb_str_split($utf8, 2) as $chunk){
	printf(" l:%d v:%s", strlen($chunk), unpack("H*", $chunk)[1]); 	
}
echo PHP_EOL;

echo "BAD UTF-8:";
foreach(mb_str_split($utf8_cut, 2) as $chunk){
	printf(" l:%d v:%s", strlen($chunk), unpack("H*", $chunk)[1]); 	
}
echo PHP_EOL;

echo "UTF-16BE:";
foreach(mb_str_split($utf16be, 1, "UTF-16BE") as $chunk){
	printf(" l:%d v:%s", strlen($chunk), unpack("H*", $chunk)[1]); 	
}
echo PHP_EOL;

echo "UTF-16LE:";
foreach(mb_str_split($utf16le, 1, "UTF-16LE") as $chunk){
	printf(" l:%d v:%s", strlen($chunk), unpack("H*", $chunk)[1]); 	
}
echo PHP_EOL;

?>
--EXPECT--
UTF-8: l:2 v:3132 l:5 v:33f09280a9
BAD UTF-8: l:2 v:3132 l:3 v:33f092
UTF-16BE: l:4 v:d800dc00 l:4 v:dbffdfff
UTF-16LE: l:4 v:00d800dc l:4 v:ffdbffdf
