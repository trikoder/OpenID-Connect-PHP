<?php

namespace Trikoder\OpenIdConnectPhp;

/**
 *
 * Copyright Trikoder 2016
 *
 * OpenIDConnectClient for Symfony
 * Author Alen Pokos <alen.pokos@trkoder.net>
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may
 * not use this file except in compliance with the License. You may obtain
 * a copy of the License at
 *
 *      http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations
 * under the License.
 *
 *
 */
use DateTime;

/**
 * Class Token
 * @package Trikoder\OpenIdConnectPhp
 */
class Token
{
    /** @var string */
    private $token;

    /** @var int */
    private $ttl;

    /** @var DateTime */
    private $expiresAt;

    /**
     * Token constructor.
     * @param $token
     * @param $ttl
     */
    public function __construct($token, $ttl)
    {
        $this->token = $token;
        $this->ttl = $ttl;
        $this->expiresAt = (new DateTime())->add(new \DateInterval("PT{$this->ttl}S"));
    }

    /**
     * @return bool
     */
    public function isExpired()
    {
        if ($this->expiresAt <= new DateTime()) {
            return true;
        }
        return false;
    }

    /**
     * @return mixed
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @return mixed
     */
    public function getTtl()
    {
        return $this->ttl;
    }

    /**
     * @return mixed
     */
    public function getExpiresAt()
    {
        return $this->expiresAt;
    }
}
