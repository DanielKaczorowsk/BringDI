<?php
	namespace src\Container\Builder\Builders;
	use src\Container\Builder\Builder;
		class MethodBuilder extends Builder implements BuilderInterface
		{
			public function build():void
			{
				$instance = $this->query->instance;
				$reflection = empty($this->query->reflectionInstance) ? new ReflectionClass($this->query->instance) : $this->query->reflectionInstance;
				$reflectionMethod = $this->query->reflectionMethod;
				foreach($reflectionMethod as $methodName => $args)
				{
					if ($reflection->hasMethod($methodName)) 
					{							
						$method = $reflection->getMethod($methodName);
						$method->setAccessible(true);
						$method->invokeArgs($instance, array($args));
					}
				}
				$this->query->instance = $method->invoke($instance);
			}
			
		}