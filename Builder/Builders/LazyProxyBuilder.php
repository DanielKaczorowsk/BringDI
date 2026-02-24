<?php
	namespace src\Container\Builder\Builders;
	use src\Container\Builder\Builder;
		class LazyProxyBuilder extends Builder implements BuilderInterface
		{
			public function build():void
			{
				$instance = $this->query->instance;
				$this->query->instance = $this->query->reflectionInstance->newLazyProxy(function ($ghost) use ($instance) 
				{
					foreach (get_object_vars($instance) as $prop => $value) 
					{
						$ghost->$prop = $value;
					}
				});
			}
			
		}