<?php
namespace App\Controller;

class BaseController
{
    protected $container;

    public function __construct($container)
    {
        $this->container = $container;
    }

    public function __get($propertyName)
    {
        if ($this->container->{$propertyName}) {
            return $this->container->{$propertyName};
        }
    }
}
