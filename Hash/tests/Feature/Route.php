<?php

namespace Tests\Feature;

use Tests\Base;

class Route extends Base
{
	public function setUp()
	{
		parent::setUp();
		$this->startSession()
			->json('POST', '/register', [
				'username' => 'bob33',
				'email' => 'test@test.test',
				'name' => 'bob',
				'password' => '0731andrew',
				'password_confirmation' => '0731andrew'
			]);

		$this->startSession()
			->json('POST', '/auth/login', [
				'login' => 'bob33',
				'password' => '0731andrew'
			])
			->assertRedirect('/');
	}

	public function tearDown()
	{
		$this->startSession()
			->get('/auth/logout')
			->assertRedirect('/auth/login');
		parent::tearDown();
	}

	public function testHomePage()
	{
		$response = $this->get('/');
		$response->assertStatus(200);
	}

	public function testSettingsPage()
	{
		$response = $this->get('/settings');
		$response->assertStatus(200);
	}

	public function testUserPage()
	{
		$response = $this->get('/user');
		$response->assertStatus(200);
	}

	public function testPostPage()
	{
		$response = $this->get('/post');
		$response->assertStatus(200);
	}

	public function testChatPage()
	{
		$response = $this->get('/chat');
		$response->assertStatus(200);
	}

	public function testFeedPage()
	{
		$response = $this->get('/feed');
		$response->assertStatus(200);
	}

	public function testAllPage()
	{
		$response = $this->get('/all');
		$response->assertStatus(200);
	}
}
