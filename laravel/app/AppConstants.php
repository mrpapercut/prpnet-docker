<?php

namespace App;

class AppConstants {
    const SERVER_DELAY = [
        50000 => 6 * 60 * 60,
        100000 => 1 * 24 * 60 * 60,
        200000 => 4 * 24 * 60 * 60,
        300000 => 8 * 24 * 60 * 60,
        400000 => 16 * 24 * 60 * 60,
        500000 => 32 * 24 * 60 * 60,
    ];

    const RESULT_COMPOSITE = 0;
    const RESULT_PRP = 1;
    const RESULT_PRIME = 2;
}
