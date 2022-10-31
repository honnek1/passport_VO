v<?php

declare(strict_types=1);

namespace Passport;


use Glavfinans\Core\Exception\EmptyValueException;
use Glavfinans\Core\Passport\CodeOfSubject;
use Glavfinans\Core\Passport\DepartmentCode;
use Glavfinans\Core\Passport\LevelOfDepartment;
use OutOfBoundsException;
use PHPUnit\Framework\TestCase;

/**
 * Class DepartmentCodeTest - Unit тест для объекта DepartmentCode
 */
class DepartmentCodeTest extends TestCase
{
    /**
     * Тест корректного создания объектов DepartmentCode
     *
     * @covers DepartmentCode::__construct
     */
    public function testCreation()
    {
        $arrayOfDepartmentCode = [
            '230-005',
            '031-004',
            '010-055',
            '053-445'
        ];

        foreach ($arrayOfDepartmentCode as $departmentCode) {
            $this->assertEquals($departmentCode, (new DepartmentCode($departmentCode))->getValue());
        }
    }

    /**
     * Тест некорректного создания объектов DepartmentCode
     *
     * @covers DepartmentCode::__construct
     */
    public function testFailedCreation()
    {
        $arrayOfDepartmentCode = [
            '2300054',
            '031-A04',
            '0104-44',
            '053-445'
        ];

        foreach ($arrayOfDepartmentCode as $departmentCode) {
            $this->expectException(OutOfBoundsException::class);
            new DepartmentCode($departmentCode);
        }
        $this->expectException(EmptyValueException::class);
        new DepartmentCode('');
    }

    /**
     * Тест метода isEqual
     *
     * @covers DepartmentCode::isEqual
     */
    public function testIsEqual()
    {
        $firstDepartmentCode = new DepartmentCode('230-005');
        $secondDepartmentCode = new DepartmentCode('203-150');

        $this->assertTrue($firstDepartmentCode->isEqual(clone $firstDepartmentCode));
        $this->assertFalse($firstDepartmentCode->isEqual($secondDepartmentCode));
    }

    /**
     * Тест метода getCodeOfSubject, проверяет что getCodeOfSubject вернет объект класса CodeOfSubject
     *
     * @covers DepartmentCode::getCodeOfSubject
     */
    public function testGetCodeOfSubject()
    {
        $arrayOfDepartmentCode = [
            '230-005',
            '031-004',
            '010-055',
            '053-445'
        ];

        foreach ($arrayOfDepartmentCode as $departmentCode) {
            $departmentCode = new DepartmentCode($departmentCode);
            $this->assertInstanceOf(CodeOfSubject::class, $departmentCode->getCodeOfSubject());
        }
    }

    /**
     * Тест метода getLevel, проверяет что getLevel вернет объект класса LevelOfDepartment
     *
     * @covers DepartmentCode::getLevel
     */
    public function testGetLevel()
    {
        $arrayOfDepartmentCode = [
            '230-005',
            '031-004',
            '010-055',
            '053-445'
        ];

        foreach ($arrayOfDepartmentCode as $departmentCode) {
            $departmentCode = new DepartmentCode($departmentCode);
            $this->assertInstanceOf(LevelOfDepartment::class, $departmentCode->getLevel());
        }
    }
}
