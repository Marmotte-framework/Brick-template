<?php

declare(strict_types=1);

namespace Marmotte\BrickName;

use Marmotte\Brick\Bricks\BrickLoader;
use Marmotte\Brick\Bricks\BrickManager;
use Marmotte\Brick\Cache\CacheManager;
use Marmotte\Brick\Mode;
use PHPUnit\Framework\TestCase;

class LoadBrickTest extends TestCase
{
    public function testBrickCanBeLoaded(): void
    {
        $brick_manager = new BrickManager();
        $brick_loader  = new BrickLoader(
            $brick_manager,
            new CacheManager(mode: Mode::TEST)
        );
        $brick_loader->loadFromDir(__DIR__ . '/../src');

        $bricks = $brick_manager->getBricks();
        self::assertCount(1, $bricks);
        $brick = $bricks[0];
        self::assertSame(MyBrick::class, $brick->brick->getName());
    }
}
