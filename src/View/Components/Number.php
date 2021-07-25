<?php

declare(strict_types=1);

/*
 * This file is part of Laravel Blade Components.
 *
 * (c) Konceiver <info@konceiver.dev>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Konceiver\BladeComponents\View\Components;

use Closure;
use Illuminate\View\Component;
use Konceiver\BetterNumberFormatter\BetterNumberFormatter;

final class Number extends Component
{
    public function render(): Closure
    {
        return function (array $data): string {
            return BetterNumberFormatter::new()->formatWithDecimal((float) trim((string) $data['slot']));
        };
    }
}
