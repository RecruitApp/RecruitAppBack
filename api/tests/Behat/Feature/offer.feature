Feature: _Offer_
  Background:
    Given the following fixtures files are loaded:
      | user       |
      | offer       |

  Scenario: Post offer
    Given I have the payload
    """
    {
        "email": "muhammad.tounsi@hotmail.fr",
        "password": "password"
    }
    """
    Given I authenticate with user
    Given I have the payload
    """
    {
        "name": "offer1",
        "descriptionCompany": "company description",
        "description": "description offer",
        "workplace": "la defense",
        "typeContract": "CDI",
        "recruiter": "{{user_recruiter_1}}"
    }
    """
    Given I request "POST /offers"
    And the response status code should be 400
    #And the "name" property should equal "offer1"

  Scenario: Get collection
    Given I request "GET /offers"
    And the response status code should be 401

  Scenario: Get collection Offers with user connected
    Given I have the payload
    """
    {
        "email": "muhammad.tounsi@hotmail.fr",
        "password": "password"
    }
    """
    Given I authenticate with user
    Given I request "GET /offers"
    And the response status code should be 200
    And the "hydra:totalItems" property should be an integer equalling "20"
    And scope into the "hydra:search" property
    And the "hydra:mapping" property should be an integer
    And reset scope
    Then print last response
