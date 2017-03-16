<?php

namespace Tasksuki\Component\Message;

use JsonSerializable;

/**
 * Class Message
 *
 * @package Tasksuki\Component\Message
 * @author  Aurimas Niekis <aurimas@niekis.lt>
 */
class Message implements JsonSerializable
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var array
     */
    protected $data;

    public function __construct()
    {
        $this->data = [];
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return Message
     */
    public function setName(string $name): Message
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * @param array $data
     *
     * @return Message
     */
    public function setData(array $data): Message
    {
        $this->data = $data;

        return $this;
    }

    /**
     * Returns Message serialized to array for custom serializers
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'name' => $this->getName(),
            'data' => $this->getData(),
        ];
    }

    /**
     * Creates Message object from serialized array for custom serializers
     *
     * @param array $data
     *
     * @return Message
     */
    public static function fromArray(array $data): Message
    {
        $message = new Message();

        return $message
            ->setName($data['name'])
            ->setData($data['data']);
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}