const instructorLightbox = document.getElementById('instructor-lightbox');
const instructorLightboxImage = document.getElementById('instructor-lightbox-image');
const instructorLightboxName = document.getElementById('instructor-lightbox-name');
const instructorLightboxClose = instructorLightbox.querySelector('.instructor-lightbox__close');

document.querySelectorAll('[data-instructor-photo]').forEach((trigger) => {
    trigger.addEventListener('click', () => {
        instructorLightboxImage.src = trigger.dataset.instructorPhoto;
        instructorLightboxImage.alt = `Foto pengajar ${trigger.dataset.instructorName}`;
        instructorLightboxName.textContent = trigger.dataset.instructorName;
        instructorLightbox.showModal();
    });
});

instructorLightboxClose.addEventListener('click', () => {
    instructorLightbox.close();
});

instructorLightbox.addEventListener('click', (event) => {
    if (event.target === instructorLightbox) {
        instructorLightbox.close();
    }
});

instructorLightbox.addEventListener('close', () => {
    instructorLightboxImage.removeAttribute('src');
});
