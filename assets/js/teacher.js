
const menuButton = document.getElementById('menuButton');
const closeSidebarButton = document.getElementById('closeSidebar');
const sidebar = document.getElementById('sidebar');
const menuButtonContainer = menuButton.parentElement; 

menuButton.addEventListener('click', () => {
    sidebar.classList.remove('-translate-x-full');
    menuButtonContainer.classList.add('hidden');
});

closeSidebarButton.addEventListener('click', () => {
    sidebar.classList.add('-translate-x-full');
    menuButtonContainer.classList.remove('hidden'); 
});

window.addEventListener('resize', () => {
    if (window.innerWidth >= 1024) { 
        menuButtonContainer.classList.add('hidden');
    } else if (sidebar.classList.contains('-translate-x-full')) {
        menuButtonContainer.classList.remove('hidden');
    }
});
  // --------------------------------------------------------------------
  const addCourseButton = document.getElementById('newCourse');
  const modal = document.getElementById('addCourseModal');
  const closeModal = document.getElementById('closeModal');

  function openModal() {
      modal.classList.remove('hidden');
      document.body.style.overflow = 'hidden';
  }

  function hideModal() {
      modal.classList.add('hidden');
      document.body.style.overflow = 'auto';
  }

  addCourseButton.addEventListener('click', openModal);
  closeModal.addEventListener('click', hideModal);

  modal.addEventListener('click', (e) => {
      if (e.target === modal) {
          hideModal();
      }
  });
  
  // --------------------------------------------------------------------
  const coursesButton = document.getElementById('coursesButton');
  const allCourses = document.getElementById('allCourses');
  const studentsButton = document.getElementById('studentsButton');
  const studentsList = document.getElementById('studentsList');
  const lastCrsEnroll = document.getElementById('last-courses-enrollements-section');
  const seeMoreEnroll = document.getElementById('seeMoreEnroll');
  const seeMoreCourses = document.getElementById('seeMoreCourses');
  const closeEnrollModal = document.getElementById('closeEnrollModal');
  const enrollmentsModal = document.getElementById('enrollmentsModal');
  const editCourseModal = document.getElementById('editCourseModal');
  const closeEditCourseModal = document.getElementById('closeEditCourseModal');

  if(enrollmentsModal){
        closeEnrollModal.addEventListener('click', () => {
        enrollmentsModal.classList.add('hidden');
        window.location.href="./teacher.php";
    });   
  }
  
  if(editCourseModal){
    closeEditCourseModal.addEventListener('click', () => {
        editCourseModal.classList.add('hidden');
        window.location.href="./teacher.php";
    });
  }

  coursesButton.addEventListener('click', () => {
    allCourses.style.display = 'block';
    studentsList.style.display = 'none';
    lastCrsEnroll.style.display = 'none';
  });

  studentsButton.addEventListener('click', () => {
    allCourses.style.display = 'none';
    studentsList.style.display = 'block';
    lastCrsEnroll.style.display = 'none';
  });
  seeMoreCourses.addEventListener('click', () => {
    allCourses.style.display = 'block';
    studentsList.style.display = 'none';
    lastCrsEnroll.style.display = 'none';
  });
  seeMoreEnroll.addEventListener('click', () => {
    allCourses.style.display = 'none';
    studentsList.style.display = 'block';
    lastCrsEnroll.style.display = 'none';
  });
//  -------------------------------------------------------------------

function toggleContentInputs() {
  const contentType = document.querySelector('.contentType').value;
  const videoInput = document.querySelector('.videoInput');
  const textInput = document.querySelector('.textInput');

  if (contentType === 'video') {
      videoInput.classList.remove('hidden');
      textInput.classList.add('hidden');
  } else if (contentType === 'document') {
      textInput.classList.remove('hidden');
      videoInput.classList.add('hidden');
  }
}
  