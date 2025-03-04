<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EmailVerificationTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test that a user can verify their email address.
     */
    public function test_user_can_verify_email()
    {
        // Step 1: Fake the mailer
        Mail::fake();

        // Step 2: Create a user with an unverified email
        $user = User::factory()->create([
            'email_verified_at' => null,
        ]);

        // Step 3: Trigger the verification email
        $user->sendEmailVerificationNotification();

        // Step 4: Assert that the verification email was sent
        Mail::assertSent(VerifyEmail::class, function ($mail) use ($user) {
            return $mail->user->id === $user->id;
        });

        // Step 5: Simulate the user clicking the verification link
        $verificationUrl = $this->getVerificationUrl($user);
        $response = $this->actingAs($user)->get($verificationUrl);

        // Step 6: Assert that the user's email is now verified
        $this->assertNotNull($user->fresh()->email_verified_at);

        // Step 7: Assert that the user is redirected after verification
        $response->assertRedirect('/home'); // Adjust this to match your application's behavior
    }

    /**
     * Helper method to generate the verification URL.
     */
    protected function getVerificationUrl($user)
    {
        // Generate the signed URL for email verification
        return URL::temporarySignedRoute(
            'verification.verify',
            now()->addMinutes(60),
            ['id' => $user->id, 'hash' => sha1($user->email)]
        );
    }
}
