<?php
	namespace src\Container\Builder\Builders;
	use src\Container\Builder\Builder;
		class EnumBuilder extends Builder implements BuilderInterface
		{
			public function build():void
			{
				if($this->query->reflection === true)
				{
					$this->query->reflectionInstance = new \ReflectionClass($this->query->method);
				}
				if($this->query->autoWire === false)
				{
					$this->query->instance = new $this->query->method(...$this->query->args);
				}
			}
		}