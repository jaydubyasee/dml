<?php

namespace App;

enum AuditAction
{
    case CHECKED_IN;
    case CHECKED_OUT;
}
