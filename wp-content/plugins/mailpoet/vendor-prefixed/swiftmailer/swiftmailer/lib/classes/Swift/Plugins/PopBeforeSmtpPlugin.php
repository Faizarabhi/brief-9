<?php
namespace MailPoetVendor;
if (!defined('ABSPATH')) exit;
class Swift_Plugins_PopBeforeSmtpPlugin implements Swift_Events_TransportChangeListener, Swift_Plugins_Pop_Pop3Connection
{
 private $connection;
 private $host;
 private $port;
 private $crypto;
 private $username;
 private $password;
 private $socket;
 private $timeout = 10;
 private $transport;
 public function __construct($host, $port = 110, $crypto = null)
 {
 $this->host = $host;
 $this->port = $port;
 $this->crypto = $crypto;
 }
 public function setConnection(Swift_Plugins_Pop_Pop3Connection $connection)
 {
 $this->connection = $connection;
 return $this;
 }
 public function bindSmtp(Swift_Transport $smtp)
 {
 $this->transport = $smtp;
 }
 public function setTimeout($timeout)
 {
 $this->timeout = (int) $timeout;
 return $this;
 }
 public function setUsername($username)
 {
 $this->username = $username;
 return $this;
 }
 public function setPassword($password)
 {
 $this->password = $password;
 return $this;
 }
 public function connect()
 {
 if (isset($this->connection)) {
 $this->connection->connect();
 } else {
 if (!isset($this->socket)) {
 if (!($socket = \fsockopen($this->getHostString(), $this->port, $errno, $errstr, $this->timeout))) {
 throw new Swift_Plugins_Pop_Pop3Exception(\sprintf('Failed to connect to POP3 host [%s]: %s', $this->host, $errstr));
 }
 $this->socket = $socket;
 if (\false === ($greeting = \fgets($this->socket))) {
 throw new Swift_Plugins_Pop_Pop3Exception(\sprintf('Failed to connect to POP3 host [%s]', \trim($greeting ?? '')));
 }
 $this->assertOk($greeting);
 if ($this->username) {
 $this->command(\sprintf("USER %s\r\n", $this->username));
 $this->command(\sprintf("PASS %s\r\n", $this->password));
 }
 }
 }
 }
 public function disconnect()
 {
 if (isset($this->connection)) {
 $this->connection->disconnect();
 } else {
 $this->command("QUIT\r\n");
 if (!\fclose($this->socket)) {
 throw new Swift_Plugins_Pop_Pop3Exception(\sprintf('POP3 host [%s] connection could not be stopped', $this->host));
 }
 $this->socket = null;
 }
 }
 public function beforeTransportStarted(Swift_Events_TransportChangeEvent $evt)
 {
 if (isset($this->transport)) {
 if ($this->transport !== $evt->getTransport()) {
 return;
 }
 }
 $this->connect();
 $this->disconnect();
 }
 public function transportStarted(Swift_Events_TransportChangeEvent $evt)
 {
 }
 public function beforeTransportStopped(Swift_Events_TransportChangeEvent $evt)
 {
 }
 public function transportStopped(Swift_Events_TransportChangeEvent $evt)
 {
 }
 private function command($command)
 {
 if (!\fwrite($this->socket, $command)) {
 throw new Swift_Plugins_Pop_Pop3Exception(\sprintf('Failed to write command [%s] to POP3 host', \trim($command ?? '')));
 }
 if (\false === ($response = \fgets($this->socket))) {
 throw new Swift_Plugins_Pop_Pop3Exception(\sprintf('Failed to read from POP3 host after command [%s]', \trim($command ?? '')));
 }
 $this->assertOk($response);
 return $response;
 }
 private function assertOk($response)
 {
 if ('+OK' != \substr($response, 0, 3)) {
 throw new Swift_Plugins_Pop_Pop3Exception(\sprintf('POP3 command failed [%s]', \trim($response ?? '')));
 }
 }
 private function getHostString()
 {
 $host = $this->host;
 switch (\strtolower($this->crypto ?? '')) {
 case 'ssl':
 $host = 'ssl://' . $host;
 break;
 case 'tls':
 $host = 'tls://' . $host;
 break;
 }
 return $host;
 }
}
