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

use Closure;
use Illuminate\Support\Arr;
use Illuminate\View\Component;
use Konceiver\BetterNumberFormatter\BetterNumberFormatter;

final class Currency extends Component
{
    private string $currency;

    public function __construct(string $currency)
    {
        $this->currency = $currency;
    }

    public function render(): Closure
    {
        return function (array $data): string {
            $decimals = null;

            if (Arr::has($data, 'attributes.decimals')) {
                $decimals = (int) Arr::get($data, 'attributes.decimals');
            }

            return BetterNumberFormatter::new()->formatWithCurrencyCustom(trim((string) $data['slot']), $this->currency, $decimals);
        };
    }
}
