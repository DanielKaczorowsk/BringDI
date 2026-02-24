<?php
    namespace src\Container\DTO;
    use src\Container\Enum\ClassEnum;

    class ContainerDTO
    {
        public string|object $method;
        public string $subMethod = '';
        public array $args = [];
        public bool $reflection = false;
        public bool $autoWire = false;
        public bool $cache = false;
        public array $config = [];
        public bool $reflectionLazyProxy = false;
        public array $reflectionMethod = [];
        public array $reflectionProperty = [];
        public object|string|null $instance = null;
        public ?object $reflectionInstance = null;
        public object|string|null $cacheInstance = null;
    }
    