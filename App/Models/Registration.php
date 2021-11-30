<?php

namespace App\Models;

use App\Core\Model;

class Registration extends Model
{
    public function __construct(
        public int $id = 0,
        public ?string $name = null,
        public ?string $surname = null,
        public ?string $mail = null,
        public ?string $userName = null,
        public ?string $password = null
    )
    {
    }

    static public function setDbColumns()
    {
        return ['id', 'name', 'surname', 'mail', 'userName','password'];
    }

    static public function setTableName()
    {
        return 'registration';
    }

    public static function isTaken($parMail)
    {
       $mail = self::getAll('mail = ?', [ $parMail ]);
       if (count($mail) == 0)
           return false;
        return true;
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
    public function getSurname(): ?string
    {
        return $this->surname;
    }

    /**
     * @param string|null $surname
     */
    public function setSurname(?string $surname): void
    {
        $this->surname = $surname;
    }

    /**
     * @return string|null
     */
    public function getMail(): ?string
    {
        return $this->mail;
    }

    /**
     * @param string|null $mail
     */
    public function setMail(?string $mail): void
    {
        $this->mail = $mail;
    }

    /**
     * @return string|null
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * @param string|null $password
     */
    public function setPassword(?string $password): void
    {
        $this->password = $password;
    }

    /**
     * @return string|null
     */
    public function getUserName(): ?string
    {
        return $this->userName;
    }

    /**
     * @param string|null $userName
     */
    public function setUserName(?string $userName): void
    {
        $this->userName = $userName;
    }
}