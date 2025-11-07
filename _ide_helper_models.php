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
 * @property int $id
 * @property string $peerable_type
 * @property int $peerable_id
 * @property string $user_id
 * @property string $connection_id
 * @property string $sdp
 * @property string $type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $peerable
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Peer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Peer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Peer query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Peer whereConnectionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Peer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Peer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Peer wherePeerableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Peer wherePeerableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Peer whereSdp($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Peer whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Peer whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Peer whereUserId($value)
 */
	class Peer extends \Eloquent {}
}

namespace App\Models{
/**
 * @property string $id
 * @property string $name
 * @property string $author_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $author
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ServerCategory> $categories
 * @property-read int|null $categories_count
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, \Spatie\MediaLibrary\MediaCollections\Models\Media> $media
 * @property-read int|null $media_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Server newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Server newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Server query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Server whereAuthorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Server whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Server whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Server whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Server whereUpdatedAt($value)
 */
	class Server extends \Eloquent implements \Spatie\MediaLibrary\HasMedia {}
}

namespace App\Models{
/**
 * @property string $id
 * @property string $server_id
 * @property string $name
 * @property int $sort
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ServerChannel> $channels
 * @property-read int|null $channels_count
 * @property-read \App\Models\Server $server
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ServerCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ServerCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ServerCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ServerCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ServerCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ServerCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ServerCategory whereServerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ServerCategory whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ServerCategory whereUpdatedAt($value)
 */
	class ServerCategory extends \Eloquent {}
}

namespace App\Models{
/**
 * @property string $id
 * @property string $server_category_id
 * @property \App\Enums\Server\ChannelTypeEnum $type
 * @property string $name
 * @property int $sort
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\ServerCategory $category
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Peer> $peers
 * @property-read int|null $peers_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ServerChannel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ServerChannel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ServerChannel query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ServerChannel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ServerChannel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ServerChannel whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ServerChannel whereServerCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ServerChannel whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ServerChannel whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ServerChannel whereUpdatedAt($value)
 */
	class ServerChannel extends \Eloquent {}
}

namespace App\Models{
/**
 * @property string $id
 * @property string $name
 * @property string $email
 * @property string $username
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, \Spatie\MediaLibrary\MediaCollections\Models\Media> $media
 * @property-read int|null $media_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Server> $servers
 * @property-read int|null $servers_count
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
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUsername($value)
 */
	class User extends \Eloquent implements \Spatie\MediaLibrary\HasMedia {}
}

