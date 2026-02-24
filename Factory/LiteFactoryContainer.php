<?php 
	namespace src\Container\Factory;
	use src\Container\DTO\ContainerDTO;
		class LiteFactoryContainer
		{
			private ContainerDTO $query;
			private array $cache;
			public function set(ContainerDTO $query):	void
			{
				$this->query = $query;
			}
			public function load():void
			{
				if($this->query->autoWire === true)
				{
					$reflection = new \ReflectionClass($this->query->subMethod);
					$constructor = $reflection->getConstructor();
					if($constructor)
					{
						$parameters = $constructor->getParameters();
						$dependences = [];
						foreach($parameters as $parameter)
						{
							$type = $parameter->getType();
							if($type && !$type->isBuiltin())
							{
								$dependenceClass = $type->getName();
								$dependences[] = new $dependenceClass;
							}	
						}
						$this->query->instance = $reflection->newInstanceArgs($dependences);
					}
					else
					{
						$this->query->instance = $reflection->newInstanceArgs();
					}
				}
				else if(!empty($this->query->args))
				{
					$this->query->instance = new $this->query->method(...$this->query->args);
				}
				else
				{
					$this->query->instance = new $this->query->method;
				}
				
			}
			public function get():	object
			{
				$instance = $this->query->instance;
				return $instance;
			}
			
		}