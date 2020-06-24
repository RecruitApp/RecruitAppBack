<?php

namespace App\Tests\Behat\Context\Traits;

use Exception;

trait AuthTrait
{
    /**
     * The token to use with HTTP authentication
     *
     * @var string
     */
    protected $token;

    /**
     * @Given I authenticate with user
     * @throws Exception
     */
    public function iAuthenticateWithEmailAndPassword()
    {
        $this->iRequest("POST","/authentication_token");
        $response = json_decode($this->lastResponse->getContent(false), true);
        $this->token = $response["token"];
    }

    /**
     * @Given I logout
     * @throws Exception
     */
    public function iLogout()
    {
        $this->token = "";
    }
}
