<?php

declare(strict_types = 1);

namespace WghtTrackApp_ClassLib\App;

use Psr\Container\ContainerInterface;

class Container implements ContainerInterface{
    private array $entries = [];
    public function get(string $id){
        if(! $this->has($id)){
            // throw new NotFoundException('Class ' . $id . ' has no bindings.');
            $entry = $this->entries[$id];
            return $entry($this);
        }

        
    }
    public function has(string $id): bool{
        return isset($this->entries[$id]);
    }

    public function set(string $id, callable $concrete): void{
        $this->entries[$id] = $concrete;
    }
}