<?php


namespace Ecosystem\Dto;

/**
 * Хранит в себе информацию о валидации
 *
 * Class ValidationResult
 * @package Dto
 */
class ValidationResult
{
    /**
     * @var boolean
     */
    private $isValid ;

    /**
     * @var string
     */
    private $error;

    /**
     * ValidationResult constructor.
     * @param bool $isValid
     * @param string $error
     */
    public function __construct(bool $isValid, string $error = '')
    {
        $this->isValid = $isValid;
        $this->error = $error;
    }

    /**
     * @return bool
     */
    public function isValid(): bool
    {
        return $this->isValid;
    }

    /**
     * @return string
     */
    public function getError(): string
    {
        return $this->error;
    }
}