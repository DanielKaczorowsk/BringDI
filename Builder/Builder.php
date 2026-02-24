<?php
	namespace src\Container\Builder;
		abstract class Builder
		{
			protected ContainerDTO $query;
			protected ContainerProxy $proxy;
			public function __construct(ContainerProxy $proxy)
			{
				$this->proxy = $proxy;
			}
			public function setQuery(ContainerDTO $query):void
			{
				$this->query = $query;
			}
			abstract public function build();
		}