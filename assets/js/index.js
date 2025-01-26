
const categoryButtons = document.querySelectorAll('.category-btn');
categoryButtons.forEach(button => {
  button.addEventListener('click', () => {
      categoryButtons.forEach(btn => btn.classList.remove('bg-red-50', 'text-red-600'));
      button.classList.add('bg-red-50', 'text-red-600');
  });
});