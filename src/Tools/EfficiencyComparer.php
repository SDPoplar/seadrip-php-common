<?php
namespace SeaDrip\Tools;

class EfficiencyComparer
{
    function result($wanted, ...$args)
    {   
        foreach ($this->method_dict as $method_name => $method) {
            $result = $method(...$args);
            if ($result === $wanted) {
                continue;
            }   
            echo 'result of '.$method_name.':'.PHP_EOL;
            var_dump($result);
            echo PHP_EOL;
        }   
    }

    function speed(int $times, ...$args)
    {   
        foreach ($this->method_dict as $method_name => $method) {
            $ts_start = time();
            for ($i=0; $i < $times; $i++) {
                $a = $method(...$args);
            }   
            echo "{$method_name} run {$times} time(s) in ".(time() - $ts_start).' second(s)'.PHP_EOL;
        }   
    }   

    public function __construct(array $method_dict)
    {   
        $this->method_dict = $method_dict;
    }   

    protected readonly array $method_dict;
}

