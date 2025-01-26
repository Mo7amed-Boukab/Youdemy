
const overviewBtn = document.getElementById('overview-btn');
const courseBtn = document.getElementById('course-btn');
const overviewSection = document.getElementById('overview-section');
const courseSection = document.getElementById('course-section');

function showOverview() {
  overviewSection.classList.remove('hidden');
  courseSection.classList.add('hidden');
  overviewBtn.classList.add('active-btn');
  courseBtn.classList.remove('active-btn');
}

function showCourse() {
  courseSection.classList.remove('hidden');
  overviewSection.classList.add('hidden');;
  overviewBtn.classList.remove('active-btn');
  courseBtn.classList.add('active-btn');
}