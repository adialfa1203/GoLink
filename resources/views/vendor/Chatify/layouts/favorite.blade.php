<div class="favorite-list-item">
    @if($user)
    <div data-id="{{ $user->id }}" data-action="0" class="avatar av-m"
            @if($user->profile_picture)
                style="background-image: url('{{ asset('profile_pictures/' . $user->profile_picture) }}');"
            @else
                style="background-image: url('{{ asset('default/default.jpg') }}');"
            @endif
        >
        </div>
        <p>{{ strlen($user->name) > 5 ? substr($user->name,0,6).'..' : $user->name }}</p>
    @endif
</div>
