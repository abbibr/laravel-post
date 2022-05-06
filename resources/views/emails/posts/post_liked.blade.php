@component('mail::message')
# Your post was liked

{{ $user->name }} liked one of your posts

@component('mail::button', ['url' => route('posts.show', $post)])
    View post
@endcomponent

Thanks,<br>
Posty Application
@endcomponent
