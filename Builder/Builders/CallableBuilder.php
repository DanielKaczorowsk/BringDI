<?php
	namespace src\Container\Builder\Builders;
	use src\Container\Builder\Builder;
		class CallableBuilder extends builder implements BuilderInterface
		{
			public function build():void
			{
				$this->query->instance = $this->query->method(...$this->query->args);
			}
			
		}