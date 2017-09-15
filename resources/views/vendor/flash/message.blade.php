@foreach (session('flash_notification', collect())->toArray() as $message)
    <div class="modal is-active">
        <div class="modal-background"></div>
            <div class="modal-content">
                <div class="box">
                    {!! $message['message'] !!}
                </div>
            </div>
            <button class="modal-close is-large" aria-label="close"></button>
    </div>
@endforeach

{{ session()->forget('flash_notification') }}
