window.onload = (event) => {

    document.querySelectorAll('.carousel').forEach(carousel => {
        const images = carousel.querySelectorAll('.carousel-image');
        let currentIndex = 0;

        function showImage(index) {
            images.forEach(image => image.classList.remove('active'));
            images[index].classList.add('active');
        }

        carousel.querySelector('.prev').addEventListener('click', () => {
            currentIndex = currentIndex > 0 ? currentIndex - 1 : images.length - 1;
            showImage(currentIndex);
        });

        carousel.querySelector('.next').addEventListener('click', () => {
            currentIndex = currentIndex < images.length - 1 ? currentIndex + 1 : 0;
            showImage(currentIndex);
        });
    });
}

