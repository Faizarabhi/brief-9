<?php
namespace MailPoetVendor\Egulias\EmailValidator\Result\Reason;
if (!defined('ABSPATH')) exit;
class ExpectingDomainLiteralClose implements Reason
{
 public function code() : int
 {
 return 137;
 }
 public function description() : string
 {
 return "Closing bracket ']' for domain literal not found";
 }
}
