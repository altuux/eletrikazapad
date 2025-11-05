const images = document.querySelectorAll('.galleryItem img');
const lightbox = document.getElementById('lightbox');
const lightboxImg = document.getElementById('lightboxImg');
const closeBtn = document.querySelector('.closeBtn');
const prevBtn = document.querySelector('.prevBtn');
const nextBtn = document.querySelector('.nextBtn');

let currentIndex = 0;

// Otevření lightboxu
images.forEach(img => {
    img.addEventListener('click', () => {
        currentIndex = parseInt(img.dataset.index);
        openLightbox(img.dataset.full);
    });
});

function openLightbox(src) {
    lightbox.style.display = 'flex';
    lightboxImg.src = src;
}

// Zavření lightboxu
function closeLightbox() {
    lightbox.style.display = 'none';
}

closeBtn.addEventListener('click', closeLightbox);
lightbox.addEventListener('click', e => {
    if (e.target === lightbox) closeLightbox();
});

// Navigace
function showImage(index) {
    if (index < 0) index = images.length - 1;
    if (index >= images.length) index = 0;
    currentIndex = index;
    lightboxImg.src = images[currentIndex].dataset.full;
}

prevBtn.addEventListener('click', () => showImage(currentIndex - 1));
nextBtn.addEventListener('click', () => showImage(currentIndex + 1));

// Klávesové zkratky
document.addEventListener('keydown', e => {
    if (lightbox.style.display === 'flex') {
        if (e.key === 'ArrowRight') showImage(currentIndex + 1);
        if (e.key === 'ArrowLeft') showImage(currentIndex - 1);
        if (e.key === 'Escape') closeLightbox();
    }
});
