<?php
namespace App\Controller;

use Psr\Container\ContainerInterface;

/**
 * Class BaseController
 * @package App\Controller
 */
abstract class BaseController implements \ArrayAccess
{
    /**
     * @var ContainerInterface
     */
    private static $containerInterface;

    /**
     * @param ContainerInterface $container
     * @throws \InvalidArgumentException
     */
    final public static function setContainer(ContainerInterface $container)
    {
        if (self::$containerInterface instanceof ContainerInterface) {
            throw new \InvalidArgumentException(
                'Can not overide container! And Only can set once!',
                E_COMPILE_ERROR
            );
        }

        self::$containerInterface = $container;
    }

    /**
     * @return ContainerInterface
     */
    final public static function getContainer()
    {
        return self::$containerInterface;
    }

    /**
     * Magic Method
     *
     * @param string $name
     * @return mixed
     */
    final public function __get($name)
    {
        $containerContent = self::$containerInterface->get($name);

        return $containerContent;
    }

    /**
     * {@inheritdoc}
     */
    public function offsetExists($offset)
    {
        return $this->getContainer()->has($offset);
    }

    /**
     * {@inheritdoc}
     */
    public function offsetSet($offset, $value)
    {
        // no operation
    }

    /**
     * {@inheritdoc}
     */
    public function offsetGet($offset)
    {
        return $this->getContainer()->get($offset);
    }

    /**
     * {@inheritdoc}
     */
    public function offsetUnset($offset)
    {
        // no operation
    }
}