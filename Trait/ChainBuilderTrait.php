<?php
namespace src\Container\Trait;

	trait ChainBuilderTrait
	{
		public function buildChain(array $class,array $args = [])
		{
			if(is_array($class))
				{
					$prev = null;
                    $first = null;
                    foreach($class as $classHandler)
                    {
                        if(!class_exists($classHandler))
                        {
                            throw new \RuntimeException("Handler nie istnieje: $classHandler");
                        }
                        $handler = new $classHandler(...$args);
                        if ($prev)
                        {
                            $prev->setNext($handler);
                        }
                        else
                        {
                            $first = $handler;
                        }
                        $prev = $handler;
                    }
                    return $first->check();
				}
		}
	}
