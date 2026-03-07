<div class="worm">
    {{ str_repeat('.', $user->worm_length) }}
</div>
@if(isset($message))
    <p>{{ $message }}</p>
@endif
