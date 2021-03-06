<?php

namespace T3ko\Dpd\Request;

use PHPUnit\Framework\TestCase;

class GetCourierAvailabilityRequestTest extends TestCase
{
    public function testCreation()
    {
        $request = GetCourierAvailabilityRequest::from('test postcode');
        $payload = $request->toPayload();

        self::assertNull($payload->getAuthData());
        self::assertEquals('PL', $payload->getSenderPlace()->getCountryCode());
        self::assertEquals('test postcode', $payload->getSenderPlace()->getZipCode());

        $request = GetCourierAvailabilityRequest::from('test postcode 2', 'DE');
        $payload = $request->toPayload();

        self::assertNull($payload->getAuthData());
        self::assertEquals('DE', $payload->getSenderPlace()->getCountryCode());
        self::assertEquals('test postcode 2', $payload->getSenderPlace()->getZipCode());
    }
}
