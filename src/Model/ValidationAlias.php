<?php

declare(strict_types=1);

namespace MVenghaus\MagewirePluginValidationAlias\Model;

class ValidationAlias
{
    private array $aliases = [];

    public function add($name, $alias): self
    {
        $this->aliases[$name] = $alias;
        return $this;
    }

    public function addMultiple(array $aliases): self
    {
        $this->aliases += $aliases;
        return $this;
    }

    public function getAll(): array
    {
        return $this->aliases;
    }
}
