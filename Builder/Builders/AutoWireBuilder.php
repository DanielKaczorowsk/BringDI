<?php
	namespace src\Container\Builder\Builders;
	use src\Container\Builder\Builder;

		class AutoWireBuilder extends Builder implements BuilderInterface
		{
			public function build():void
			{
					$reflection = $this->query->reflectionInstance;
					$constructor = $reflection->getConstructor();
					if($constructor)
					{
						$parameters = $constructor->getParameters();
						$dependences = [];
						foreach($parameters as $parameter)
						{
							$type = $parameter->getType();
							if($type && $type->isInterface())
							{
								$classes = $this->query->config[ClassEnum::$type];
								if(is_array($classes))
								{
									foreach($classes as $dependenceClass)
								}
								else
								{
									$dependences[] = new $classes;
								}
								
							}
							else if($type && !$type->isBuiltin())
							{
								$dependenceClass = $type->getName();
								
								//$dependences[] = $this->container->method(ENUM::from($dependenceClass))->get();
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
			
		}