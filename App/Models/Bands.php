<?php

namespace App\Models;

use http\Message;

class Bands extends \App\Core\Model
{
    public function __construct (
        public int $id = 0,
        public ?string $name = null,
        public ?string $logo_src = null,
        public ?string $bio = null,
        public ?string $members = null,
        public ?string $discography = null
    )
    {
    }

    static public function setDbColumns()
    {
        return ['id', 'name', 'logo_src', 'bio', 'members', 'discography'];
    }

    static public function setTableName()
    {
        return 'bands';
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
    public function getLogoSrc(): ?string
    {
        return $this->logo_src;
    }

    /**
     * @param string|null $logo_src
     */
    public function setLogoSrc(?string $logo_src): void
    {
        $this->logo_src = $logo_src;
    }

    /**
     * @return string|null
     */
    public function getBio(): ?string
    {
        return $this->bio;
    }

    /**
     * @param string|null $bio
     */
    public function setBio(?string $bio): void
    {
        $this->bio = $bio;
    }

    /**
     * @return string|null
     */
    public function getMembers(): ?string
    {
        return $this->members;
    }

    /**
     * @param string|null $members
     */
    public function setMembers(?string $members): void
    {
        $this->members = $members;
    }

    /**
     * @return string|null
     */
    public function getDiscography(): ?string
    {
        return $this->discography;
    }

    /**
     * @param string|null $discography
     */
    public function setDiscography(?string $discography): void
    {
        $this->discography = $discography;
    }
}