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

use Illuminate\Support\Arr;
use Illuminate\View\Component;

final class TruncateMiddle extends Component
{
    public function render(): \Closure
    {
        return function (array $data): string {
            $value     = trim((string) $data['slot']);
            $maxLength = Arr::get($data, 'attributes.length', 8) + 3;

            if (strlen($value) <= $maxLength) {
                return $value;
            }

            return substr_replace($value, '...', (int) ceil($maxLength / 2), (int) (strlen($value) - $maxLength));
        };
    }
}
