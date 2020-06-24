Feature: _Status_
  Background:
    Given the following fixtures files are loaded:
      | user     |
      | status     |

  Scenario: Get collection Status user connected
    Given I have the payload
    """
    {
        "email": "muhammad.tounsi@hotmail.fr",
        "password": "password"
    }
    """
    Given I authenticate with user
    Given I request "GET /statuses"
    And the response status code should be 200
    Then print last response

  Scenario: Get collection Status user not connected
    Given I request "GET /statuses"
    And the response status code should be 401

  Scenario: Post Status with user connected
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
        "name": "Créée"
    }
    """
    Given I request "POST /statuses"
    And the response status code should be 201

