<?php
namespace Popp\structure\decoractor;

use Popp\structure\decorator\AuthenticateRequest;
use Popp\structure\decorator\LogRequest;
use Popp\structure\decorator\MainProcess;
use Popp\structure\decorator\RequestHelper;
use Popp\structure\decorator\StructureRequest;

require './../../../vendor/autoload.php';
require './AuthenticateRequest.php';


$process = new AuthenticateRequest(new StructureRequest(new LogRequest(new MainProcess())));
$process->process(new RequestHelper());
