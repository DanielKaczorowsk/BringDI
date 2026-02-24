<?php 
	namespace src\Container\Factory;
	use src\Container\Enum\ClassEnum;
	use src\Container\DTO\ContainerDTO;
	use src\Container\Trait\ChainBuilderTrait;
	use src\Container\Proxy\ContainerProxy;
	use src\Container\Builder\Director;
		class FactoryContainer
		{
			use ChainBuilderTrait;
			
			private ?ContainerProxy $container = null;
			private ?ContainerDTO $query = null;
			private array $cache=[];
			private ?Director $director = null;
			public function set(ContainerDTO $query):	void
			{
				$this->query = $query;
			}
			public function containerProxy(ContainerProxy $container):	void
			{
				$this->container = $container;
			}
			public function load():	void
			{
				$config = $this->query->config;
				match($this->query->reflection)
				{
					true => $classHandler = $config[ClassEnum::ContainerHandlerReflection->value],
					false => $classHandler = $config[ClassEnum::ContainerHandler->value],
				};
				$array = $this->buildChain($classHandler,[$this->query]);
				$this->director = $this->ContainerProxy->method(config[ClassEnum::Director->value])->args($array)->get();
			}
			public function get():array|object
			{
				$this->director->build();
				$instance = $this->query->instance;
				$hash = is_object($instance) ? spl_object_id($instance) : md5($instance);
				$globalCache = $this->ContainerProxy->method($config[ClassEnum::GloablCache->value])->get();
				$globalCache->set($hash,$instance);
				return $this->query->cacheInstance = $globalCache->getInstance();
			}
			
		}