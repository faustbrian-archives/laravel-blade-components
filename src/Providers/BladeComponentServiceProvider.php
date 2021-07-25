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

namespace Konceiver\BladeComponents\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\View\Compilers\BladeCompiler;
use Konceiver\BladeComponents\View\Components\Currency;
use Konceiver\BladeComponents\View\Components\Number;
use Konceiver\BladeComponents\View\Components\Percentage;
use Konceiver\BladeComponents\View\Components\ShortCurrency;
use Konceiver\BladeComponents\View\Components\ShortPercentage;
use Konceiver\BladeComponents\View\Components\TruncateMiddle;

class BladeComponentServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->callAfterResolving(BladeCompiler::class, function (BladeCompiler $blade) {
            $blade->component('currency', Currency::class);
            $blade->component('number', Number::class);
            $blade->component('percentage', Percentage::class);
            $blade->component('short-currency', ShortCurrency::class);
            $blade->component('short-percentage', ShortPercentage::class);
            $blade->component('truncate-middle', TruncateMiddle::class);
        });
    }
}
