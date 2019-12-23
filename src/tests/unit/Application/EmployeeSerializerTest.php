<?php

declare(strict_types=1);

namespace UnitTests\Application;

use App\Application\EmployeeSerializer;
use App\Application\GetTotalEmployeesQuery;
use App\Domain\DepartmentRange;
use PHPUnit\Framework\TestCase;
use UnitTests\Domain\FakeEmployee;
use UnitTests\Domain\FakeManager;

class EmployeeSerializerTest extends TestCase
{
    const SERIALIZER_KEYS = [
        'id',
        'birthDate',
        'firstName',
        'lastName',
        'gender',
        'hireDate',
        'departments',
        'salaries',
        'titles'
    ];

    const DEPARTMENT_KEYS = [
        'department',
        'from',
        'to'
    ];

    const SALARY_KEYS = [
        'salary',
        'from',
        'to'
    ];

    const TITLE_KEYS = [
        'title',
        'from',
        'to'
    ];

    /** @test */
    public function itShouldReturnASerializedArray() {
        $bus = new QueryBusStub();

        $employeeRepository = $bus->employeeRepository();
        $employee = FakeEmployee::withAllInfo();
        $employeeRepository->add($employee);

        $employeeSerializer = new EmployeeSerializer();
        $serialized = $employeeSerializer->serialize($employee);

        foreach(self::SERIALIZER_KEYS as $key) {
            $this->assertArrayHasKey($key, $serialized);
        }

        foreach(self::DEPARTMENT_KEYS as $key) {
            $this->assertArrayHasKey($key, $serialized['departments'][0]);
        }

        foreach(self::SALARY_KEYS as $key) {
            $this->assertArrayHasKey($key, $serialized['salaries'][0]);
        }

        foreach(self::TITLE_KEYS as $key) {
            $this->assertArrayHasKey($key, $serialized['titles'][0]);
        }
    }
}
