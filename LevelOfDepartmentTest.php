<?php

namespace Passport;

use Glavfinans\Core\Passport\LevelOfDepartment;
use PHPUnit\Framework\TestCase;

/**
 * Тест ValueObject'а уровня подразделения которое выдало паспорт
 */
class LevelOfDepartmentTest extends TestCase
{
    /**
     * Тест метода getCode
     *
     * @return void
     * @covers LevelOfDepartment::getCode
     */
    public function testGetCode(): void
    {
        foreach (LevelOfDepartment::getCodeList() as $code) {
            $levelOfDepartment = new LevelOfDepartment($code);
            $this->assertEquals($code, $levelOfDepartment->getCode());
        }
    }

    /**
     * Тест метода getCodeList
     * Проверяет, что значения уровней подразделения существуют и имеют тип string
     *
     * @covers LevelOfDepartment::getCodeList
     */
    public function testGetCodeList()
    {
        $codeList = LevelOfDepartment::getCodeList();
        $this->assertGreaterThan(0, count($codeList));

        foreach ($codeList as $code) {
            $this->assertIsInt($code);
        }
    }

    /**
     * Тестирует, что название уровня подразделения не пустое
     *
     * @covers LevelOfDepartment::getTitle
     */
    public function testGetTitle()
    {
        foreach (LevelOfDepartment::getCodeList() as $code) {
            $levelOfDepartment = new LevelOfDepartment($code);
            $this->assertNotEmpty($levelOfDepartment->getTitle(), 'Название окато кода региона не может быть пустым. Код:' . $code);
        }
    }

    /**
     * Тест метода getList
     * Проверяет, что объекты уровней подразделения существуют и являются экземплярами класса LevelOfDepartment
     *
     * @covers LevelOfDepartment::getList
     */
    public function testGetList()
    {
        $list = LevelOfDepartment::getList();
        $this->assertGreaterThan(0, count($list));

        foreach ($list as $level) {
            $this->assertInstanceOf(LevelOfDepartment::class, $level);
        }
    }

    /**
     * Тест функции isEqual
     *
     * @covers LevelOfDepartment::isEqual
     */
    public function testIsEqual()
    {
        $levelOfDepartment = new LevelOfDepartment(LevelOfDepartment::getCodeList()[0]);
        $otherLevelOfDepartment = new LevelOfDepartment(LevelOfDepartment::getCodeList()[1]);

        $this->assertTrue($levelOfDepartment->isEqual(clone $levelOfDepartment));
        $this->assertFalse($levelOfDepartment->isEqual($otherLevelOfDepartment));
    }
}
