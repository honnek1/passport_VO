<?php

namespace Glavfinans\Core\Passport;

use Cycle\Database\Injection\ValueInterface;
use Glavfinans\Core\Exception\EmptyValueException;
use OutOfBoundsException;
use PDO;

/**
 * Объект-значение "Кем выдан"
 */
class IssuingAuthority implements ValueInterface
{
    /** @var string $value - значение кем выдан паспорт */
    protected string $value;

    /**
     * Конструктор объекта "Кем Выдан" паспорта.
     * Содержит необходимые проверки для безопасного конструирования объекта
     *
     * @throws EmptyValueException
     */
    public function __construct(string $issuingAuthority)
    {
        $issuingAuthority = trim($issuingAuthority);

        if (empty($issuingAuthority)) {
            throw new EmptyValueException('Значение "кем выдан" не может быть пустым');
        }

        if (1 !== preg_match('/^[^<>%$#+=!_*@?a-zA-Z]*$/u', $issuingAuthority)) {
            throw new OutOfBoundsException('В значении "кем выдан" содержатся недопустимые символы! Выдан кем: ' . $issuingAuthority);
        }

        $this->value = $issuingAuthority;
    }

    /**
     * Возвращает значение кем выдан паспорт
     *
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * Возвращает true, если значения объектов равны
     *
     * @param IssuingAuthority $issuingAuthority
     * @return bool
     */
    public function isEqual(IssuingAuthority $issuingAuthority): bool
    {
        return $this->getValue() === $issuingAuthority->getValue();
    }

    /**
     * Возвращает строковое значение объекта "Кем выдан"
     *
     * @return string
     */
    public function __toString(): string
    {
        return $this->getValue();
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
        return PDO::PARAM_STR;
    }
}
