<?php

namespace Glavfinans\Core\Passport;

use Glavfinans\Core\ValueObject\ValueObjectInterface;
use PDO;

/**
 * Объект-значение Уровня подразделения которое выдало паспорт
 */
class LevelOfDepartment implements ValueObjectInterface
{
    /** @var int УФМС */
    protected const UFMS = 0;

    /** @var int ГУВД или МВД региона */
    protected const GYVD_OR_MVD = 1;

    /** @var int УВД или ОВД района, или города */
    protected const YVD_OVD = 2;

    /** @var int Отделение полиции */
    protected const POLICE_DEPARTMENT = 3;

    /** @var int $code - значение текущего уровня подразделения выдавшего паспорт */
    protected int $code;

    /**
     * LevelOfDepartment constructor.
     *
     * @param int $codeLevel - третья цифра кода подразделения
     */
    public function __construct(int $codeLevel)
    {
        $this->code = $codeLevel;
    }

    /**
     * @inheritDoc
     */
    public function getCode(): int
    {
        return $this->code;
    }

    /**
     * @inheritDoc
     */
    public static function getCodeList(): array
    {
        return [
            self::UFMS,
            self::GYVD_OR_MVD,
            self::YVD_OVD,
            self::POLICE_DEPARTMENT,
        ];
    }

    /**
     * @inheritDoc
     */
    public function getTitle(): string
    {
        return self::getAssocList()[$this->getCode()];
    }

    /**
     * @inheritDoc
     */
    public static function getAssocList(): array
    {
        return [
            self::UFMS => 'УФМС',
            self::GYVD_OR_MVD => 'ГУВД или МВД региона',
            self::YVD_OVD => 'УВД или ОВД района, или города',
            self::POLICE_DEPARTMENT => 'Отделение полиции',
        ];
    }

    /**
     * @inheritDoc
     */
    public static function getList(): array
    {
        return [
            new self(self::UFMS),
            new self(self::GYVD_OR_MVD),
            new self(self::YVD_OVD),
            new self(self::POLICE_DEPARTMENT),
        ];
    }

    /**
     * Сравнение объектов уровня подразделения выдавшего паспорт
     * @param LevelOfDepartment $levelOfDepartment
     * @return bool
     */
    public function isEqual(LevelOfDepartment $levelOfDepartment): bool
    {
        return $this->getCode() === $levelOfDepartment->getCode();
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return (string)$this->code;
    }

    /**
     * @inheritDoc
     */
    public function rawValue(): string
    {
        return $this->__toString();
    }

    /**
     * @inheritDoc
     */
    public function rawType(): int
    {
        return PDO::PARAM_INT;
    }
}
