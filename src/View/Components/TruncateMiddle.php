<?php

declare(strict_types=1);

/*
 * This file is part of Laravel Blade Components.
 *
 * (c) Konceiver Oy <info@konceiver.dev>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Konceiver\BladeComponents\View\Components;

use Illuminate\View\Component;

final class TruncateMiddle extends Component
{
    private string $value;

    private int $length;

    public function __construct(string $value, int $length = 8)
    {
        $this->value  = $value;
        $this->length = $length;
    }

    public function render(): string
    {
        $maxLength = $this->length + 3;

        if (strlen($this->value) <= $maxLength) {
            return $this->value;
        }

        return substr_replace($this->value, '...', ceil($maxLength / 2), strlen($this->value) - $maxLength);
    }
}
