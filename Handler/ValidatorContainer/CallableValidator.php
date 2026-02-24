<?php 
	namespace src\Container\Handler\ValidatorContainer;
	use src\Container\Handler\ContainerHandler;
	use src\Container\Enum\ClassEnum;
	use src\Container\Builder\Builders\CallableBuilder;
		class CallableValidator extends ContainerHandler implements InterfaceValidator
		{
			public function handle(array &$results =[]):	void
			{
				if(is_callable($this->query->method))
                {
					$this->result[] = $this->query->config[ClassEnum::CallableBuilder->value];
                }
			}
		}