<?php

namespace Tests\Unit\Actions;

use App\Actions\UpdateUserAvatarAction;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UpdateUserAvatarActionTest extends TestCase
{
    use RefreshDatabase;

    public function test_execute_updates_user_avatar(): void
    {
        $user = User::factory()->create(['avatar_url' => null]);
        $action = new UpdateUserAvatarAction;

        $avatarUrl = 'https://example.com/avatar.jpg';

        $updatedUser = $action->execute($user, $avatarUrl);

        $this->assertEquals($avatarUrl, $updatedUser->avatar_url);
        $this->assertEquals($avatarUrl, $user->fresh()->avatar_url);
    }

    public function test_execute_can_set_avatar_to_null(): void
    {
        $user = User::factory()->create(['avatar_url' => 'https://old-avatar.com/image.jpg']);
        $action = new UpdateUserAvatarAction;

        $updatedUser = $action->execute($user, null);

        $this->assertNull($updatedUser->avatar_url);
        $this->assertNull($user->fresh()->avatar_url);
    }

    public function test_update_to_latest_provider_avatar_with_no_accounts(): void
    {
        $user = User::factory()->create(['avatar_url' => 'https://old-avatar.com/image.jpg']);
        $action = new UpdateUserAvatarAction;

        $updatedUser = $action->updateToLatestProviderAvatar($user);

        $this->assertNull($updatedUser->avatar_url);
    }
}
