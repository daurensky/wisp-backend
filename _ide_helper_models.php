<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * @property string $id
 * @property array<array-key, mixed> $offer
 * @property array<array-key, mixed>|null $answer
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\CallCandidate> $candidates
 * @property-read int|null $candidates_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Call newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Call newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Call query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Call whereAnswer($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Call whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Call whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Call whereOffer($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Call whereUpdatedAt($value)
 */
	class Call extends \Eloquent {}
}

namespace App\Models{
/**
 * @property string $id
 * @property string $call_id
 * @property string $type
 * @property array<array-key, mixed> $candidate_data
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Call|null $activeCall
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CallCandidate newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CallCandidate newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CallCandidate query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CallCandidate whereCallId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CallCandidate whereCandidateData($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CallCandidate whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CallCandidate whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CallCandidate whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CallCandidate whereUpdatedAt($value)
 */
	class CallCandidate extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

