<?php

declare(strict_types=1);

use Konceiver\BladeComponents\View\Components\Percentage;
use function Spatie\Snapshots\assertMatchesSnapshot;

it('should format the given value', function (): void {
    assertMatchesSnapshot((new Percentage())->render()(['slot' => 10]));
    assertMatchesSnapshot((new Percentage())->render()(['slot' => 100]));
    assertMatchesSnapshot((new Percentage())->render()(['slot' => 1000]));
    assertMatchesSnapshot((new Percentage())->render()(['slot' => 10000]));
    assertMatchesSnapshot((new Percentage())->render()(['slot' => 100000]));
    assertMatchesSnapshot((new Percentage())->render()(['slot' => 1000000]));
});
