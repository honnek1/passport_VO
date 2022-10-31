<?php

namespace Glavfinans\Core\Passport;

use DateFmt;
use Glavfinans\Core\Exception\NotFoundException;
use OutOfBoundsException;

/**
 * Passport - объект собранный из нескольких объектов: Series, Number, DateOfIssue, IssuingAuthority, DepartmentCode
 */
class Passport
{
    /**
     * Заполняет свойства соответствующими объектами
     *
     * @param Series $series
     * @param Number $number
     * @param DateOfIssue $dateOfIssue
     * @param IssuingAuthority $issuedBy
     * @param DepartmentCode $departmentCode
     */
    public function __construct(
        protected Series           $series,
        protected Number           $number,
        protected DateOfIssue      $dateOfIssue,
        protected IssuingAuthority $issuedBy,
        protected DepartmentCode   $departmentCode,
    ) {
    }

    /**
     * Более сложные проверки на валидность паспорта
     * Если все проверки пройдены - вернет true, иначе выбрасывает Exception
     *
     * @return bool
     * @throws NotFoundException
     */
    public function isValid(): bool
    {
        // Проверка на существование Окато кода региона
        if (!in_array($this->getSeries()->getOKATO()->getCode(), Okato::getCodeList())) {
            throw new NotFoundException(message: 'Такой код ОКТАО не найден, пришел код: '
                . $this->getSeries()->getOKATO()->getCode());
        }

        // Дата печати должна быть с 1997 по (текущий год + 3года)
        if (null === $this->getSeries()->getYearOfPrint()->getValue()) {
            throw new OutOfBoundsException(message: 'Неверные последние две цифры серии паспорта. Серия: '
                . $this->getSeries()->getValue());
        }

        // Если плановая дата выдачи позже реальной даты выдачи, то кидаем Исключение
        if ($this->getDateOfIssue()->getValue() < $this->getDateOfIssue()->getPlannedDateOfIssue()) {
            throw new OutOfBoundsException(message: 'Неверная дата рождения или дата выдачи! Вы ввели дату выдачи: '
                . $this->getDateOfIssue()->getValue()->format(DateFmt::DT_DB));
        }

        // Проверка на существование кода субъекта региона
        if (!in_array($this->getDepartmentCode()->getCodeOfSubject()->getCode(), CodeOfSubject::getCodeList())) {
            throw new NotFoundException(message: 'Такой кода субъекта региона не найден, пришел код: '
                . $this->getDepartmentCode()->getCodeOfSubject()->getCode());
        }

        // Проверка на существование такого уровня подразделения выдавшего паспорт
        if (!in_array($this->getDepartmentCode()->getLevel()->getCode(), LevelOfDepartment::getCodeList())) {
            throw new NotFoundException(message: 'Такой код уровня подразделения не найден, третья цифра кода подразделения паспорта : '
                . $this->getDepartmentCode()->getLevel()->getCode());
        }

        // Проверка даты печати бланка паспорта
        if (!$this->yearOfPrintIsValid()) {
            throw new OutOfBoundsException(message: 'Неверная дата выдачи или серия паспорта. Серия: '
                . $this->getSeries()->getValue());
        }

        return true;
    }

    /**
     * Вернет true если дата выдачи паспорта попадает в период от годПечати-5 до годПечати+3, иначе false
     *
     * @return bool
     */
    protected function yearOfPrintIsValid(): bool
    {
        $dateOfBottomBorder = $this->getSeries()->getYearOfPrint()->getValue()->modify('-5 year');
        $dateOfTopBorder = $this->getSeries()->getYearOfPrint()->getValue()->modify('+3 year');

        if ($this->getDateOfIssue()->getValue() < $dateOfBottomBorder || $this->getDateOfIssue()->getValue() > $dateOfTopBorder) {
            return false;
        }

        return true;
    }

    /**
     * Возвращает серию паспорта
     *
     * @return Series
     */
    public function getSeries(): Series
    {
        return $this->series;
    }

    /**
     * Возвращает номер паспорта
     *
     * @return Number
     */
    public function getNumber(): Number
    {
        return $this->number;
    }

    /**
     * Возвращает дату выдачи
     *
     * @return DateOfIssue
     */
    public function getDateOfIssue(): DateOfIssue
    {
        return $this->dateOfIssue;
    }

    /**
     * Возвращает значение "кем выдан"
     *
     * @return IssuingAuthority
     */
    public function getIssuedBy(): IssuingAuthority
    {
        return $this->issuedBy;
    }

    /**
     * Возвращет код подразделения
     *
     * @return DepartmentCode
     */
    public function getDepartmentCode(): DepartmentCode
    {
        return $this->departmentCode;
    }

    /**
     * Возвращает серию и номер в формате склеенной строки (0315120435)
     * @return string
     */
    public function getSeriesAndNumber(): string
    {
        return $this->getSeries()->getValue() . $this->getNumber()->getValue();
    }

    /**
     * Возвращает строку серии/номера паспорта и кода подразделения
     * @return string
     */
    public function getSeriesNumberCode(): string
    {
        return 'серия: ' . $this->getSeries()->getValue() .
            ' номер: ' . $this->getNumber()->getValue() .
            ' код подразделения: ' . $this->getDepartmentCode()->getValue();
    }

    /**
     * Возвращает строку серии/номера паспорта в виде 12** ***890
     *
     * @return string
     */
    public function getMaskedPassportSeriesNumber(): string
    {
        return substr($this->getSeries()->getValue(), 0, 2) . '** '
            . '***' . substr($this->getNumber()->getValue(), 3);
    }

    /**
     * Возвращает паспортные данные строкой для документов
     *
     * @return string
     */
    public function getPassportDataForDocuments(): string
    {
        return 'Серия: ' . $this->getSeries()->getValue() .
            ' Номер: ' . $this->getNumber()->getValue() . ', ' .
            'Код подразделения: ' . $this->getDepartmentCode()->getValue() . ', ' .
            'Выдан ' . $this->getDateOfIssue()->getValue()->format(DateFmt::D_APP_NEW) . ' г. ' .
            $this->getIssuedBy()->getValue() . ' ';

    }

    /**
     * Возвращает строку с серией и номером в формате 12 34 567890
     * @return string
     */
    public function getFormattedSeriesAndNumber(): string
    {
        return $this->getSeries()->getOKATO()->getCode() . ' '
            . substr($this->getSeries()->getYearOfPrint()->getValue()->format(DateFmt::D_DB), 2, 2) . ' '
            . $this->getNumber()->getValue();
    }
}
