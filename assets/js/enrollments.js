
const allCoursesBtn = document.getElementById('allCoursesBtn');
const inProgressBtn = document.getElementById('inProgressBtn');
const completedBtn = document.getElementById('completedBtn'); 
const inProgressCourses = document.getElementById('inProgressCourses');
const toStartCourses = document.getElementById('toStartCourses');
const completedCourses = document.getElementById('completedCourses');

allCoursesBtn.addEventListener('click', () => {
  inProgressBtn.classList.remove('active-btn');
  completedBtn.classList.remove('active-btn');
  allCoursesBtn.classList.add('active-btn');
  toStartCourses.classList.remove('hidden');
  inProgressCourses.classList.add('hidden');
  completedCourses.classList.add('hidden');
});

inProgressBtn.addEventListener('click', () => {
  allCoursesBtn.classList.remove('active-btn');
  completedBtn.classList.remove('active-btn');
  inProgressBtn.classList.add('active-btn');
  toStartCourses.classList.add('hidden');
  completedCourses.classList.add('hidden');
  inProgressCourses.classList.remove('hidden');    
});

completedBtn.addEventListener('click', () => {
  allCoursesBtn.classList.remove('active-btn');
  inProgressBtn.classList.remove('active-btn');
  completedBtn.classList.add('active-btn');
  toStartCourses.classList.add('hidden');
  inProgressCourses.classList.add('hidden');
  completedCourses.classList.remove('hidden');
});
