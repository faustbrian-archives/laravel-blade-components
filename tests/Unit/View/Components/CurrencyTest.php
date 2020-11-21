<?php

declare(strict_types=1);

use Konceiver\BladeComponents\View\Components\Currency;
use function Spatie\Snapshots\assertMatchesSnapshot;

it('should format the given value', function (): void {
    assertMatchesSnapshot((new Currency('USD'))->render()(['slot' => 10]));
    assertMatchesSnapshot((new Currency('USD'))->render()(['slot' => 100]));
    assertMatchesSnapshot((new Currency('USD'))->render()(['slot' => 1000]));
    assertMatchesSnapshot((new Currency('USD'))->render()(['slot' => 10000]));
    assertMatchesSnapshot((new Currency('USD'))->render()(['slot' => 100000]));
    assertMatchesSnapshot((new Currency('USD'))->render()(['slot' => 1000000]));

    assertMatchesSnapshot((new Currency('USD'))->render()(['slot' => 10, 'attributes' => ['decimals' => 0]]));
    assertMatchesSnapshot((new Currency('USD'))->render()(['slot' => 100, 'attributes' => ['decimals' => 0]]));
    assertMatchesSnapshot((new Currency('USD'))->render()(['slot' => 1000, 'attributes' => ['decimals' => 0]]));
    assertMatchesSnapshot((new Currency('USD'))->render()(['slot' => 10000, 'attributes' => ['decimals' => 0]]));
    assertMatchesSnapshot((new Currency('USD'))->render()(['slot' => 100000, 'attributes' => ['decimals' => 0]]));
    assertMatchesSnapshot((new Currency('USD'))->render()(['slot' => 1000000, 'attributes' => ['decimals' => 0]]));
});
