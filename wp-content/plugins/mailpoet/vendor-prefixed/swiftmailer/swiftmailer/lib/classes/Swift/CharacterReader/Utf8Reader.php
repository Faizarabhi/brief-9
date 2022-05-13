<?php
namespace MailPoetVendor;
if (!defined('ABSPATH')) exit;
class Swift_CharacterReader_Utf8Reader implements Swift_CharacterReader
{
 private static $length_map = [
 // N=0,1,2,3,4,5,6,7,8,9,A,B,C,D,E,F
 1,
 1,
 1,
 1,
 1,
 1,
 1,
 1,
 1,
 1,
 1,
 1,
 1,
 1,
 1,
 1,
 // 0x0N
 1,
 1,
 1,
 1,
 1,
 1,
 1,
 1,
 1,
 1,
 1,
 1,
 1,
 1,
 1,
 1,
 // 0x1N
 1,
 1,
 1,
 1,
 1,
 1,
 1,
 1,
 1,
 1,
 1,
 1,
 1,
 1,
 1,
 1,
 // 0x2N
 1,
 1,
 1,
 1,
 1,
 1,
 1,
 1,
 1,
 1,
 1,
 1,
 1,
 1,
 1,
 1,
 // 0x3N
 1,
 1,
 1,
 1,
 1,
 1,
 1,
 1,
 1,
 1,
 1,
 1,
 1,
 1,
 1,
 1,
 // 0x4N
 1,
 1,
 1,
 1,
 1,
 1,
 1,
 1,
 1,
 1,
 1,
 1,
 1,
 1,
 1,
 1,
 // 0x5N
 1,
 1,
 1,
 1,
 1,
 1,
 1,
 1,
 1,
 1,
 1,
 1,
 1,
 1,
 1,
 1,
 // 0x6N
 1,
 1,
 1,
 1,
 1,
 1,
 1,
 1,
 1,
 1,
 1,
 1,
 1,
 1,
 1,
 1,
 // 0x7N
 0,
 0,
 0,
 0,
 0,
 0,
 0,
 0,
 0,
 0,
 0,
 0,
 0,
 0,
 0,
 0,
 // 0x8N
 0,
 0,
 0,
 0,
 0,
 0,
 0,
 0,
 0,
 0,
 0,
 0,
 0,
 0,
 0,
 0,
 // 0x9N
 0,
 0,
 0,
 0,
 0,
 0,
 0,
 0,
 0,
 0,
 0,
 0,
 0,
 0,
 0,
 0,
 // 0xAN
 0,
 0,
 0,
 0,
 0,
 0,
 0,
 0,
 0,
 0,
 0,
 0,
 0,
 0,
 0,
 0,
 // 0xBN
 2,
 2,
 2,
 2,
 2,
 2,
 2,
 2,
 2,
 2,
 2,
 2,
 2,
 2,
 2,
 2,
 // 0xCN
 2,
 2,
 2,
 2,
 2,
 2,
 2,
 2,
 2,
 2,
 2,
 2,
 2,
 2,
 2,
 2,
 // 0xDN
 3,
 3,
 3,
 3,
 3,
 3,
 3,
 3,
 3,
 3,
 3,
 3,
 3,
 3,
 3,
 3,
 // 0xEN
 4,
 4,
 4,
 4,
 4,
 4,
 4,
 4,
 5,
 5,
 5,
 5,
 6,
 6,
 0,
 0,
 ];
 private static $s_length_map = ["\x00" => 1, "\x01" => 1, "\x02" => 1, "\x03" => 1, "\x04" => 1, "\x05" => 1, "\x06" => 1, "\x07" => 1, "\x08" => 1, "\t" => 1, "\n" => 1, "\v" => 1, "\f" => 1, "\r" => 1, "\x0e" => 1, "\x0f" => 1, "\x10" => 1, "\x11" => 1, "\x12" => 1, "\x13" => 1, "\x14" => 1, "\x15" => 1, "\x16" => 1, "\x17" => 1, "\x18" => 1, "\x19" => 1, "\x1a" => 1, "\x1b" => 1, "\x1c" => 1, "\x1d" => 1, "\x1e" => 1, "\x1f" => 1, " " => 1, "!" => 1, "\"" => 1, "#" => 1, "\$" => 1, "%" => 1, "&" => 1, "'" => 1, "(" => 1, ")" => 1, "*" => 1, "+" => 1, "," => 1, "-" => 1, "." => 1, "/" => 1, "0" => 1, "1" => 1, "2" => 1, "3" => 1, "4" => 1, "5" => 1, "6" => 1, "7" => 1, "8" => 1, "9" => 1, ":" => 1, ";" => 1, "<" => 1, "=" => 1, ">" => 1, "?" => 1, "@" => 1, "A" => 1, "B" => 1, "C" => 1, "D" => 1, "E" => 1, "F" => 1, "G" => 1, "H" => 1, "I" => 1, "J" => 1, "K" => 1, "L" => 1, "M" => 1, "N" => 1, "O" => 1, "P" => 1, "Q" => 1, "R" => 1, "S" => 1, "T" => 1, "U" => 1, "V" => 1, "W" => 1, "X" => 1, "Y" => 1, "Z" => 1, "[" => 1, "\\" => 1, "]" => 1, "^" => 1, "_" => 1, "`" => 1, "a" => 1, "b" => 1, "c" => 1, "d" => 1, "e" => 1, "f" => 1, "g" => 1, "h" => 1, "i" => 1, "j" => 1, "k" => 1, "l" => 1, "m" => 1, "n" => 1, "o" => 1, "p" => 1, "q" => 1, "r" => 1, "s" => 1, "t" => 1, "u" => 1, "v" => 1, "w" => 1, "x" => 1, "y" => 1, "z" => 1, "{" => 1, "|" => 1, "}" => 1, "~" => 1, "" => 1, "\x80" => 0, "\x81" => 0, "\x82" => 0, "\x83" => 0, "\x84" => 0, "\x85" => 0, "\x86" => 0, "\x87" => 0, "\x88" => 0, "\x89" => 0, "\x8a" => 0, "\x8b" => 0, "\x8c" => 0, "\x8d" => 0, "\x8e" => 0, "\x8f" => 0, "\x90" => 0, "\x91" => 0, "\x92" => 0, "\x93" => 0, "\x94" => 0, "\x95" => 0, "\x96" => 0, "\x97" => 0, "\x98" => 0, "\x99" => 0, "\x9a" => 0, "\x9b" => 0, "\x9c" => 0, "\x9d" => 0, "\x9e" => 0, "\x9f" => 0, "\xa0" => 0, "\xa1" => 0, "\xa2" => 0, "\xa3" => 0, "\xa4" => 0, "\xa5" => 0, "\xa6" => 0, "\xa7" => 0, "\xa8" => 0, "\xa9" => 0, "\xaa" => 0, "\xab" => 0, "\xac" => 0, "\xad" => 0, "\xae" => 0, "\xaf" => 0, "\xb0" => 0, "\xb1" => 0, "\xb2" => 0, "\xb3" => 0, "\xb4" => 0, "\xb5" => 0, "\xb6" => 0, "\xb7" => 0, "\xb8" => 0, "\xb9" => 0, "\xba" => 0, "\xbb" => 0, "\xbc" => 0, "\xbd" => 0, "\xbe" => 0, "\xbf" => 0, "\xc0" => 2, "\xc1" => 2, "\xc2" => 2, "\xc3" => 2, "\xc4" => 2, "\xc5" => 2, "\xc6" => 2, "\xc7" => 2, "\xc8" => 2, "\xc9" => 2, "\xca" => 2, "\xcb" => 2, "\xcc" => 2, "\xcd" => 2, "\xce" => 2, "\xcf" => 2, "\xd0" => 2, "\xd1" => 2, "\xd2" => 2, "\xd3" => 2, "\xd4" => 2, "\xd5" => 2, "\xd6" => 2, "\xd7" => 2, "\xd8" => 2, "\xd9" => 2, "\xda" => 2, "\xdb" => 2, "\xdc" => 2, "\xdd" => 2, "\xde" => 2, "\xdf" => 2, "\xe0" => 3, "\xe1" => 3, "\xe2" => 3, "\xe3" => 3, "\xe4" => 3, "\xe5" => 3, "\xe6" => 3, "\xe7" => 3, "\xe8" => 3, "\xe9" => 3, "\xea" => 3, "\xeb" => 3, "\xec" => 3, "\xed" => 3, "\xee" => 3, "\xef" => 3, "\xf0" => 4, "\xf1" => 4, "\xf2" => 4, "\xf3" => 4, "\xf4" => 4, "\xf5" => 4, "\xf6" => 4, "\xf7" => 4, "\xf8" => 5, "\xf9" => 5, "\xfa" => 5, "\xfb" => 5, "\xfc" => 6, "\xfd" => 6, "\xfe" => 0, "\xff" => 0];
 public function getCharPositions($string, $startOffset, &$currentMap, &$ignoredChars)
 {
 if (!isset($currentMap['i']) || !isset($currentMap['p'])) {
 $currentMap['p'] = $currentMap['i'] = [];
 }
 $strlen = \strlen($string);
 $charPos = \count($currentMap['p']);
 $foundChars = 0;
 $invalid = \false;
 for ($i = 0; $i < $strlen; ++$i) {
 $char = $string[$i];
 $size = self::$s_length_map[$char];
 if (0 == $size) {
 $invalid = \true;
 continue;
 } else {
 if (\true === $invalid) {
 $currentMap['p'][$charPos + $foundChars] = $startOffset + $i;
 $currentMap['i'][$charPos + $foundChars] = \true;
 ++$foundChars;
 $invalid = \false;
 }
 if ($i + $size > $strlen) {
 $ignoredChars = \substr($string, $i);
 break;
 }
 for ($j = 1; $j < $size; ++$j) {
 $char = $string[$i + $j];
 if ($char > "" && $char < "\xc0") {
 // Valid - continue parsing
 } else {
 $invalid = \true;
 continue 2;
 }
 }
 $currentMap['p'][$charPos + $foundChars] = $startOffset + $i + $size;
 $i += $j - 1;
 ++$foundChars;
 }
 }
 return $foundChars;
 }
 public function getMapType()
 {
 return self::MAP_TYPE_POSITIONS;
 }
 public function validateByteSequence($bytes, $size)
 {
 if ($size < 1) {
 return -1;
 }
 $needed = self::$length_map[$bytes[0]] - $size;
 return $needed > -1 ? $needed : -1;
 }
 public function getInitialByteSize()
 {
 return 1;
 }
}
