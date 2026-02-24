<?php
    namespace src\Container;
    use src\Container\Proxy\ContainerProxy;
    use src\Container\DTO\ContainerDTO;
    use src\Container\Factory\FactoryContainer;
    use src\Container\Factory\LiteFactoryContainer;
    use src\Container\Enum\ClassEnum;
    /**
         * @param ClassEnum|callable $method
         * @param array<int,mixed> $args
         * @param array<int,mixed> $reflectionMethod
         * @param array<int,mixed> $reflectionPropare
         * @return object
    */
        final class ContainerServices
        {
            private function reset(): void
            {
                $this->query = new ContainerDTO();
            }
            public function config()
            {
			    $this->query->config = require __DIR__ . '/../config/EmailConfig.php';
                return $this;
            }
            public function method(ClassEnum|callable|string $method)
            {
                if($this->query->method)
                {
                    $this->query->subMethod = $method;
                }
                else 
                {
                    $this->reset();
                    $this->query->method = $method;
                }
                
                return $this;
            }
            public function args(array $args)
            {
                $this->query->args = $args;
                return $this;
            }
            public function reflection(bool $decide = false)
            {
                $this->query->reflection = $decide;
                return $this;
            }
            public function autoWire(bool $decide = false)
            {
                $this->query->autoWire = $decide;
                return $this;
            }
            public function reflectionMethod(array $reflectionMethod)
            {
                $this->query->reflectionMethod = $reflectionMethod;
                return $this;
            }
            public function reflectionProperty(array $reflectionProperty)
            {
                $this->query->reflectionProperty = $reflectionProperty;
                return $this;
            }
            public function reflectionLazyProxy(bool $decide = false)
            {
                $this->query->reflectionLazyProxy = $decide;
                return $this;
            }
            public function liteGet():  object|array
            {
                $subFactory = new LiteFactoryContainer();
                $subFactory->set($this->query);
                $subFactory->load();
                return $subFactory->get();
            }
            public function get(): object|array
            {
               if(empty($this->query->config))
               {
                   $this->config();
               };
               $containerProxy = new ContainerProxy($this);
               $factory = $containerProxy->method($this->query->config[ClassEnum::FactoryContainer->value])->get();
               $factory->set($this->query);
               $factory->containerProxy($containerProxy);
               $factory->load();
               return $instance = $factory->get();
            }
        }
