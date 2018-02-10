<?php

function __autoload_tools($class)
{
    if(file_exists( _TOOLS_  .$class . ".php"))
    {
        require_once _TOOLS_ . $class . ".php";
    }
}

function __autoload_classes($class)
{
    if(file_exists( _MVC_  .$class . ".php"))
    {
        require_once _MVC_ . $class . ".php";
    }
}

spl_autoload_register("__autoload_classes");
spl_autoload_register("__autoload_tools");