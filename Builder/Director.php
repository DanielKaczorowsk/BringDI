<?php 
	namespace src\Container\Builder;
	use src\Container\Proxy\ContainerProxy;
	use src\Container\DTO\ContainerDTO;
		class Director
		{
			private ?ContainerProxy $container;
			private array $class = [];
			private ?ContainerDTO $query;
			public function __construct(ContainerProxy $container)
			{
				$this->container = $container;
			}
			public function setClass(array $class):	void
			{
				$this->class = $class;
			}
			public function setQuery(ContainerDTO $query): void
			{
				$this->query = $query;
			}
			public function build():void
			{
				foreach($this->class as $class)
				{
					$builders = $this->container->method($class)->args($this->container)->get();
					$builder->build();
				}
			}
		}