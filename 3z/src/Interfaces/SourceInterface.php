<?php

namespace src\Interfaces;

interface SourceInterface {

    /**
     * Поиск одной записи
     *
     * @param integer $id
     * @return array
     */
    public function find(int $id): array;

    /**
     * Поиск всех записей
     *
     * @param array $params
     * @return array
     */
    public function findAll(array $params): array;

    /**
     * Создание новой записи
     *
     * @param integer $id
     * @param array $data
     * @return boolean
     */
    public function create(int $id, $data) : bool;

    /**
     * Удаление по ID
     *
     * @param integer $id
     * @return boolean
     */
    public function remove(int $id) : bool;

}