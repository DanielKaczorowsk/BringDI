<?php 
	namespace src\Container\Handler\ValidatorContainer;
	use src\Container\Handler\ContainerHandler;
	use src\Container\Enum\ClassEnum;
		class ArrayValidator extends ContainerHandler implements InterfaceValidator
		{
			public function handle(array &$results =[]) :void
			{
				if(is_array($this->query->method))
				{
					$this->result[] = $this->query->config[ClassEnum::ArrayBuilder->value];
				}
				
			}
		}