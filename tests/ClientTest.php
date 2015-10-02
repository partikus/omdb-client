<?php

namespace Tests\ClearCode\OMDB;

use ClearCode\OMDB\Client;
use ClearCode\OMDB\IMDb\Id;
use ClearCode\OMDB\IMDb\Title;
use ClearCode\OMDB\Request\RequestById;
use ClearCode\OMDB\Request\RequestByTitle;

class ClientTest extends \PHPUnit_Framework_TestCase
{
    private function getGuzzleClientMock($response = '{}')
    {
        $client = $this->getMockBuilder('GuzzleHttp\Client')->disableOriginalConstructor()->getMock();
        $repsonse = $this->getMockBuilder('GuzzleHttp\Message\ResponseInterface')->getMock();
        $client->expects($this->any())->method('get')->withAnyParameters()->willReturn($repsonse);
        $body = $this->getMockBuilder('GuzzleHttp\Stream\StreamInterface')->getMock();
        $repsonse->expects($this->any())->method('getBody')->willReturn($body);
        $body->expects($this->any())->method('getContents')->withAnyParameters()->willReturn($response);

        return $client;
    }

    public function testSendTitledRequest()
    {
        $guzzleClient = $this->getGuzzleClientMock('{
            "title": "This Ain\'t Game of Thrones XXX",
            "year": "2014",
            "rated": "N/A",
            "released": "14 Apr 2014",
            "runtime": "N/A",
            "genre": "Adult",
            "director": "Axel Braun",
            "writer": "Axel Braun",
            "actors": "Richie Calhoun, Ryan Driller, Scarlett Fay, Alec Knight",
            "plot": "A XXX parody of the epic 2011 high fantasy TV series Game of Thrones.",
            "language": "English",
            "country": "USA",
            "awards": "1 nomination.",
            "poster": "N/A",
            "metascore": "N/A",
            "imdbRating": "3.5",
            "imdbVotes": "42",
            "imdbID": "tt3665102",
            "type": "movie",
            "response": "True"
        }');
        $client = new Client('API_KEY', $guzzleClient);
        $request = new RequestByTitle(new Title('This Ain\'t Game of Thrones XXX'));

        $response = $client->send($request);

        \PHPUnit_Framework_Assert::assertInstanceOf('ClearCode\OMDB\Response\Response', $response);
        \PHPUnit_Framework_Assert::assertSame($response->getTitle(), 'This Ain\'t Game of Thrones XXX');
        \PHPUnit_Framework_Assert::assertSame($response->getYear(), '2014');
        \PHPUnit_Framework_Assert::assertSame($response->getRated(), 'N/A');
        \PHPUnit_Framework_Assert::assertSame($response->getReleased(), '14 Apr 2014');
        \PHPUnit_Framework_Assert::assertSame($response->getRuntime(), 'N/A');
        \PHPUnit_Framework_Assert::assertSame($response->getGenre(), 'Adult');
        \PHPUnit_Framework_Assert::assertSame($response->getDirector(), 'Axel Braun');
        \PHPUnit_Framework_Assert::assertSame($response->getWriter(), 'Axel Braun');
        \PHPUnit_Framework_Assert::assertSame($response->getActors(), 'Richie Calhoun, Ryan Driller, Scarlett Fay, Alec Knight');
        \PHPUnit_Framework_Assert::assertSame($response->getPlot(), 'A XXX parody of the epic 2011 high fantasy TV series Game of Thrones.');
        \PHPUnit_Framework_Assert::assertSame($response->getLanguage(), 'English');
        \PHPUnit_Framework_Assert::assertSame($response->getCountry(), 'USA');
        \PHPUnit_Framework_Assert::assertSame($response->getAwards(), '1 nomination.');
        \PHPUnit_Framework_Assert::assertSame($response->getPoster(), 'N/A');
        \PHPUnit_Framework_Assert::assertSame($response->getMetascore(), 'N/A');
        \PHPUnit_Framework_Assert::assertSame($response->getImdbRating(), '3.5');
        \PHPUnit_Framework_Assert::assertSame($response->getImdbVotes(), '42');
        \PHPUnit_Framework_Assert::assertSame($response->getImdbID(), 'tt3665102');
        \PHPUnit_Framework_Assert::assertSame($response->getType(), 'movie');
        \PHPUnit_Framework_Assert::assertSame($response->getResponse(), 'True');
    }

    public function testSendIdentitiedRequest()
    {
        $guzzleClient = $this->getGuzzleClientMock('{}');
        $client = new Client('API_KEY', $guzzleClient);
        $request = new RequestById(new Id('tt3665102'));

        $response = $client->send($request);

        \PHPUnit_Framework_Assert::assertInstanceOf('ClearCode\OMDB\Response\Response', $response);
    }
}
