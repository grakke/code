<?php

namespace Tests\DesignPatterns;

use ArrayIterator;
use DesignPatterns\Structural\DataMapper\User;
use DesignPatterns\Structural\DataMapper\UserMapper;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class DataMapperTest extends TestCase
{
    /**
     * @var UserMapper
     * @skip
     */
    protected $mapper;

    protected $dbal;

    public function setUp(): void
    {
        $this->dbal = $this->getMockBuilder('DesignPatterns\Structural\DataMapper\DBAL')
            ->disableAutoload()
            ->setMethods(array('insert', 'update', 'find', 'findAll'))
            ->getMock();

        $this->mapper = new UserMapper($this->dbal);
    }

    public function getNewUser()
    {
        return array(array(new User(null, 'Odysseus', 'Odysseus@ithaca.gr')));
    }

    public function getExistingUser()
    {
        return array(array(new User(1, 'Odysseus', 'Odysseus@ithaca.gr')));
    }

    /**
     * @dataProvider getNewUser
     */
    public function testPersistNew(User $user)
    {
        $this->dbal->expects($this->once())
            ->method('insert');
        $this->mapper->save($user);
    }

    /**
     * @dataProvider getExistingUser
     */
    public function testPersistExisting(User $user)
    {
        $this->dbal->expects($this->once())
            ->method('update');
        $this->mapper->save($user);
    }

    /**
     * @dataProvider getExistingUser
     */
    public function testRestoreOne(User $existing)
    {
        $row = array(
            'userid' => 1,
            'username' => 'Odysseus',
            'email' => 'Odysseus@ithaca.gr'
        );
        $rows = new ArrayIterator(array($row));
        $this->dbal->expects($this->once())
            ->method('find')
            ->with(1)
            ->will($this->returnValue($rows));

        $user = $this->mapper->findById(1);
        $this->assertEquals($existing, $user);
    }

    /**
     * @dataProvider getExistingUser
     */
    public function testRestoreMulti(User $existing)
    {
        $rows = array(array('userid' => 1, 'username' => 'Odysseus', 'email' => 'Odysseus@ithaca.gr'));
        $this->dbal->expects($this->once())
            ->method('findAll')
            ->will($this->returnValue($rows));

        $user = $this->mapper->findAll();
        $this->assertEquals(array($existing), $user);
    }

    public function testNotFound()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("User #404 not found");
        $this->dbal->expects($this->once())
            ->method('find')
            ->with(404)
            ->will($this->returnValue(array()));

        $user = $this->mapper->findById(404);
    }
}
