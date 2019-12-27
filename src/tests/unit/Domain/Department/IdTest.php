<?php

declare(strict_types = 1);

namespace UnitTests\Domain\Department;

use App\Search\Domain\Department\Id;
use App\Search\Domain\Department\InvalidIdException;
use PHPUnit\Framework\TestCase;

class IdTest extends TestCase
{
    /**
     * @var Id
     */
    private $id;

    public function setUp(): void
    {
        parent::setUp();
        $this->id = new Id('id');
    }

    /**
     * @test
     * @throws InvalidIdException
     */
    public function itShouldCreateAValidId() {
        $this->assertInstanceOf(Id::class, $this->id);
    }

    /**
     * @test
     */
    public function itShouldReturnAValue() {
        $this->assertIsString($this->id->value());
    }

    /**
     * @test
     */
    public function itShouldReturnTrueWhenIdsAreEquals() {
        $id2 = new Id('id');
        $this->assertTrue($this->id->equals($id2));
    }

    /**
     * @test
     */
    public function itShouldReturnFalseWhenIdsAreDifferent() {
        $id2 = new Id('id2');
        $this->assertFalse($this->id->equals($id2));
    }

    /**
     * @test
     * @throws InvalidIdException
     */
    public function itShouldThrowAnExceptionForInvalidId() {
        $value = "";
        $this->expectException(InvalidIdException::class);
        $name = new Id($value);
    }
}
