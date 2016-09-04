#!/usr/bin/env php
<?php
use Frickelbruder\KickOff\Cli\Commands\DefaultCommand;
use Frickelbruder\KickOff\Configuration\Configuration;
use Frickelbruder\KickOff\Log\Listener\ConsoleOutputListener;

require __DIR__.'/../../../autoload.php';

$config = new Configuration();
$requester = new \Frickelbruder\KickOff\Http\HttpRequester();
$logger = new \Frickelbruder\KickOff\Log\Logger();
$coListener = new ConsoleOutputListener();
$junitLogListener = new \Frickelbruder\KickOff\Log\Listener\JunitLogListener();
$logger->addListener($coListener);
$logger->addListener($junitLogListener);
$command = new DefaultCommand('run', $requester, $config, $logger);
$app = new \Symfony\Component\Console\Application("KickOff", "1.0.0");
$app->add($command);
$app->run();