<?php 
	namespace src\Container\Handler\ValidatorContainer;
	use src\Container\Handler\ContainerHandler;
	use src\Container\Enum\ClassEnum;
	use src\Container\Builder\Builders\MethodBuilder;
		class ReflectionMethodValidator extends ContainerHandler implements InterfaceValidator
		{
			public function handle(array &$results =[]):	void
			{
				if(!empty($this->query->reflectionMethod))
				{
					$this->result[] = $this->query->config[ClassEnum::ReflectionMethodBuilder->value];
                }
			}
		}