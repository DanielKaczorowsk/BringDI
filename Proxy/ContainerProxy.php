<?php
	namespace src\Container\Proxy;
	use src\Container\ContainerServices;
    use src\Container\Enum\ClassEnum;
		
		class ContainerProxy 
        {
        private ?ContainerServices $container = null;
        private string|object $method;
        private array $args = [];
        private array $cache = [];
        private bool $autoWire = false;
        public function __construct(ContainerServices $container)
        {
            $this->container = $container;
        }
        public function method(string $method)
        {
            $this->method = $method;
            return $this;
        }
        public function args(array $args)
        {
            $this->args = $args;
            return $this;
        }
        public function autoWire(bool $autoWire = false)
        {
            $this->autoWire = $autoWire;
        }
        public function get(): array|object|null
        {
            $key = is_string($this->method) ? $this->method : spl_object_id($this->method);
            if(!array_key_exists($key, $this->cache))
            {
                if($this->method)
                {
                    $this->container->method($this->method);
                }
                if($this->args)
                {
                    $this->container->args($this->args);
                }
                if($this->autoWire === true)
                {
                    $this->container->autoWire($autoWire);
                }
                $this->cache[$this->method] = $this->container->liteGet();
            }
            return $this->cache[$this->method];
        }
    }