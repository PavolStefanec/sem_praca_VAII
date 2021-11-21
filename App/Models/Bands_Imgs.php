<?php

namespace App\Models;

use App\Core\Model;

class Bands_Imgs extends Model
{
    public function __construct (
        public int $id = 0,
        public int $id_band = 0,
        public ?string $image_src = null,
        public ?string $desc = null
    )
    {
    }

static public function setDbColumns()
{
    return ['id', 'id_band', 'image_src', 'desc'];
}

static public function setTableName()
{
    return 'band_imgs';
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
     * @return int
     */
    public function getIdBand(): int
    {
        return $this->id_band;
    }

    /**
     * @param int $id_band
     */
    public function setIdBand(int $id_band): void
    {
        $this->id_band = $id_band;
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
     * @return string|null
     */
    public function getDesc(): ?string
    {
        return $this->desc;
    }

    /**
     * @param string|null $desc
     */
    public function setDesc(?string $desc): void
    {
        $this->desc = $desc;
    }
}