Feature: _Offer_
  Background:
    Given the following fixtures files are loaded:
      | user       |
      | offer       |

  Scenario: Post offer
    Given I authenticate with user "muhammad.tounsi@hotmail.fr" and password "password"
    Given I have the payload
    """
    {
        name: "offer1"
        descriptionCompany: "company description"
        description: "description offer"
        workplace: "la defense"
        typeContract: "CDI"
        recruiter: '1'
    }
    """
    Given I request "POST /offers"
    And the response status code should be 401
    #And the "name" property should equal "Coucou"

  Scenario: Get collection
    Given I request "GET /offers"
    And the response status code should be 401
    #And the "hydra:totalItems" property should be an integer equalling "0"
    #And scope into the "hydra:search" property
    #And the "hydra:mapping" property should be an integer
    #And reset scope
    #Then print last response
