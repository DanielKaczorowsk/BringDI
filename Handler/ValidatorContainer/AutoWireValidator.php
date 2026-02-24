<?php 
	namespace src\Container\Handler\ValidatorContainer;
	use src\Container\Handler\ContainerHandler;
	use src\Container\Enum\ClassEnum;
	use src\Container\Builder\Builders\AutoWireBuilder;
		class AutoWireValidator extends ContainerHandler implements InterfaceValidator
		{
			public function handle(array &$results =[]) :void
			{
				if($this->query->autoWire === true)
				{
					$this->result[] = $this->query->config[ClassEnum::AutoWireBuilder->value];
				}
			}
		}