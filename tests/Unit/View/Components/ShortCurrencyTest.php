<?php

declare(strict_types=1);

use Konceiver\BladeComponents\View\Components\ShortCurrency;
use function Spatie\Snapshots\assertMatchesSnapshot;

it('should format the given value', function (): void {
    assertMatchesSnapshot((new ShortCurrency('en-US'))->render()(['slot' => 10]));
    assertMatchesSnapshot((new ShortCurrency('en-US'))->render()(['slot' => 100]));
    assertMatchesSnapshot((new ShortCurrency('en-US'))->render()(['slot' => 1000]));
    assertMatchesSnapshot((new ShortCurrency('en-US'))->render()(['slot' => 10000]));
    assertMatchesSnapshot((new ShortCurrency('en-US'))->render()(['slot' => 100000]));
    assertMatchesSnapshot((new ShortCurrency('en-US'))->render()(['slot' => 1000000]));
});
