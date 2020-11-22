<?php

declare(strict_types=1);

use Illuminate\Support\Facades\View;
use Konceiver\BladeComponents\View\Components\TruncateMiddle;
use function Spatie\Snapshots\assertMatchesSnapshot;

it('should format the given value', function (): void {
    assertMatchesSnapshot((new TruncateMiddle())->render()([
        'slot' => 'I am a very long string',
    ]));

    assertMatchesSnapshot((new TruncateMiddle())->render()([
        'slot'        => 'I am a very long string',
        ['attributes' => ['length' => 10]],
    ]));

    assertMatchesSnapshot((new TruncateMiddle())->render()([
        'slot'        => 'I am a very long string',
        ['attributes' => ['length' => 1]],
    ]));

    assertMatchesSnapshot((new TruncateMiddle())->render()([
        'slot' => 'short',
    ]));

    assertMatchesSnapshot((new TruncateMiddle())->render()([
        'slot'        => 'a',
        ['attributes' => ['length' => 10]],
    ]));

    assertMatchesSnapshot((new TruncateMiddle())->render()([
        'slot' => 'abcd',
    ]));

    assertMatchesSnapshot((new TruncateMiddle())->render()([
        'slot'        => 'abcdefghijklmnopqrstuvwxyz',
        ['attributes' => ['length' => 100]],
    ]));
});

it('should render when included in a blade view', function (): void {
    View::addLocation(realpath(__DIR__.'/../../../views'));

    $this->assertView('truncate-middle', ([
        'slot' => 'I am a very long string',
    ]))->contains('I am a...tring');

    $this->assertView('truncate-middle-with-length', ([
        'slot'   => 'I am a very long string',
        'length' => 10,
    ]))->contains('I am a ...string');

    $this->assertView('truncate-middle-with-length', ([
        'slot'   => 'I am a very long string',
        'length' => 1,
    ]))->contains('I ...ng');

    $this->assertView('truncate-middle', ([
        'slot' => 'short',
    ]))->contains('short');

    $this->assertView('truncate-middle-with-length', ([
        'slot'   => 'a',
        'length' => 10,
    ]))->contains('a');

    $this->assertView('truncate-middle', ([
        'slot' => 'abcd',
    ]))->contains('abcd');

    $this->assertView('truncate-middle-with-length', [
        'slot'   => 'abcdefghijklmnopqrstuvwxyz',
        'length' => 100,
    ])->contains('abcdefghijklmnopqrstuvwxyz');
});
