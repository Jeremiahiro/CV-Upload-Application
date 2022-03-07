<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static inactive()
 * @method static static active()
 */
final class CvStatus extends Enum
{
    const inactive =   0;
    const active =   1;
}
