Feature: Model Registration
  In order to register
  As a model
  I need to be able to enter my information into a form and click submit

  Scenario: Successfully registering
    Given I am on "/"
    When I fill in "fos_model_registration_form_email" with "richguy"
    And I fill in "fos_model_registration_form_username" with "password"
    And I fill in "fos_model_registration_form_plainPassword_first" with "password"
    And I fill in "fos_model_registration_form_plainPassword_second" with "password"
    And I fill in "fos_model_registration_form_age" with "password"
    And I fill in "fos_model_registration_form_firstName" with "password"
    And I fill in "fos_model_registration_form_lastName" with "password"
    And I fill in "fos_model_registration_form_country" with "USA"
    And I press "login"
    Then I should see "Sweet"