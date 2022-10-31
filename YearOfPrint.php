<?php

namespace Glavfinans\Core\Passport;

use DateFmt;
use DateTimeImmutable;
use DateTimeInterface;

/**
 * Класс год печати бланка паспорта (берется из 3,4 цифры серии паспорта)
 */
class YearOfPrint
{
    /** @var null|DateTimeInterface - значение Года выдачи паспорта */
    protected ?DateTimeInterface $value;

    /**
     * Конструктор года печати паспорта
     * @param string $lastNumbersYearOfPrint - Последние две цифры года печати бланка паспорта
     */
    public function __construct(string $lastNumbersYearOfPrint)
    {
        $yearTopBorder = substr((new DateTimeImmutable())->modify('+3 year')->format(DateFmt::D_DB), 2, 2);
        $dateOfPrint = null;

        // С 1997 года выдают паспорта РФ
        if ($lastNumbersYearOfPrint >= 97 && $lastNumbersYearOfPrint <= 99) {
            $dateOfPrint = new DateTimeImmutable("19$lastNumbersYearOfPrint-01-01 00:00:00");
        }

        if ($lastNumbersYearOfPrint >= 00 && $lastNumbersYearOfPrint <= $yearTopBorder) {
            $dateOfPrint = new DateTimeImmutable("20$lastNumbersYearOfPrint-01-01 00:00:00");
        }

        $this->value = $dateOfPrint;
    }

    /**
     * Возвращает значение года печати или null
     *
     * @return DateTimeInterface|null
     */
    public function getValue(): ?DateTimeInterface
    {
        return $this->value;
    }
}
