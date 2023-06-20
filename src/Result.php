<?php

declare(strict_types=1);

namespace Wulfheart\Result;

/**
 * Represents the result of an operation that can either succeed or produce an error.
 *
 * @template TValue
 * @template TError
 */
class Result
{
    /**
     * @var TValue|null The value contained in the Result if it represents success.
     */
    private mixed $value;

    /**
     * @var TError|null The error contained in the Result if it represents an error.
     */
    private mixed $error;

    /**
     * Constructs a new Result representing success with a value.
     *
     * @param ?TValue $value The value representing the successful result.
     */
    private function __construct($value = null)
    {
        $this->value = $value;
    }

    /**
     * Constructs a new Result representing an error with an error value.
     *
     * @param TError $error The error value representing the error result.
     */
    private function __constructError($error): void
    {
        $this->error = $error;
    }

    /**
     * Creates a new Result representing success with a value.
     *
     * @template TValue
     * @param (TValue is void ? null : TValue) $value The value representing the successful result.
     * @return self<TValue, mixed> The Result object representing success.
     */
    public static function ok($value = null): self
    {
        return new self($value);
    }

    /**
     * Creates a new Result representing an error with an error value.
     *
     * @template TError
     * @param TError $error The error value representing the error result.
     * @return self<mixed, TError> The Result object representing an error.
     */
    public static function err($error): self
    {
        return new self($error);
    }

    /**
     * Checks whether the Result represents success.
     *
     * @return bool True if the Result represents success, false otherwise.
     */
    public function isSuccess(): bool
    {
        return $this->value !== null;
    }

    /**
     * Checks whether the Result represents an error.
     *
     * @return bool True if the Result represents an error, false otherwise.
     */
    public function isError(): bool
    {
        return $this->error !== null;
    }

    /**
     * Returns the value contained in the Result if it represents success.
     *
     * @return TValue The value contained in the Result.
     *
     * @throws \RuntimeException if the Result represents an error.
     */
    public function unwrap()
    {
        if ($this->isError()) {
            throw new \RuntimeException('Called unwrap() on a Result that represents an error.');
        }

        return $this->value;
    }

    /**
     * Returns the error value contained in the Result if it represents an error.
     *
     * @return TError The error value contained in the Result.
     *
     * @throws \RuntimeException if the Result represents success.
     */
    public function unwrapError()
    {
        if ($this->isSuccess()) {
            throw new \RuntimeException('Called unwrapError() on a Result that represents success.');
        }

        return $this->error;
    }
}
