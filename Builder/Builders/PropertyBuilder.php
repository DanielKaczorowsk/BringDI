<?php
	namespace src\Container\Builder\Builders;
	use src\Container\Builder\Builder;
		class PropertyBuilder extends Builder implements BuilderInterface
		{
			public function build():void
			{
				$instance = $this->query->instance;
				$reflection = empty($this->query->reflectionInstance) ? new ReflectionClass($this->query->instance) : $this->query->reflectionInstance;
				$reflectionProperty = $this->query->reflectionProperty;
				foreach($reflectionProperty as $propertyName => $args)
				{
					if ($reflection->hasProperty($propertyName)) 
					{
						if(empty($args))
						{
							$propertyValue = $reflection->getProperty($propertyName);
						}
						else
						{
							$propertyValue = $reflection->getProperty($propertyName);
							$propertyValue->setAccessible(true);
							$propertyValue->setValue($instance, $args);
						}
					}
				}
				$this->query->instance = $propertyValue->getValue($instance);
			}
			
		}