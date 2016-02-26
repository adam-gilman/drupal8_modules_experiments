<?php

/**
 * @file
 * Definition of Drupal\webham_router\Tests\RouteExampleTest.
 */

namespace Drupal\webham_router\Tests;

use Drupal\simpletest\WebTestBase;

/**
 * Test our custom page if it works fine
 *
 * @ingroup webham_router
 * @group webham
 */
class RouteExampleTest extends WebTestBase {

  /**
   * User with admin privileges.
   *
   * @var \Drupal\user\UserInterface
   */
  protected $user;

  protected function setUp() {
    
    parent::setUp();
    $this->contentUser = $this->drupalCreateUser(array('access content'));

  }

  /**
   * Enabling the module
   *
   * @var array
   */
  public static $modules = array('webham_router', 'block');

  /**
   * The the profile
   *
   * @var string
   */
  protected $profile = 'minimal';

  /**
   * Test the menu item
   */
  public function testBlockExampleLink() {

    $this->drupalLogin($this->contentUser);

    $this->drupalGet('testpagenew');
    $this->assertLinkByHref('/');
  }

  /**
   * Tests block_example menus.
   */
  public function testBlockExampleMenu() {

    $this->drupalLogin($this->contentUser);

    $this->drupalGet('testpagenew');
    $this->assertText('Hello Compuccino!');
    $this->assertResponse(200);

  }

}
