<?php

namespace syntax\di;

class Person
{
    private ?string $name;
    private ?int $age;
    private int $id;

    public function __construct(private PersonWriter $writer)
    {
    }

    public function __destruct()
    {
        if (!empty($this->id)) {
            // save Person data
            print "saving person\n";
        }
    }

    public function __isset(string $property): bool
    {
        $method = "get{$property}";
        return (method_exists($this, $method));
    }

    public function __get(string $property): mixed
    {
        $method = "get{$property}";
        if (method_exists($this, $method)) {
            return $this->$method();
        }

        return null;
    }

    public function __set(string $property, mixed $value): void
    {
        $method = "set{$property}";
        if (method_exists($this, $method)) {
            $this->$method($value);
        }
    }

    public function __unset(string $property): void
    {
        $method = "set{$property}";
        if (method_exists($this, $method)) {
            $this->$method(null);
        }
    }

    public function __call(string $method, array $args): mixed
    {
        if (method_exists($this->writer, $method)) {
            return $this->writer->$method($this);
        }
        return null;
    }

    public function getName(): string|null
    {
        return $this->name;
    }

    public function setName(?string $name): void
    {
        $this->name = $name;
        if (!is_null($name)) {
            $this->name = strtoupper($this->name);
        }
    }

    public function getAge(): int
    {
        return $this->age;
    }

    public function setAge(?int $age): void
    {
        $this->age = $age;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function __toString():string
    {
        return $this->name ." (age: $this->age )";
    }
}
