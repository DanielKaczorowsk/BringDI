<?php 
	namespace src\Container\Handler\ValidatorContainer;
	use src\Container\Handler\ContainerHandler;
	use src\Container\Enum\ClassEnum;
		class EnumValidator extends ContainerHandler implements InterfaceValidator
		{
			public function handle(array &$results =[]):	void
			{
				if(class_exists($this->query->config[$this->query->method->value]))
                {
					$this->result[] = $this->query->config[ClassEnum::EnumBuilder->value];
                }
			}
		}