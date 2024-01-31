<?php

declare(strict_types=1);

namespace Test\App;

use NetWeaver\Http\Message\ServerRequest;
use NetWeaver\Http\Message\Stream;
use NetWeaver\Http\Message\Uri;
use PHPUnit\Framework\TestCase;

use function App\detectLang;

class DetectLangTest extends TestCase
{
    public function testDefault(): void
    {
        $request = new ServerRequest(
            serverParams: [],
            uri: new Uri('/'),
            method: 'GET',
            queryParams: [],
            headers: [],
            cookieParams: [],
            body: new Stream(fopen('php://memory', 'r')),
            parsedBody: null
        );

        $lang = detectLang($request, 'en');

        self::assertEquals('en', $lang);
    }
}
