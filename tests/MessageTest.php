<?php

namespace Tasksuki\Component\Message\Test;

use PHPUnit\Framework\TestCase;
use Tasksuki\Component\Message\Message;

/**
 * Class MessageTest
 *
 * @package Tasksuki\Component\Message\Test
 * @author  Aurimas Niekis <aurimas@niekis.lt>
 */
class MessageTest extends TestCase
{
    public function testInitialization()
    {
        $message = new Message();

        static::assertInstanceOf(Message::class, $message);
    }

    public function testToArray()
    {
        $message = new Message();

        $message
            ->setName('foo_bar')
            ->setData(['foo' => 'bar']);

        $expected = [
            'name' => 'foo_bar',
            'data' => ['foo' => 'bar']
        ];

        static::assertEquals($expected, $message->toArray());
    }

    public function testFromArray()
    {
        $given = [
            'name' => 'foo_bar',
            'data' => ['foo' => 'bar']
        ];

        $message = Message::fromArray($given);

        static::assertEquals($given['name'], $message->getName());
        static::assertEquals($given['data'], $message->getData());
    }

    public function testJsonEncode()
    {
        $message = new Message();

        $message
            ->setName('foo_bar')
            ->setData(['foo' => 'bar']);

        $expected = [
            'name' => 'foo_bar',
            'data' => ['foo' => 'bar']
        ];

        static::assertJsonStringEqualsJsonString(json_encode($expected), json_encode($message));
    }
}
