<?php

declare(strict_types=1);

use Konceiver\BladeComponents\View\Components\TruncateMiddle;
use function Spatie\Snapshots\assertMatchesSnapshot;

it('should format the given value', function (): void {
    assertMatchesSnapshot((new TruncateMiddle('I am a very long string'))->render());
    assertMatchesSnapshot((new TruncateMiddle('I am a very long string', 10))->render());
    assertMatchesSnapshot((new TruncateMiddle('I am a very long string', 1))->render());
    assertMatchesSnapshot((new TruncateMiddle('short'))->render());
    assertMatchesSnapshot((new TruncateMiddle('a', 10))->render());
    assertMatchesSnapshot((new TruncateMiddle('abcd'))->render());
    assertMatchesSnapshot((new TruncateMiddle('abcdefghijklmnopqrstuvwxyz', 100))->render());
});
