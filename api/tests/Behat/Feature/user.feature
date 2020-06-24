Feature: _User_
  Background:
    Given the following fixtures files are loaded:
      | user     |

  Scenario: Get collection
    Given I request "GET /users"
    And the response status code should be 200
    And the "hydra:totalItems" property should be an integer equalling "20"
    And scope into the "hydra:search" property
    And the "hydra:mapping" property should be an integer
    And reset scope
    Then print last response

  Scenario: Post user
    Given I have the payload
    """
    {
        "email": "wm@hotmail.fr",
        "roles": ["ROLE_RECRUITER"],
        "password": "password",
        "isActive": true
    }
    """
    Given I request "POST /users"
    And the response status code should be 201
    And the "email" property should equal "wm@hotmail.fr"
    Then print last response
