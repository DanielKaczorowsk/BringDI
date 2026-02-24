<?php
	namespace src\Container\Builder\Builders;
	use src\Container\Builder\Builder;
		class ArrayBuilder extends Builder implements BuilderInterface
		{
			public function build():void
			{
				$this->query->instance = $this->buildChain($this->method,$this->args);
			}
			
		}