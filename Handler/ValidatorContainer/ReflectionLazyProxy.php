<?php 
	namespace src\Container\Handler\ValidatorContainer;
	use src\Container\Handler\ContainerHandler;
	use src\Container\Enum\ClassEnum;
	use src\Container\Builder\Builders\LazyProxyBuilder;
		class ReflectionLazyProxy extends ContainerHandler implements InterfaceValidator
		{
			public function handle(array &$results =[]) :void
			{
				if($this->query->reflectionLazyProxy === true)
				{
					$this->result[] = $this->query->config[ClassEnum::LazyProxyBuilder->value];
				}
			}
		}