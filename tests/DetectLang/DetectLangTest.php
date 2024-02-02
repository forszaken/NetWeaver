<?php

declare(strict_types=1);

namespace Test\DetectLang;

use DetectLang\LangRequest;
use PHPUnit\Framework\TestCase;

use function DetectLang\detectLang;

class DetectLangTest extends TestCase
{
    public function testDefault(): void
    {
        $request = $this->createMock(LangRequest::class);
        $request->method('getQueryParams')->willReturn([]);
        $request->method('hasHeader')->with('Accept-Language')->willReturn(false);
        $request->method('getHeaderLine')->with('Accept-Language')->willReturn('');
        $request->method('getCookieParams')->willReturn([]);

        $lang = detectLang($request, 'en');

        self::assertEquals('en', $lang);
    }

    public function testQueryParam(): void
    {
        $request = $this->createMock(LangRequest::class);
        $request->method('getQueryParams')->willReturn(['lang' => 'de']);
        $request->method('getCookieParams')->willReturn(['lang' => 'pt']);
        $request->method('hasHeader')->with('Accept-Language')->willReturn(true);
        $request->method('getHeaderLine')->with('Accept-Language')->willReturn('ru-ru,ru;q=0.8,en;q=0.4');

        $lang = detectLang($request, 'en');

        self::assertEquals('de', $lang);
    }

    public function testCookie(): void
    {
        $request = $this->createMock(LangRequest::class);
        $request->method('getQueryParams')->willReturn([]);
        $request->method('getCookieParams')->willReturn(['lang' => 'pt']);
        $request->method('hasHeader')->with('Accept-Language')->willReturn(true);
        $request->method('getHeaderLine')->with('Accept-Language')->willReturn('ru-ru,ru;q=0.8,en;q=0.4');

        $lang = detectLang($request, 'en');

        self::assertEquals('pt', $lang);
    }

    public function testHeader(): void
    {
        $request = $this->createMock(LangRequest::class);
        $request->method('getQueryParams')->willReturn([]);
        $request->method('getCookieParams')->willReturn([]);
        $request->method('hasHeader')->with('Accept-Language')->willReturn(true);
        $request->method('getHeaderLine')->with('Accept-Language')->willReturn('ru-ru,ru;q=0.8,en;q=0.4');

        $lang = detectLang($request, 'en');

        self::assertEquals('ru', $lang);
    }
}
