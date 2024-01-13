<?php declare(strict_types=1);
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PHPUnit\Event\Test;

use const PHP_EOL;
use function sprintf;
use PHPUnit\Event\Code\Test;
use PHPUnit\Event\Event;
use PHPUnit\Event\Telemetry;

/**
 * @psalm-immutable
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise for PHPUnit
 */
final class DeprecationTriggered implements Event
{
    private readonly Telemetry\Info $telemetryInfo;
    private readonly Test $test;

    /**
     * @psalm-var non-empty-string
     */
    private readonly string $message;

    /**
     * @psalm-var non-empty-string
     */
    private readonly string $file;

    /**
     * @psalm-var positive-int
     */
    private readonly int $line;
    private readonly bool $suppressed;
    private readonly bool $ignoredByBaseline;
<<<<<<< HEAD
    private readonly bool $ignoredByTest;
=======
>>>>>>> c0d994e62d4043d8543b32dffe73d33a585d4cf4

    /**
     * @psalm-param non-empty-string $message
     * @psalm-param non-empty-string $file
     * @psalm-param positive-int $line
     */
<<<<<<< HEAD
    public function __construct(Telemetry\Info $telemetryInfo, Test $test, string $message, string $file, int $line, bool $suppressed, bool $ignoredByBaseline, bool $ignoredByTest)
=======
    public function __construct(Telemetry\Info $telemetryInfo, Test $test, string $message, string $file, int $line, bool $suppressed, bool $ignoredByBaseline)
>>>>>>> c0d994e62d4043d8543b32dffe73d33a585d4cf4
    {
        $this->telemetryInfo     = $telemetryInfo;
        $this->test              = $test;
        $this->message           = $message;
        $this->file              = $file;
        $this->line              = $line;
        $this->suppressed        = $suppressed;
        $this->ignoredByBaseline = $ignoredByBaseline;
<<<<<<< HEAD
        $this->ignoredByTest     = $ignoredByTest;
=======
>>>>>>> c0d994e62d4043d8543b32dffe73d33a585d4cf4
    }

    public function telemetryInfo(): Telemetry\Info
    {
        return $this->telemetryInfo;
    }

    public function test(): Test
    {
        return $this->test;
    }

    /**
     * @psalm-return non-empty-string
     */
    public function message(): string
    {
        return $this->message;
    }

    /**
     * @psalm-return non-empty-string
     */
    public function file(): string
    {
        return $this->file;
    }

    /**
     * @psalm-return positive-int
     */
    public function line(): int
    {
        return $this->line;
    }

    public function wasSuppressed(): bool
    {
        return $this->suppressed;
    }

    public function ignoredByBaseline(): bool
    {
        return $this->ignoredByBaseline;
    }

<<<<<<< HEAD
    public function ignoredByTest(): bool
    {
        return $this->ignoredByTest;
    }

=======
>>>>>>> c0d994e62d4043d8543b32dffe73d33a585d4cf4
    public function asString(): string
    {
        $message = $this->message;

        if (!empty($message)) {
            $message = PHP_EOL . $message;
        }

        $status = '';

<<<<<<< HEAD
        if ($this->ignoredByTest) {
            $status = 'Test-Ignored ';
        } elseif ($this->ignoredByBaseline) {
=======
        if ($this->ignoredByBaseline) {
>>>>>>> c0d994e62d4043d8543b32dffe73d33a585d4cf4
            $status = 'Baseline-Ignored ';
        } elseif ($this->suppressed) {
            $status = 'Suppressed ';
        }

        return sprintf(
            'Test Triggered %sDeprecation (%s)%s',
            $status,
            $this->test->id(),
            $message,
        );
    }
}
