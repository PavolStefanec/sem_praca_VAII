<?php

namespace App\Models;

class Shop extends \App\Core\Model
{
    public function __construct(
        public int $id = 0,
        public ?string $name = null,
        public ?string $description = null,
        public ?string $image_src = null,
        public int $price = 0,
        public int $left_in_stock = 0,
        public int $stars = 0
    )
    {
    }

    static public function setDbColumns()
    {
        return ['id', 'name', 'description', 'image_src', 'price', 'left_in_stock', 'stars'];
    }

    static public function setTableName()
    {
        return 'shop';
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     */
    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return string|null
     */
    public function getImageSrc(): ?string
    {
        return $this->image_src;
    }

    /**
     * @param string|null $image_src
     */
    public function setImageSrc(?string $image_src): void
    {
        $this->image_src = $image_src;
    }

    /**
     * @return int
     */
    public function getPrice(): int
    {
        return $this->price;
    }

    /**
     * @param int $price
     */
    public function setPrice(int $price): void
    {
        $this->price = $price;
    }

    /**
     * @return int
     */
    public function getLeftInStock(): int
    {
        return $this->left_in_stock;
    }

    /**
     * @param int $left_in_stock
     */
    public function setLeftInStock(int $left_in_stock): void
    {
        $this->left_in_stock = $left_in_stock;
    }

    /**
     * @return int
     */
    public function getStars(): int
    {
        return $this->stars;
    }

    /**
     * @param int $stars
     */
    public function setStars(int $stars): void
    {
        $this->stars = $stars;
    }
}