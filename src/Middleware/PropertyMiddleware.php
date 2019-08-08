<?php


namespace AutoMapperPlus\Middleware;


use AutoMapperPlus\Configuration\MappingInterface;
use AutoMapperPlus\MapperInterface;
use AutoMapperPlus\MappingOperation\MappingOperationInterface;

interface PropertyMiddleware extends Middleware
{
    /**
     * Check is this middleware supports the current property mapping request, and where it should inject into the
     * standard behavior.
     *
     * @param $source
     * @param $destination
     * @param $propertyName
     * @param MappingInterface $mapping
     * @param MappingOperationInterface $operation
     * @param array $context
     * @return int|bool {Middleware::AFTER, Middleware::BEFORE, Middleware::SKIP, Middleware::OVERRIDE}
     */
    public function supportsMapProperty(
        $source,
        $destination,
        $propertyName,
        MappingInterface $mapping,
        MappingOperationInterface $operation,
        array $context = []);

    /**
     * Perform a custom property mapping job.
     *
     * It will be not be invoked at all if supportsMapProperty returns Middleware::SKIP or false.
     * It will be invoked after the standard behavior if supportsMapProperty returns Middleware::AFTER or true.
     * It will be invoked before the standard behavior if supportsMapProperty returns Middleware:BEFORE.
     * It will be invoked in replacement of standard behavior if supportsMapProperty returns Middleware:OVERRIDE.
     *
     * @param $source
     * @param $destination
     * @param $propertyName
     * @param MappingInterface $mapping
     * @param MappingOperationInterface $operation
     * @param array $context
     * @return mixed
     */
    public function mapProperty(
        $source,
        $destination,
        $propertyName,
        MappingInterface $mapping,
        MappingOperationInterface $operation,
        array $context = []
    );

}