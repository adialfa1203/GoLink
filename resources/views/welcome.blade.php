<div class="col-12 col-lg-2 col-xl-2 col-sm-6 col-md-6">
    <center>
        @if ($user->profile_picture)
            @if($user->google_id)
            <img src="{{ $user->profile_picture }}" alt="{{ $user->name }}"
            class="avatar-lg rounded-circle object-fit-cover border-0 img-thumbnail user-profile-image">
            @else
            <img src="{{ asset('profile_pictures/' . $user->profile_picture) }}"
                alt="{{ $user->name }}"
                class="avatar-lg rounded-circle object-fit-cover border-0 img-thumbnail user-profile-image">
            @endif
        @else
            <img src="{{ asset('default/default.jpg') }}"
                alt="{{ $user->name }}"
                class="avatar-lg rounded-circle object-fit-cover border-0 img-thumbnail user-profile-image">
        @endif
        <input id="profile-img-file-input" name="profile_picture" type="file"
            class="profile-img-file-input d-none">
        <label for="profile-img-file-input"
            class="profile-photo-edit avatar-xs">
            <span class="avatar-title rounded-circle bg-light text-body foto">
                <i class="bi bi-camera"></i>
            </span>
        </label>
    </center>
</div>