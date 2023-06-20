<?php

declare(strict_types=1);

namespace Wulfheart\Result\Dir;

use Wulfheart\Result\Error;
use Wulfheart\Result\Result;

const ERR_ONE = 'ERR_ONE';
const ERR_TWO = 'ERR_TWO';

final class Operation
{
    /**
     * @return Result<void, ERR_ONE|ERR_TWO>
     */
    public static function execute(): Result
    {
        return Result::ok();
    }

}
