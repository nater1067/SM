Feature: Authentication
  In order to authenticate
  As a website user
  I need to be able to enter my information into a form and click submit

  Scenario: Successfully logging in
    Given I am on "/"
    When I fill in "username" with "richguy"
    And I fill in "password" with "password"
    And I press "login"
    Then I should see "Sweet"

  Scenario: Logging out
    Given I am on "/"
    When I fill in "username" with "richguy"
    And I fill in "password" with "password"
    And I press "login"
    Then I should see "Sweet"
    Given I am on "/"
    When I click on the text "Logout"
    Then I should see "Username"

  Scenario: Attempting login with incorrect password
    Given I am on "/"
    When I fill in "username" with "richguy"
    And I fill in "password" with "wrongpass"
    And I press "login"
    Then I should see "Bad Credentials"