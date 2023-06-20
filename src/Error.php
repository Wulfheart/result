<?php

declare(strict_types=1);

namespace Wulfheart\Result;

final class Error
{
    public static function none(): self
    {
        return new self();
    }

}
