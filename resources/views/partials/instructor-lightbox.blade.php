<dialog
    class="instructor-lightbox"
    id="instructor-lightbox"
    aria-labelledby="instructor-lightbox-name"
>
    <div class="instructor-lightbox__content">
        <button
            class="instructor-lightbox__close"
            type="button"
            aria-label="Tutup foto pemateri"
        >×</button>
        <img class="instructor-lightbox__image" id="instructor-lightbox-image" alt="">
        <p class="instructor-lightbox__name" id="instructor-lightbox-name"></p>
    </div>
</dialog>
<script src="{{ asset('js/activity-instructor-lightbox.js') }}" defer></script>
