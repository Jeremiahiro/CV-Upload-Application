<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static Male()
 * @method static static Female()
 * @method static static Others()
 */
final class Gender extends Enum
{
    const Male =   0;
    const Female =   1;
    const Others = 2;
}
