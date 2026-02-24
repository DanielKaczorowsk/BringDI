<?php
    namespace src\Container\Handler;
    use src\Container\DTO\ContainerDTO;
    use src\Container\Proxy\ContainerProxy;
        abstract class ContainerHandler
        {
            protected  ContainerDTO $query;
            protected  ?ContainerProxy $serviceContainer;
            protected ?ContainerHandler $next = null;
            protected array $result = [];
            public function __construct(ContainerDTO $query)
            {
                $this->query = $query;
            }
            public function setNext($next): void
            {
                $this->next = $next;
            }
           public function check(array &$results =[]):  array
           {
               $this->handle($results);
               if ($this->next !== null)
               {
                  $this->next->check($results);
               }
               return $results;
            }
            abstract protected function handle(array &$results =[]): void;
        }