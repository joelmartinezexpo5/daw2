<?php


namespace Product\Models;


class ProductModel
{
    private string $name;
    private string $description;
    private string $price;
    private string $image;

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function getImage(): string
    {
        return $this->image;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    public function setImage(string $image): void
    {
        $this->image = $image;
    }
}
