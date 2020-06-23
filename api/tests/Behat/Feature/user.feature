Feature: _User_
  Background:
    Given the following fixtures files are loaded:
      | user     |
  Scenario: Get collection
    Given I request "GET /users"
    And the response status code should be 400
    Then print last response
