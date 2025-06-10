<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use IW\Workshop\PostService;
use IW\Workshop\Client\Curl;

final class PostServiceTest extends TestCase
{
    public function testCreatePostReturnsId(): void
    {
        $mockCurl = $this->createMock(Curl::class);
        $mockCurl->method('post')
            ->willReturn([
                201,
                json_encode(['id' => 123])
            ]);

        $service = new PostService($mockCurl);
        $this->assertSame(123, $service->createPost(['title' => 'Hello']));
    }

    public function testCreatePostThrowsExceptionOnNon201(): void
    {
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage('Post could not be created.');

        $mockCurl = $this->createMock(Curl::class);
        $mockCurl->method('post')
            ->willReturn([
                400,
                json_encode(['error' => 'Bad Request'])
            ]);

        $service = new PostService($mockCurl);
        $service->createPost(['title' => 'Hello']);
    }

    public function testCreatePostThrowsExceptionIfIdMissing(): void
    {
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage('An id of article could not be retrieved.');

        $mockCurl = $this->createMock(Curl::class);
        $mockCurl->method('post')
            ->willReturn([
                201,
                json_encode(['title' => 'Test']) // no id!
            ]);

        $service = new PostService($mockCurl);
        $service->createPost(['title' => 'Hello']);
    }
}
