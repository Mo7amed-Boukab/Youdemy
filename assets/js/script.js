
const categoryContainer = document.querySelector('.scrollbar-hide');
const prevButton = categoryContainer.previousElementSibling;
const nextButton = categoryContainer.nextElementSibling;

prevButton.addEventListener('click', () => {
    categoryContainer.scrollBy({ left: -200, behavior: 'smooth' });
});

nextButton.addEventListener('click', () => {
    categoryContainer.scrollBy({ left: 200, behavior: 'smooth' });
});