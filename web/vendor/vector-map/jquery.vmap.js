                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                ient->request('GET', 'http://www.example.com/');
        $client->request('GET', 'http');
        $this->assertEquals('http://www.example.com/http', $client->getRequest()->getUri(), '->request() uses the previous request for relative URLs');

        $client = new TestClient();
        $client->request('GET', 'http://www.example.com/foo');
        $client->request('GET', '?');
        $this->assertEquals('http://www.example.com/foo?', $client->getRequest()->getUri(), '->request() uses the previous request for ?');
        $client->request('GET', '?');
        $this->assertEquals('http://www.example.com/foo?', $client->getRequest()->getUri(), '->request() uses the previous request for ?');
        $client->request('GET', '?foo=bar');
        $this->assertEquals('http://www.example.com/foo?foo=bar', $client->getRequest()->getUri(), '->request() uses the previous request for ?');
    }

    public function testRequestReferer()
    {
        $client = new TestClient();
        $client->request('GET', 'http://www.example.com/foo/foobar');
        $client->request('GET', 'bar');
        $server = $client->getRequest()->getServer();
        $this->assertEquals('http://www.example.com/foo/foobar', $server['HTTP_REFERER'], '->request() sets the referer');
    }

    public function testRequestRefererCanBeOverridden()
    {
        $client = new TestClient();
        $client->request('GET', 'http://www.example.com/foo/foobar');
        $client->request('GET', 'bar', [], [], ['HTTP_REFERER' => 'xyz']);
        $server = $client->getRequest()->getServer();
        $this->assertEquals('xyz', $server['HTTP_REFERER'], '->request() allows referer to be overridden');
    }

    public function testRequestHistory()
    {
        $client = new TestClient();
        $client->request('GET', 'http://www.example.com/foo/foobar');
        $client->request('GET', 'bar');

        $this->assertEquals('http://www.example.com/foo/bar', $client->getHistory()->current()->getUri(), '->request() updates the History');
        $this->assertEquals('http://www.example.com/foo/foobar', $client->getHistory()->back()->getUri(), '->request() updates the History');
    }

    public function testRequestCookies()
    {
        $client = new TestClient();
        $client->setNextResponse(new Response('<html><a href="/foo">foo</a></html>', 200, ['Set-Cookie' => 'foo=bar']));
        $client->request('GET', 'http://www.example.com/foo/foobar');
        $this->assertEquals(['foo' => 'bar'], $client->getCookieJar()->allValues('http://www.example.com/foo/foobar'), '->request() updates the CookieJar');

        $client->request('GET', 'bar');
        $this->assertEquals(['foo' => 'bar'], $client->getCookieJar()->allValues('http://www.example.com/foo/foobar'), '->request() updates the CookieJar');
    }

    public function testRequestSecureCookies()
    {
        $client = new TestClient();
        $client->setNextResponse(new Response('<html><a href="/foo">foo</a></html>', 200, ['Set-Cookie' => 'foo=bar; path=/; secure']));
        $client->request('GET', 'https://www.example.com/foo/foobar');

        $this->assertTrue($client->getCookieJar()->get('foo', '/', 'www.example.com')->isSecure());
    }

    public function testClick()
    {
        $client = new TestClient();
        $client->setNextResponse(new Response('<html><a href="/foo">foo</a></html>'));
        $crawler = $client->request('GET', 'http://www.example.com/foo/foobar');

        $client->click($crawler->filter('a')->link());

        $this->assertEquals('http://www.example.com/foo', $client->getRequest()->getUri(), '->click() clicks on links');
    }

    public function testClickForm()
    {
        $client = new TestClient();
        $client->setNextResponse(new Response('<html><form action="/foo"><input type="submit" /></form></html>'));
        $crawler = $client->request('GET', 'http://www.example.com/foo/foobar');

        $client->click($crawler->filter('input')->form());

        $this->assertEquals('http://www.example.com/foo', $client->getRequest()->getUri(), '->click() Form submit forms');
    }

    public function testSubmit()
    {
        $client = new TestClient();
        $client->setNextResponse(new Response('<html><form action="/foo"><input type="submit" /></form></html>'));
        $crawler = $client->request('GET', 'http://www.example.com/foo/foobar');

        $client->submit($crawler->filter('input')->form());

        $this->assertEquals('http://www.example.com/foo', $client->getRequest()->getUri(), '->submit() submit forms');
    }

    public function testSubmitPreserveAuth()
    {
        $client = new TestClient(['PHP_AUTH_USER' => 'foo', 'PHP_AUTH_PW' => 'bar']);
        $client->setNextResponse(new Response('<html><form action="/foo"><input type="submit" /></form></html>'));
        $crawler = $client->request('GET', 'http://www.example.com/foo/foobar');

        $server = $client->getRequest()->getServer();
        $this->assertArrayHasKey('PHP_AUTH_USER', $server);
        $this->assertEquals('foo', $server['PHP_AUTH_USER']);
        $this->assertArrayHasKey('PHP_AUTH_PW', $server);
        $this->assertEquals('bar', $server['PHP_AUTH_PW']);

        $client->submit($crawler->filter('input')->form());

        $this->assertEquals('http://www.example.com/foo', $client->getRequest()->getUri(), '->submit() submit forms');

        $server = $client->getRequest()->getServer();
        $this->assertArrayHasKey('PHP_AUTH_USER', $server);
        $this->assertEquals('foo', $server['PHP_AUTH_USER']);
        $this->assertArrayHasKey('PHP_AUTH_PW', $server);
        $this->assertEquals('bar', $server['PHP_AUTH_PW']);
    }

    public function testFollowRedirect()
    {
        $client = new TestClient();
        $client->followRedirects(false);
        $client->request('GET', 'http://www.example.com/foo/foobar');

        try {
            $client->followRedirect();
            $this->fail('->followRedirect() throws a \LogicException if the request was not redirected');
        } catch (\Exception $e) {
            $this->assertInstanceOf('LogicException', $e, '->followRedirect() throws a \LogicException if the request was not redirected');
        }

        $client->setNextResponse(new Response('', 302, ['Location' => 'http://www.example.com/redirected']));
        $client->request('GET', 'http://www.example.com/foo/foobar');
        $client->followRedirect();

        $this->assertEquals('http://www.example.com/redirected', $client->getRequest()->getUri(), '->followRedirect() follows a redirect if any');

        $client = new TestClient();
        $client->setNextResponse(new Response('', 302, ['Location' => 'http://www.example.com/redirected']));
        $client->request('GET', 'http://www.example.com/foo/foobar');

        $this->assertEquals('http://www.example.com/redirected', $client->getRequest()->getUri(), '->followRedirect() automatically follows redirects if followRedirects is true');

        $client = new TestClient();
        $client->setNextResponse(new Response('', 201, ['Location' => 'http://www.example.com/redirected']));
        $client->request('GET', 'http://www.example.com/foo/foobar');

        $this->assertEquals('http://www.example.com/foo/foobar', $client->getRequest()->getUri(), '->followRedirect() does not follow redirect if HTTP Code is not 30x');

        $client = new TestClient();
        $client->setNextResponse(new Response('', 201, ['Location' => 'http://www.example.com/redirected']));
        $client->followRedirects(false);
        $client->request('GET', 'http://www.example.com/foo/foobar');

        try {
            $client->followRedirect();
            $this->fail('->followRedirect() throws a \LogicException if the request did not respond with 30x HTTP Code');
        } catch (\Exception $e) {
            $this->assertInstanceOf('LogicException', $e, '->followRedirect() throws a \LogicException if the request did not respond with 30x HTTP Code');
        }
    }

    public function testFollowRelativeRedirect()
    {
        $client = new TestClient();
        $client->setNextResponse(new Response('', 302, ['Location' => '/redirected']));
        $c                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                /www.example.com/', [], [], [
            'HTTP_HOST' => 'testhost',
            'HTTPS' => false,
        ]);
        $this->assertEquals('https://www.example.com/', $client->getRequest()->getUri());
    }

    public function testInternalRequest()
    {
        $client = new TestClient();

        $client->request('GET', 'https://www.example.com/https/www.example.com', [], [], [
            'HTTP_HOST' => 'testhost',
            'HTTP_USER_AGENT' => 'testua',
            'HTTPS' => false,
            'NEW_SERVER_KEY' => 'new-server-key-value',
        ]);

        $this->assertInstanceOf('Symfony\Component\BrowserKit\Request', $client->getInternalRequest());
    }

    public function testInternalRequestNull()
    {
        $client = new TestClient();
        $this->assertNull($client->getInternalRequest());
    }
}
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               