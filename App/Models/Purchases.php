<?php

namespace App\Models;

class Purchases extends \App\Core\Model
{
    public function __construct(
        public int $id = 0,
        public int $id_item = 0,
        public int $id_customer = 0
    )
    {
    }

    static public function setDbColumns()
    {
        return ['id', 'id_item', 'id_customer'];
    }

    static public function setTableName()
    {
        return 'purchases';
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
    public function getIdItem(): int
    {
        return $this->id_item;
    }

    /**
     * @param int $id_item
     */
    public function setIdItem(int $id_item): void
    {
        $this->id_item = $id_item;
    }

    /**
     * @return int
     */
    public function getIdCustomer(): int
    {
        return $this->id_customer;
    }

    /**
     * @param int $id_customer
     */
    public function setIdCustomer(int $id_customer): void
    {
        $this->id_customer = $id_customer;
    }
}