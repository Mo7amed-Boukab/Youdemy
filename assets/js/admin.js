
const menuButton_ = document.getElementById('menuButton');
const closeSidebar = document.getElementById('closeSidebar');
const sidebar_ = document.getElementById('sidebar');

menuButton_.addEventListener('click', () => {
    sidebar_.classList.remove('-translate-x-full');
});

closeSidebar.addEventListener('click', () => {
    sidebar_.classList.add('-translate-x-full');
});
const seeAllTeachersBtn = document.getElementById('seeAllTeachers');
const listAllTeachers = document.getElementById('listAllTeachers');
const seeAllUsersBtn = document.getElementById('seeAllUsers');
const listAllUsers = document.getElementById('listAllUsers');
const seeAllTeachers_section = document.getElementById('seeAllTeachers-section');
const seeAllUsers_section = document.getElementById('seeAllUsers-section');
const usersManagement = document.getElementById('usersManagement');
const teacherValidation = document.getElementById('teacherValidation');

seeAllTeachersBtn.addEventListener('click', () => {
    seeAllTeachers_section.style.display = 'none';
    seeAllUsers_section.style.display = 'none';
    listAllTeachers.style.display = 'block';
    listAllUsers.style.display = 'none';
    tableCourses.style.display = 'none';
    tagsCategoriesList.style.display= "none";
    statisticSection.style.display = "none";
});

seeAllUsersBtn.addEventListener('click', () => {
    seeAllTeachers_section.style.display = 'none';
    seeAllUsers_section.style.display = 'none';
    listAllTeachers.style.display = 'none';
    listAllUsers.style.display = 'block';
    tableCourses.style.display = 'none';
    tagsCategoriesList.style.display= "none";
    statisticSection.style.display = "none";
});

usersManagement.addEventListener('click', () => {
    seeAllTeachers_section.style.display = 'none';
    seeAllUsers_section.style.display = 'none';
    listAllTeachers.style.display = 'none';
    listAllUsers.style.display = 'block';
    tableCourses.style.display = 'none';
    tagsCategoriesList.style.display= "none";
    statisticSection.style.display = "none";
});

teacherValidation.addEventListener('click', () => {
    seeAllTeachers_section.style.display = 'none';
    seeAllUsers_section.style.display = 'none';
    listAllUsers.style.display = 'none';
    listAllTeachers.style.display = 'block';
    tableCourses.style.display = 'none';
    tagsCategoriesList.style.display= "none";
    statisticSection.style.display = "none";
}); 

const tableCourses = document.getElementById('tableCourses');
const coursesManagement = document.getElementById('coursesManagement');

coursesManagement.addEventListener('click',()=>{
  tableCourses.style.display = 'block';
  seeAllTeachers_section.style.display = 'none';
  seeAllUsers_section.style.display = 'none';
  listAllUsers.style.display = 'none';
  listAllTeachers.style.display = 'none';
  tagsCategoriesList.style.display= "none";
  statisticSection.style.display = "none";
})

const addTagsBtn= document.getElementById('addTagsBtn');
const addTagsModal= document.getElementById('addTagsModal');
const closeModalBtn= document.getElementById('closeTagsModalBtn');
const addCategoryBtn= document.getElementById('addCategoryBtn');
const addCategoryModal= document.getElementById('addCategoryModal');
const closeCategoryModal= document.getElementById('closeCategoryModal');
const cancelTagBtn= document.getElementById('cancelTagBtn');
const cancelCategoryBtn= document.getElementById('cancelCategoryBtn');

addTagsBtn.addEventListener('click',()=>{
  addTagsModal.style.display= "flex";
})
closeModalBtn.addEventListener('click',()=>{
  addTagsModal.style.display="none";
})
cancelTagBtn.addEventListener('click',()=>{
  addTagsModal.style.display="none";
})

addCategoryBtn.addEventListener('click',()=>{
  addCategoryModal.style.display= "flex";
})

closeCategoryModal.addEventListener('click',()=>{
  addCategoryModal.style.display="none";   
})
cancelCategoryBtn.addEventListener('click',()=>{
  addCategoryModal.style.display="none";   
})

const tagsCategoriesBtn= document.getElementById('tags&categoriesBtn');
const tagsCategoriesList= document.getElementById('tags&categoriesList');

tagsCategoriesBtn.addEventListener('click',()=>{
  tagsCategoriesList.style.display= "block";
  tableCourses.style.display = 'none';
  seeAllTeachers_section.style.display = 'none';
  seeAllUsers_section.style.display = 'none';
  listAllUsers.style.display = 'none';
  listAllTeachers.style.display = 'none';
  statisticSection.style.display = "none";
})

const statisticsBtn = document.getElementById('statistics');
const statisticSection = document.getElementById('statistic-section');

statisticsBtn.addEventListener('click',()=>{
  statisticSection.style.display = "block";
  tagsCategoriesList.style.display= "none";
  tableCourses.style.display = 'none';
  seeAllTeachers_section.style.display = 'none';
  seeAllUsers_section.style.display = 'none';
  listAllUsers.style.display = 'none';
  listAllTeachers.style.display = 'none';
})