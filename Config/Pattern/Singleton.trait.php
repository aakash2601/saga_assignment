<?php
namespace Saga\Config\Pattern;

trait Singleton
{
    use Base;

    protected static $_oInstance = null;
    public static function getInstance()
    {
        return (null === static::$_oInstance) ? static::$_oInstance = new static : static::$_oInstance;
    }
}
