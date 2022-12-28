
import feather from 'feather-icons';
feather.replace();
function getImageUrl(name) {
    return new URL(`../img/${name}`, import.meta.url).href
  }
document.addEventListener('DOMContentLoaded', function () {
    const link = document.querySelectorAll('.resource_image');
    const linkBackround = document.querySelectorAll('.resourse_background_image');

    link.forEach(element => {
        let method = element.getAttribute('data-image');
        element.src = getImageUrl(method);
    });

    linkBackround.forEach(element => {
        let method = element.getAttribute('data-image');
        element.style.backgroundImage = "url(" + getImageUrl(method) + ")";
    });
});

